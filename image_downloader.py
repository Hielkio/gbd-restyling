#!/usr/bin/env python3
"""
Media Downloader and Image Resizer Script

Downloads images and videos from a JSON file containing media URLs.
Images are resized to fit within a specified maximum resolution while maintaining aspect ratio.

Usage:
    python media_downloader.py <json_file> <output_dir> <max_width> <max_height>

Example:
    python media_downloader.py voidGrid/sources/ocean-life.json downloads 800 600
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
        print(f"Downloading image from: {image_url}")
        response = requests.get(image_url, timeout=10)
        response.raise_for_status()  # Raise an error for bad status codes

        img = Image.open(BytesIO(response.content))
        img.thumbnail((max_width, max_height), Image.Resampling.LANCZOS)
        img.save(output_path, format='JPEG')

        print(f"Downloaded and resized image: {output_path}")

    except requests.exceptions.RequestException as e:
        print(f"Error downloading {image_url}: {e}")
    except Exception as e:
        print(f"Error processing image {image_url}: {e}")

def download_video(video_url, output_path):
    """
    Downloads a video from the given URL and saves it.
    """
    try:
        print(f"Downloading video from: {video_url}")
        with requests.get(video_url, stream=True, timeout=300) as r:
            r.raise_for_status()
            with open(output_path, 'wb') as f:
                for chunk in r.iter_content(chunk_size=8192):
                    f.write(chunk)
        print(f"Downloaded video: {output_path}")

    except requests.exceptions.RequestException as e:
        print(f"Error downloading {video_url}: {e}")
    except Exception as e:
        print(f"Error processing video {video_url}: {e}")

def main():
    parser = argparse.ArgumentParser(description='Download and resize media from a JSON file.')
    parser.add_argument('json_file', help='Path to the JSON file containing media data')
    parser.add_argument('output_dir', help='Directory to save the downloaded media')
    parser.add_argument('max_width', type=int, help='Maximum width for resized images')
    parser.add_argument('max_height', type=int, help='Maximum height for resized images')

    args = parser.parse_args()

    try:
        with open(args.json_file, 'r', encoding='utf-8') as f:
            data = json.load(f)
    except FileNotFoundError:
        print(f"Error: JSON file '{args.json_file}' not found.")
        return
    except json.JSONDecodeError as e:
        print(f"Error parsing JSON: {e}")
        return

    os.makedirs(args.output_dir, exist_ok=True)

    for item in data:
        if 'id' not in item:
            print(f"Skipping item missing 'id': {item}")
            continue
        
        media_id = item['id']

        if 'image_url' in item:
            media_url = item['image_url']
            output_path = os.path.join(args.output_dir, f"{media_id}.jpg")
            download_and_resize_image(media_url, output_path, args.max_width, args.max_height)
        
        elif 'video_url' in item:
            media_url = item['video_url']
            file_extension = media_url.split('.')[-1]
            output_path = os.path.join(args.output_dir, f"{media_id}.{file_extension}")
            download_video(media_url, output_path)
            
        else:
            print(f"Skipping item missing 'image_url' or 'video_url': {item}")

if __name__ == '__main__':
    main()