<section id="portfolio" class="page-section min-h-screen flex items-center py-20">
    <div class="section-content container mx-auto px-6 w-full">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-7xl font-bold mb-4 text-glow">Portfolio</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Bekijk enkele van onze recente projecten</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 grid-rows-2 gap-4 h-screen p-4">
            <?php
            // Create the new layout structure
            if (count($images) >= 5) {
                // Main rotating image element (spans 2 rows)
                echo "<div id="rotating-image" class="col-span-1 row-span-2 bg-black/40 backdrop-blur-sm rounded-lg overflow-hidden border-2 border-gray-700">";
                echo "    <img src="" . $imageDir . $images[0] . "" alt="Grote demo afbeelding" class="w-full h-full object-cover">";
                echo "</div>";
                
                // Four static image elements
                for ($i = 1; $i <= 4; $i++) {
                    $randomImage = $images[array_rand($images)];
                    $randomCategory = $categories[array_rand($categories)];
                    $randomTitle = $titles[array_rand($titles)];
                    
                    echo "<div class="col-span-1 row-span-1 bg-black/40 backdrop-blur-sm rounded-lg overflow-hidden border border-gray-700 portfolio-item">";
                    echo "    <div class="h-full overflow-hidden">";
                    echo "        <img src="" . $imageDir . $randomImage . "" alt="" . $randomTitle . "" class="w-full h-full object-cover">";
                    echo "    </div>";
                    echo "    <div class="p-4">";
                    echo "        <div class="text-blue-400 text-sm mb-2">" . $randomCategory . "</div>";
                    echo "        <h3 class="text-lg font-bold">" . $randomTitle . "</h3>";
                    echo "    </div>";
                    echo "</div>";
                }
            } else {
                // If not enough images, display a message
                echo "<div class="col-span-3 text-center text-gray-400 py-12">";
                echo "    <p>Minimaal 5 portfolio-afbeeldingen vereist voor deze layout.</p>";
                echo "    <p class="mt-2 text-sm">Voeg meer afbeeldingen toe aan de map: " . $imageDir . "</p>";
                echo "</div>";
            }
            ?>
        </div>
            }
            ?>
        </div>

        <div class="text-center mt-12">
            <button class="border-2 border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white font-bold py-3 px-6 rounded-lg transition-all duration-300">
                Bekijk Meer Werk
            </button>
        </div>
    </div>
</section>

<script>
// Portfolio GSAP animations
document.addEventListener('DOMContentLoaded', function() {
    // Rotating image functionality
    const rotatingImage = document.getElementById('rotating-image');
    const imageDir = 'assets/images/portfolio/';
    
    // Get all images from PHP (we'll use a simple approach)
    const allImages = <?php echo json_encode(array_slice($images, 0, 10)); ?>;
    
    if (rotatingImage && allImages && allImages.length > 0) {
        let currentIndex = 0;
        const imgElement = rotatingImage.querySelector('img');
        
        // Change image every 5 seconds
        setInterval(() => {
            currentIndex = (currentIndex + 1) % allImages.length;
            if (imgElement) {
                // Fade out
                gsap.to(imgElement, {
                    opacity: 0,
                    duration: 0.5,
                    onComplete: () => {
                        // Change source
                        imgElement.src = imageDir + allImages[currentIndex];
                        // Fade in
                        gsap.to(imgElement, {
                            opacity: 1,
                            duration: 0.5
                        });
                    }
                });
            }
        }, 5000);
    }
    
    // Add random positioning effect to portfolio items
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    portfolioItems.forEach((item, index) => {
        // Set initial random position
        gsap.set(item, {
            x: (Math.random() - 0.5) * 100,
            y: (Math.random() - 0.5) * 100,
            opacity: 0,
            rotation: (Math.random() - 0.5) * 20
        });

        // Animate items into place
        gsap.to(item, {
            x: 0,
            y: 0,
            opacity: 1,
            rotation: 0,
            duration: 1,
            delay: index * 0.2,
            ease: "back.out(1.7)"
        });
    });
});
</script>
