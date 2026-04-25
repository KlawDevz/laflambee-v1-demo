#!/bin/bash

#===============================================================================
# Script Name: download_flambee_gallery.sh
# Description: Extract and download all gallery images from La Flambée website
# Version: 2.0
#===============================================================================

set -euo pipefail

# Colors
readonly RED='\033[0;31m'
readonly GREEN='\033[0;32m'
readonly YELLOW='\033[1;33m'
readonly BLUE='\033[0;34m'
readonly CYAN='\033[0;36m'
readonly NC='\033[0m'

# Configuration
readonly TARGET_URL="https://www.laflambee09.fr/menu-et-carte"
OUTPUT_DIR="./laflambee_photos"
TEMP_HTML="/tmp/flambee_page.html"
USER_AGENT="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"

# Create output directory
mkdir -p "$OUTPUT_DIR"

echo -e "${CYAN}Analyse de la page web pour extraction des photos...${NC}"

# Download the HTML page
if ! curl -s -L -A "$USER_AGENT" "$TARGET_URL" -o "$TEMP_HTML"; then
    echo -e "${RED}Erreur: Impossible de télécharger la page web${NC}" >&2
    exit 1
fi

echo -e "${BLUE}Extraction des URLs des images...${NC}"

# Extract image URLs from the HTML
# Local.fr sites typically use data-src or src attributes with specific patterns
# We'll look for common image patterns and filter for food/restaurant photos

grep -oP 'https?://[^"\s<>]+\\.(jpg|jpeg|png|webp)' "$TEMP_HTML" | \
    sort -u | \
    grep -v "logo\|icon\|banner\|favicon" | \
    grep -E "(local-fr|s3\\.eu-west|cloudfront)" > /tmp/image_urls.txt

# Also look for data-src attributes (lazy loading)
grep -oP 'data-src=["'\'']\\K[^"\''>]+' "$TEMP_HTML" | \
    grep -E "\\.(jpg|jpeg|png|webp)" | \
    grep -v "logo\|icon" >> /tmp/image_urls.txt

# Remove duplicates and clean up
sort -u /tmp/image_urls.txt | sed 's/\\//g' > /tmp/unique_urls.txt

# Count found images
total_images=$(wc -l < /tmp/unique_urls.txt)
echo -e "${GREEN}Trouvé ${total_images} images uniques${NC}"

if [[ "$total_images" -eq 0 ]]; then
    echo -e "${YELLOW}Aucune image trouvée. Tentative avec méthode alternative...${NC}"
    
    # Alternative: Look for JSON data or specific gallery structures
    grep -oP 'https://local-fr-public[^"\s<>]+' "$TEMP_HTML" | \
        sort -u > /tmp/unique_urls.txt
    
    total_images=$(wc -l < /tmp/unique_urls.txt)
    echo -e "${GREEN}Méthode alternative: ${total_images} images trouvées${NC}"
fi

# Download function
download_image() {
    local url="$1"
    local index="$2"
    local total="$3"
    
    # Clean URL (remove HTML entities)
    url=$(echo "$url" | sed 's/&amp;/\&/g')
    
    # Extract filename
    local filename=$(basename "$url" | sed 's/[^a-zA-Z0-9._-]/_/g')
    
    # Add index prefix for ordering
    local output_file="${OUTPUT_DIR}/$(printf "%03d" "$index")_${filename}"
    
    # Skip if exists
    if [[ -f "$output_file" ]]; then
        echo -e "${YELLOW}[${index}/${total}] SKIP${NC} ${filename}"
        return 0
    fi
    
    echo -e "${CYAN}[${index}/${total}] DOWNLOAD${NC} ${filename:0:50}..."
    
    if curl -s -L -A "$USER_AGENT" --connect-timeout 10 --max-time 30 \
         -o "$output_file" "$url" 2>/dev/null; then
        
        # Verify file is valid image (not empty and not HTML error page)
        local filesize=$(stat -f%z "$output_file" 2>/dev/null || stat -c%s "$output_file" 2>/dev/null || echo 0)
        
        if [[ "$filesize" -gt 1000 ]]; then
            # Check if it's not an HTML file disguised as image
            if ! grep -q "<html\|<!DOCTYPE" "$output_file" 2>/dev/null; then
                echo -e "${GREEN}[${index}/${total}] OK${NC} (${filesize} bytes)"
                return 0
            fi
        fi
        
        # Remove invalid file
        rm -f "$output_file"
        echo -e "${RED}[${index}/${total}] ERR${NC} Fichier invalide"
        return 1
    else
        echo -e "${RED}[${index}/${total}] ERR${NC} Échec téléchargement"
        return 1
    fi
}

# Download all images
echo -e "\n${BLUE}Téléchargement des ${total_images} photos...${NC}\n"

local success=0
local failed=0
local index=1

while IFS= read -r url; do
    [[ -z "$url" ]] && continue
    
    if download_image "$url" "$index" "$total_images"; then
        ((success++))
    else
        ((failed++))
    fi
    ((index++))
    
    # Small delay to be nice to the server
    sleep 0.5
    
done < /tmp/unique_urls.txt

# Cleanup
rm -f "$TEMP_HTML" /tmp/image_urls.txt /tmp/unique_urls.txt

echo -e "\n${CYAN}================================${NC}"
echo -e "${GREEN}Téléchargement terminé!${NC}"
echo -e "Répertoire: ${OUTPUT_DIR}"
echo -e "${GREEN}Réussis: ${success}${NC} | ${RED}Échoués: ${failed}${NC}"
echo -e "${CYAN}================================${NC}"

# List downloaded files
ls -lh "$OUTPUT_DIR" 2>/dev/null | tail -n +2 || true

