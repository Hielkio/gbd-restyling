#!/usr/bin/env python3
"""
Image Downloader and Resizer Script

Downloads images from a JSON file containing image URLs,
resizes them to fit within a specified maximum resolution while maintaining aspect ratio, and saves them.

Usage:
    python image_downloader.py <json_file> <output_dir> <max_width> <max_height>

Example:
    python image_downloader.py voidGrid/sources/ocean-life.json downloads 800 600
"""

import argparse
import json
import os
import requests
from PIL import Image
from io import BytesIO

def download_and_resize_image(image_url, output_path, max_width, max_height):
    """
    Downloads an image from the given URL, resizes it to fit within max dimensions while maintaining aspect ratio, and saves it.
    """
    try:
        response = requests.get(image_url, timeout=10)
        response.raise_for_status()  # Raise an error for bad status codes

        # Open the image from the response content
        img = Image.open(BytesIO(response.content))

        # Create a copy to avoid modifying the original
        img_copy = img.copy()

        # Resize the image to fit within max_width x max_height, maintaining aspect ratio
        img_copy.thumbnail((max_width, max_height), Image.Resampling.LANCZOS)

        # Save the resized image
        img_copy.save(output_path, format='JPEG')

        print(f"Downloaded and resized: {output_path}")

    except requests.exceptions.RequestException as e:
        print(f"Error downloading {image_url}: {e}")
    except Exception as e:
        print(f"Error processing image {image_url}: {e}")

def main():
    parser = argparse.ArgumentParser(description='Download and resize images from a JSON file.')
    parser.add_argument('json_file', help='Path to the JSON file containing image data')
    parser.add_argument('output_dir', help='Directory to save the resized images')
    parser.add_argument('max_width', type=int, help='Maximum width for resized images')
    parser.add_argument('max_height', type=int, help='Maximum height for resized images')

    args = parser.parse_args()

    # Load JSON data
    try:
        with open(args.json_file, 'r', encoding='utf-8') as f:
            data = json.load(f)
    except FileNotFoundError:
        print(f"Error: JSON file '{args.json_file}' not found.")
        return
    except json.JSONDecodeError as e:
        print(f"Error parsing JSON: {e}")
        return

    # Create output directory if it doesn't exist
    os.makedirs(args.output_dir, exist_ok=True)

    # Process each image
    for item in data:
        if 'image_url' not in item or 'id' not in item:
            print(f"Skipping item missing 'image_url' or 'id': {item}")
            continue

        image_url = item['image_url']
        image_id = item['id']
        output_path = os.path.join(args.output_dir, f"{image_id}.jpg")

        download_and_resize_image(image_url, output_path, args.max_width, args.max_height)

if __name__ == '__main__':
    main()