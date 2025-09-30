import json
import sys
import time
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By

def scrape_images(theme):
    options = Options()
    options.add_argument('--headless')  # Run in background
    options.add_argument('--no-sandbox')
    options.add_argument('--disable-dev-shm-usage')
    driver = webdriver.Chrome(options=options)
    
    url = f"https://alphacoders.com/wallpapers?search={theme}"
    driver.get(url)
    time.sleep(5)  # Wait for page to load
    
    images = []
    img_elements = driver.find_elements(By.TAG_NAME, 'img')
    for img in img_elements:
        if len(images) >= 30:
            break
        src = img.get_attribute('src')
        if src and 'alphacoders' in src.lower():
            # Ensure full URL
            if src.startswith('//'):
                src = 'https:' + src
            elif src.startswith('/'):
                src = 'https://alphacoders.com' + src
            images.append(src)
    
    driver.quit()
    return images

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python scraper.py <theme>")
        print("Example: python scraper.py animals")
        sys.exit(1)

    theme = sys.argv[1]
    images = scrape_images(theme)
    data = {theme: images}
    with open('scraped_images.json', 'w') as f:
        json.dump(data, f, indent=4)
    print(f"Scraped {len(images)} images for theme '{theme}' and saved to scraped_images.json")
