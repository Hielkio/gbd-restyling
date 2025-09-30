<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Void Grid</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        :root {
            --grid-rows: 12;
            --grid-cols: 24;
        }

        #voidgrid {
            grid-template-rows: repeat(var(--grid-rows), minmax(0, 1fr));
            grid-template-columns: repeat(var(--grid-cols), minmax(0, 1fr));
        }

        .grid-block {
            transition: all 0.3s ease-in-out;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: 1px solid rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
    </style>
</head>
<body>

    <section class="h-[100vh] w-[100vw] relative p-4 md:p-8">
        <div id="voidgrid" class="grid w-full h-full gap-1"></div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const gridContainer = document.getElementById('voidgrid');
            const gridRows = 12;
            const gridCols = 24;
            const gridState = Array(gridRows).fill(null).map(() => Array(gridCols).fill(false));

            // De JSON-gegevens zijn hier direct in de code geplaatst.
            const imageData = [
                { "id": 344, "image_url": "ocean-life/344.jpg", "title": "Ocean Life photo from Pexels - A serene image of seagulls soaring in a clear blue sky, capturing flight and freedom.", "uploader": "Murat Ak", "artist": "Murat Ak", "category": "ocean life", "width": 6240, "height": 4160, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/flock-of-seagulls-flying-overhead-against-clear-blue-sky-33708306/", "scraped_at": "2025-09-03T11:05:48.077848" },
                { "id": 345, "image_url": "ocean-life/345.jpg", "title": "Ocean Life photo from Pexels - A serene sea turtle swims gracefully through clear Hawaiian waters beneath sunlit rays.", "uploader": "Jeremy Bishop", "artist": "Jeremy Bishop", "category": "ocean life", "width": 7952, "height": 5304, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/photo-of-sea-turtle-2765872/", "scraped_at": "2025-09-03T11:05:48.077851" },
                { "id": 346, "image_url": "ocean-life/346.jpg", "title": "Ocean Life photo from Pexels - Colorful jellyfish swimming gracefully in a vibrant underwater setting.", "uploader": "Tim Mossholder", "artist": "Tim Mossholder", "category": "ocean life", "width": 9000, "height": 6000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/jellfish-swimming-on-water-1000653/", "scraped_at": "2025-09-03T11:05:48.077851" },
                { "id": 347, "image_url": "ocean-life/347.jpg", "title": "Ocean Life photo from Pexels - Starfish and various shells scattered on a sandy beach, embodying coastal tranquility.", "uploader": "RDNE Stock project", "artist": "RDNE Stock project", "category": "ocean life", "width": 6512, "height": 4341, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/sea-shells-and-a-starfish-on-the-beach-sand-8456274/", "scraped_at": "2025-09-03T11:05:48.077852" },
                { "id": 348, "image_url": "ocean-life/348.jpg", "title": "Ocean Life photo from Pexels - Vibrant jellyfish with intricate tentacles beautifully photographed underwater.", "uploader": "Capture Blinks", "artist": "Capture Blinks", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/photo-of-jellyfish-2622208/", "scraped_at": "2025-09-03T11:05:48.077852" },
                { "id": 349, "image_url": "ocean-life/349.jpg", "title": "Ocean Life photo from Pexels - Two surfers with boards on sandy beach, ready to ride the ocean waves in sunny weather.", "uploader": "Adina Lavinia Moldovan", "artist": "Adina Lavinia Moldovan", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/man-and-woman-holding-surfboards-on-seashore-1053536/", "scraped_at": "2025-09-03T11:05:48.077852" },
                { "id": 350, "image_url": "ocean-life/350.jpg", "title": "Ocean Life photo from Pexels - A majestic eagle ray swimming gracefully in the clear Hawaiian waters.", "uploader": "Daniel Torobekov", "artist": "Daniel Torobekov", "category": "ocean life", "width": 9504, "height": 6336, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/eagle-ray-glides-underwater-in-hawaii-31740990/", "scraped_at": "2025-09-03T11:05:48.077852" },
                { "id": 351, "image_url": "ocean-life/351.jpg", "title": "Ocean Life photo from Pexels - Vibrant image of jellyfish gracefully swimming in the ocean, showing their delicate tentacles.", "uploader": "Scott Webb", "artist": "Scott Webb", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/four-brown-and-gray-jellyfishes-137608/", "scraped_at": "2025-09-03T11:05:48.077853" },
                { "id": 352, "image_url": "ocean-life/352.jpg", "title": "Ocean Life photo from Pexels - A beautiful sea turtle glides gracefully underwater amidst coral, illuminated by sun rays.", "uploader": "Nathan J Hilton", "artist": "Nathan J Hilton", "category": "ocean life", "width": 7988, "height": 4494, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/turtle-in-sea-17976451/", "scraped_at": "2025-09-03T11:05:48.077853" },
                { "id": 353, "image_url": "ocean-life/353.jpg", "title": "Ocean Life photo from Pexels - Mesmerizing underwater shot of dolphins swimming in clear Hawaiian waters with their reflections on the surface.", "uploader": "Daniel Torobekov", "artist": "Daniel Torobekov", "category": "ocean life", "width": 7469, "height": 5410, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/underwater-reflection-of-dolphins-in-hawaii-31740980/", "scraped_at": "2025-09-03T11:05:48.077853" },
                { "id": 354, "image_url": "ocean-life/354.jpg", "title": "Ocean Life photo from Pexels - A serene image of a glowing jellyfish gracefully swimming against a blue and purple background.", "uploader": "Scott Webb", "artist": "Scott Webb", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/jellyfish-clip-art-137612/", "scraped_at": "2025-09-03T11:05:48.077854" },
                { "id": 355, "image_url": "ocean-life/355.jpg", "title": "Ocean Life photo from Pexels - Dangerous shark with sharp teeth hunting in clean transparent water of vast blue ocean", "uploader": "Mile Ribeiro", "artist": "Mile Ribeiro", "category": "ocean life", "width": 7917, "height": 4958, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/scary-shark-opening-mouth-in-water-6497794/", "scraped_at": "2025-09-03T11:05:48.077854" },
                { "id": 356, "image_url": "ocean-life/356.jpg", "title": "Ocean Life photo from Pexels - Stunning aerial shot of a shark gliding through deep ocean waters.", "uploader": "Daniel Torobekov", "artist": "Daniel Torobekov", "category": "ocean life", "width": 6772, "height": 4517, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/view-of-shark-in-pelagic-waters-11348763/", "scraped_at": "2025-09-03T11:05:48.077854" },
                { "id": 357, "image_url": "ocean-life/357.jpg", "title": "Ocean Life photo from Pexels - Close up image of a sand crab on a beach showcasing natural textures and details.", "uploader": "Linken Van Zyl", "artist": "Linken Van Zyl", "category": "ocean life", "width": 6016, "height": 4016, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/crab-in-the-beach-sand-14949783/", "scraped_at": "2025-09-03T11:05:48.077854" },
                { "id": 358, "image_url": "ocean-life/358.jpg", "title": "Ocean Life photo from Pexels - Close-up black and white photo of a shark swimming in deep ocean waters.", "uploader": "Daniel Torobekov", "artist": "Daniel Torobekov", "category": "ocean life", "width": 6466, "height": 4090, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/wild-shark-swimming-in-dark-sea-waters-6970123/", "scraped_at": "2025-09-03T11:05:48.077855" },
                { "id": 359, "image_url": "ocean-life/359.jpg", "title": "Ocean Life photo from Pexels - Cute baby seal pup resting on a rocky mossy shoreline in its natural habitat.", "uploader": "Steve Burcham", "artist": "Steve Burcham", "category": "ocean life", "width": 6604, "height": 4403, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/adorable-baby-seal-pup-on-rocky-shoreline-28438772/", "scraped_at": "2025-09-03T11:05:48.077855" },
                { "id": 360, "image_url": "ocean-life/360.jpg", "title": "Ocean Life photo from Pexels - A mesmerizing jellyfish captivates against a vibrant blue ocean backdrop. Perfect for aquatic themes.", "uploader": "Scott Webb", "artist": "Scott Webb", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/white-jellyfish-i-2166926/", "scraped_at": "2025-09-03T11:05:48.077855" },
                { "id": 361, "image_url": "ocean-life/361.jpg", "title": "Ocean Life photo from Pexels - Monochrome close-up of a cuttlefish in its natural underwater rocky habitat.", "uploader": "René Wechet", "artist": "René Wechet", "category": "ocean life", "width": 7780, "height": 5186, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/sea-life-in-close-up-13589782/", "scraped_at": "2025-09-03T11:05:48.077856" },
                { "id": 362, "image_url": "ocean-life/362.jpg", "title": "Ocean Life photo from Pexels - Visitors at an aquarium viewing an underwater tunnel filled with diverse marine life.", "uploader": "Abdulmomen Bsruki", "artist": "Abdulmomen Bsruki", "category": "ocean life", "width": 6016, "height": 4016, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/woman-sitting-near-aquarium-1636514/", "scraped_at": "2025-09-03T11:05:48.077856" },
                { "id": 363, "image_url": "ocean-life/363.jpg", "title": "Ocean Life photo from Pexels - A serene underwater scene featuring a green sea turtle gently swimming in the clear blue ocean.", "uploader": "Jess Loiterton", "artist": "Jess Loiterton", "category": "ocean life", "width": 9000, "height": 7200, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/turtle-swimming-in-blue-water-5008467/", "scraped_at": "2025-09-03T11:05:48.077857" },
                { "id": 364, "image_url": "ocean-life/364.jpg", "title": "Ocean Life photo from Pexels - A mesmerizing jellyfish glowing underwater in a serene ocean scene.", "uploader": "Zetong Li", "artist": "Zetong Li", "category": "ocean life", "width": 8200, "height": 5446, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/glowing-jellyfish-underwater-9877702/", "scraped_at": "2025-09-03T11:05:48.077857" },
                { "id": 365, "image_url": "ocean-life/365.jpg", "title": "Ocean Life photo from Pexels - Mesmerizing image of jellyfish silhouetted against a vibrant blue background.", "uploader": "Scott Webb", "artist": "Scott Webb", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/jellyfish-wallpaper-2166916/", "scraped_at": "2025-09-03T11:05:48.077857" },
                { "id": 366, "image_url": "ocean-life/366.jpg", "title": "Ocean Life photo from Pexels - A lone jellyfish gracefully floats in a vibrant blue underwater setting.", "uploader": "Scott Webb", "artist": "Scott Webb", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/jellyfish-on-blue-background-2166920/", "scraped_at": "2025-09-03T11:05:48.077857" },
                { "id": 367, "image_url": "ocean-life/367.jpg", "title": "Ocean Life photo from Pexels - Group of dolphins swimming gracefully underwater in the ocean near Hawaii.", "uploader": "Daniel Torobekov", "artist": "Daniel Torobekov", "category": "ocean life", "width": 7952, "height": 4472, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/dolphins-in-the-sea-5410871/", "scraped_at": "2025-09-03T11:05:48.077858" },
                { "id": 368, "image_url": "ocean-life/368.jpg", "title": "Ocean Life photo from Pexels - Experience the thrill of surfing from above in this vibrant ocean scene.", "uploader": "Jess Loiterton", "artist": "Jess Loiterton", "category": "ocean life", "width": 9000, "height": 5996, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/aerial-view-of-people-surfing-on-sea-5232414/", "scraped_at": "2025-09-03T11:05:48.077858" },
                { "id": 369, "image_url": "ocean-life/369.jpg", "title": "Ocean Life photo from Pexels - Drone shot capturing a sea turtle swimming in crystal-clear turquoise ocean waters.", "uploader": "Jess Loiterton", "artist": "Jess Loiterton", "category": "ocean life", "width": 12000, "height": 7994, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/drone-shot-of-turtle-on-body-of-water-8650297/", "scraped_at": "2025-09-03T11:05:48.077858" },
                { "id": 370, "image_url": "ocean-life/370.jpg", "title": "Ocean Life photo from Pexels - A captivating underwater view of dolphins swimming gracefully in the ocean's clear blue depths.", "uploader": "Kammeran Gonzalez-Keola", "artist": "Kammeran Gonzalez-Keola", "category": "ocean life", "width": 6726, "height": 4486, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/undersea-view-of-swimming-dolphins-17823425/", "scraped_at": "2025-09-03T11:05:48.077858" },
                { "id": 371, "image_url": "ocean-life/371.jpg", "title": "Ocean Life photo from Pexels - Intriguing underwater scene featuring fish swimming in a dark marine environment.", "uploader": "Los Muertos Crew", "artist": "Los Muertos Crew", "category": "ocean life", "width": 7952, "height": 5304, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/close-up-photo-of-fish-underwater-8837882/", "scraped_at": "2025-09-03T11:05:48.077859" },
                { "id": 372, "image_url": "ocean-life/372.jpg", "title": "Ocean Life photo from Pexels - Colorful coral reef underwater with fish swimming in clear blue ocean.", "uploader": "Saad Alaiyadhi", "artist": "Saad Alaiyadhi", "category": "ocean life", "width": 6000, "height": 4000, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/orange-coral-in-a-reef-13010777/", "scraped_at": "2025-09-03T11:05:48.077859" },
                { "id": 373, "image_url": "ocean-life/373.jpg", "title": "Ocean Life photo from Pexels - Front view of a luxurious yacht anchored on a clear blue ocean under a vibrant sky.", "uploader": "Rachel Claire", "artist": "Rachel Claire", "category": "ocean life", "width": 6223, "height": 4149, "file_size": "Unknown", "tags": "ocean life, photos, pexels", "source_url": "https://www.pexels.com/photo/a-white-luxury-yacht-on-the-sea-6752179/", "scraped_at": "2025-09-03T11:05:48.077859" }
            ];

        // Combinatie van voorkeurs- en fallback-blokken, willekeurig gesorteerd
            const allBlockSizes = [
                { rows: 4, cols: 8 },
                { rows: 3, cols: 6 },
                { rows: 2, cols: 4 },
                // { rows: 2, cols: 2 },
                { rows: 3, cols: 2 },
                // { rows: 2, cols: 3 },
                { rows: 4, cols: 4 },
                // { rows: 1, cols: 2 }, 
                // { rows: 2, cols: 1 }, 
                { rows: 1, cols: 1 }
            ];

            function canPlaceBlock(startRow, startCol, rows, cols) {
                if (startRow + rows > gridRows || startCol + cols > gridCols) {
                    return false;
                }
                for (let r = startRow; r < startRow + rows; r++) {
                    for (let c = startCol; c < startCol + cols; c++) {
                        if (gridState[r][c] === true) {
                            return false;
                        }
                    }
                }
                return true;
            }

            function placeBlock(startRow, startCol, rows, cols, imageUrl) {
                const blockDiv = document.createElement('div');
                blockDiv.classList.add('grid-block');
                blockDiv.style.gridRowStart = startRow + 1;
                blockDiv.style.gridRowEnd = `span ${rows}`;
                blockDiv.style.gridColumnStart = startCol + 1;
                blockDiv.style.gridColumnEnd = `span ${cols}`;
                blockDiv.style.backgroundImage = `url(${imageUrl})`;

                gridContainer.appendChild(blockDiv);

                for (let r = startRow; r < startRow + rows; r++) {
                    for (let c = startCol; c < startCol + cols; c++) {
                        gridState[r][c] = true;
                    }
                }
            }

            function fillGrid() {
                const availableImages = [...imageData].sort(() => 0.5 - Math.random());
                let imageIndex = 0;

                for (let r = 0; r < gridRows; r++) {
                    for (let c = 0; c < gridCols; c++) {
                        if (gridState[r][c] === false) {
                            let blockPlaced = false;
                            const shuffledBlockSizes = [...allBlockSizes].sort(() => 0.5 - Math.random());

                            for (const size of shuffledBlockSizes) {
                                if (canPlaceBlock(r, c, size.rows, size.cols)) {
                                    const imageUrl = availableImages[imageIndex % availableImages.length].image_url;
                                    placeBlock(r, c, size.rows, size.cols, imageUrl);
                                    imageIndex++;
                                    blockPlaced = true;
                                    break;
                                }
                            }
                        }
                    }
                }
            }

            fillGrid();
        });
    </script>
</body>
</html>