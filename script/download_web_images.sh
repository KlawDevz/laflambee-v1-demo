#!/usr/bin/env bash

# ==============================================================================
# Script: download_web_images.sh
# Description: Downloads all images from a specified webpage
# Usage: ./download_web_images.sh [URL] [OUTPUT_DIR]
# ==============================================================================

# Enable strict mode for better error handling
set -o errexit   # Exit on most errors
set -o nounset   # Disallow expansion of unset variables
set -o pipefail  # Fail pipelines if any command fails
set -o errtrace  # Better error tracing

# ==============================================================================
# Configuration
# ==============================================================================

# Color definitions
readonly RED='\033[0;31m'
readonly GREEN='\033[0;32m'
readonly YELLOW='\033[1;33m'
readonly BLUE='\033[0;34m'
readonly NC='\033[0m' # No Color

# Default values
DEFAULT_URL="https://www.laflambee09.fr/menu-et-carte"
DEFAULT_OUTPUT_DIR="./downloaded_images"
USER_AGENT="Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36"

# ==============================================================================
# Functions
# ==============================================================================

display_help() {
    cat << EOF
${BLUE}Usage:${NC} $0 [URL] [OUTPUT_DIR]

Downloads all images from a specified webpage to a local directory.

${BLUE}Arguments:${NC}
  URL         The webpage URL to scrape images from (default: $DEFAULT_URL)
  OUTPUT_DIR  Directory to save downloaded images (default: $DEFAULT_OUTPUT_DIR)

${BLUE}Options:${NC}
  -h, --help  Display this help message and exit
EOF
}

check_dependencies() {
    local missing_deps=()

    for cmd in curl grep sed mkdir basename; do
        if ! command -v "$cmd" >/dev/null 2>&1; then
            missing_deps+=("$cmd")
        fi
    done

    if [[ ${#missing_deps[@]} -gt 0 ]]; then
        echo -e "${RED}Error: Missing required commands:${NC}"
        for dep in "${missing_deps[@]}"; do
            echo "  - $dep"
        done
        exit 1
    fi
}

setup_output_dir() {
    local output_dir="$1"

    if [[ ! -d "$output_dir" ]]; then
        echo -e "${YELLOW}Creating output directory: $output_dir${NC}"
        if ! mkdir -p "$output_dir"; then
            echo -e "${RED}Error: Failed to create output directory $output_dir${NC}"
            exit 1
        fi
    fi

    if [[ ! -w "$output_dir" ]]; then
        echo -e "${RED}Error: Output directory $output_dir is not writable${NC}"
        exit 1
    fi
}

extract_image_urls() {
    local webpage_content="$1"
    local image_urls=()

    # Read URLs into array
    while IFS= read -r url; do
        image_urls+=("$url")
    done < <(grep -Eo 'https?://[^"]+\.(jpg|jpeg|png|gif|webp)' <<< "$webpage_content" | sort -u)

    echo "${image_urls[@]}"
}

download_image() {
    local image_url="$1"
    local output_dir="$2"
    local filename
    local output_path
    local http_status

    filename=$(basename "$image_url")
    output_path="$output_dir/$filename"

    if [[ -f "$output_path" ]]; then
        echo -e "${YELLOW}Skipping (already exists):${NC} $filename"
        return 0
    fi

    echo -e "${BLUE}Downloading:${NC} $filename"

    if ! http_status=$(curl -s -L -w "%{http_code}" -A "$USER_AGENT" \
        -o "$output_path" "$image_url" 2>/dev/null); then

        echo -e "${RED}Error: Failed to download $image_url${NC}"
        rm -f "$output_path"
        return 1
    fi

    if [[ "$http_status" -ge 400 ]]; then
        echo -e "${RED}Error: HTTP $http_status for $image_url${NC}"
        rm -f "$output_path"
        return 1
    fi

    return 0
}

main() {
    local url="${1:-$DEFAULT_URL}"
    local output_dir="${2:-$DEFAULT_OUTPUT_DIR}"
    local webpage_content
    local image_urls=()
    local success_count=0
    local fail_count=0
    local url_count=0

    check_dependencies

    echo -e "${GREEN}=== Web Image Downloader ===${NC}"
    echo -e "URL: $url"
    echo -e "Output directory: $output_dir"
    echo

    setup_output_dir "$output_dir"

    echo -e "${BLUE}Fetching webpage content...${NC}"
    if ! webpage_content=$(curl -s -A "$USER_AGENT" "$url"); then
        echo -e "${RED}Error: Failed to fetch webpage content from $url${NC}"
        exit 1
    fi

    echo -e "${BLUE}Extracting image URLs...${NC}"
    # Read extracted URLs into array
    while IFS= read -r url; do
        image_urls+=("$url")
    done < <(extract_image_urls "$webpage_content")

    url_count=${#image_urls[@]}

    if [[ $url_count -eq 0 ]]; then
        echo -e "${YELLOW}Warning: No images found on the page${NC}"
        exit 0
    fi

    echo -e "${GREEN}Found $url_count unique images${NC}"
    echo

    for image_url in "${image_urls[@]}"; do
        if download_image "$image_url" "$output_dir"; then
            ((success_count++))
        else
            ((fail_count++))
        fi
    done

    echo
    echo -e "${GREEN}=== Download Summary ===${NC}"
    echo -e "Successfully downloaded: ${GREEN}$success_count${NC}"
    echo -e "Failed downloads: ${RED}$fail_count${NC}"
    echo -e "Images saved to: ${BLUE}$output_dir${NC}"
}

# Handle help option
if [[ "$#" -gt 0 && ( "$1" == "-h" || "$1" == "--help" ) ]]; then
    display_help
    exit 0
fi

# Execute main function
main "$@"

