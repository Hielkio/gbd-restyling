
<?php
// Lijst van alle lokale afbeeldingen
$allLocalImages = [
    "assets/images/hq/1.jpg",
    "assets/images/hq/3.jpg",
    "assets/images/hq/4.jpg",
    "assets/images/hq/5.jpg",
    "assets/images/hq/9.jpg",
    "assets/images/hq/10.jpeg",
    "assets/images/hq/12.jpg",
    "assets/images/hq/13.jpg",
    "assets/images/hq/14.jpg",
    "assets/images/hq/15.jpg",
    "assets/images/portfolio/close-up.jpg",
    "assets/images/portfolio/dent-repair2.jpg",
    "assets/images/portfolio/dent-repair3.jpg",
    "assets/images/portfolio/dent-repair4.webp",
    "assets/images/portfolio/dent-repair5.jpg",
    "assets/images/portfolio/dent-repair6.jpg",
    "assets/images/portfolio/hamer.webp",
    "assets/images/portfolio/quattro.webp",
    "assets/images/portfolio/small-dents.jpg",
    "assets/images/portfolio/veel-deukjes.webp",
    "assets/images/portfolio/vertical.webp",
    "assets/images/portfolio/voor-na.webp",
    "assets/images/portfolio/voor-na2.webp"
];

// Willekeurige volgorde van afbeeldingen
shuffle($allLocalImages);
$currentImages = array_slice($allLocalImages, 0, 11); // Neem eerste 11 afbeeldingen
?>

<section id="portfolio" class="page-section h-screen flex flex-col justify-center items-center py-0">
    <div class="section-content w-full h-full flex flex-col items-center justify-center relative">
        <!-- Titel en beschrijving -->
        <!-- <div class="absolute top-6 left-1/2 transform -translate-x-1/2 text-center z-20 bg-black/30 backdrop-blur-sm px-8 py-4 rounded-lg">
            <h2 class="text-4xl md:text-6xl font-bold mb-2 text-glow">Portfolio</h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Bekijk enkele van onze recente projecten</p>
        </div> -->

        <!-- Vaste Grid Container -->
        <div id="portfolioContainer" class="grid grid-cols-12 grid-rows-8 gap-8 w-full h-full p-4 overflow-hidden box-border">
            <div class="col-span-5 row-span-4 portfolio-item" data-index="0">
                <img src="<?php echo $currentImages[0]; ?>" alt="Portfolio afbeelding 1" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIiBmaWxsPSIjZmZmIj5BZmJlZWxkaW5nIG5pZXQgZ2VsYWRlbjwvdGV4dD48L3N2Zz4='; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-2 row-span-2 col-start-1 row-start-5 portfolio-item" data-index="1">
                <img src="<?php echo $currentImages[1]; ?>" alt="Portfolio afbeelding 2" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIiBmaWxsPSIjZmZmIj5BZmJlZWxkaW5nIG5pZXQgZ2VsYWRlbjwvdGV4dD48L3N2Zz4='; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-4 row-span-2 col-start-1 row-start-7 portfolio-item" data-index="2">
                <img src="<?php echo $currentImages[2]; ?>" alt="Portfolio afbeelding 3" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIiBmaWxsPSIjZmZmIj5BZmJlZWxkaW5nIG5pZXQgZ2VsYWRlbjwvdGV4dD48L3N2Zz4='; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-2 row-span-2 col-start-3 row-start-5 portfolio-item" data-index="3">
                <img src="<?php echo $currentImages[3]; ?>" alt="Portfolio afbeelding 4" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIiBmaWxsPSIjZmZmIj5BZmJlZWxkaW5nIG5pZXQgZ2VsYWRlbjwvdGV4dD48L3N2Zz4='; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-2 row-span-2 col-start-6 row-start-1 portfolio-item" data-index="4">
                <img src="<?php echo $currentImages[4]; ?>" alt="Portfolio afbeelding 5" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgi dGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iIGZpbGw9IiNmZmYiPkFmYmVlbGRpbmcgYW5kZXJlIGFmYmVlbGRpbmcgdGVsZGU8L3RleHQ+PC9zdmc+'; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-2 row-span-2 col-start-6 row-start-3 portfolio-item" data-index="5" style="background-color: #1B191A;">
                <img src="assets/images/logo.jpg" alt="Bedrijfslogo" class="bg-[#1B191A] w-full h-full !object-contain rounded-lg">
            </div>
            <div class="col-span-3 row-span-5 col-start-8 row-start-1 portfolio-item" data-index="6">
                <img src="<?php echo $currentImages[6]; ?>" alt="Portfolio afbeelding 7" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgi dGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iIGZpbGw9IiNmZmYiPkFmYmVlbGRpbmcgYW5kZXJlIGFmYmVlbGRpbmcgdGVsZGU8L3RleHQ+PC9zdmc+'; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-5 row-span-3 col-start-8 row-start-6 portfolio-item" data-index="7">
                <img src="<?php echo $currentImages[7]; ?>" alt="Portfolio afbeelding 8" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgi dGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iIGZpbGw9IiNmZmYiPkFmYmVlbGRpbmcgYW5kZXJlIGFmYmVlbGRpbmcgdGVsZGU8L3RleHQ+PC9zdmc+'; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-3 row-span-2 col-start-5 row-start-7 portfolio-item" data-index="8">
                <img src="<?php echo $currentImages[8]; ?>" alt="Portfolio afbeelding 9" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgi dGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iIGZpbGw9IiNmZmYiPkFmYmVlbGRpbmcgYW5kZXJlIGFmYmVlbGRpbmcgdGVsZGU8L3RleHQ+PC9zdmc+'; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-2 row-span-3 col-start-11 row-start-1 portfolio-item" data-index="9">
                <img src="<?php echo $currentImages[9]; ?>" alt="Portfolio afbeelding 10" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgi dGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iIGZpbGw9IiNmZmYiPkFmYmVlbGRpbmcgb2Z0ZSBvb28gYm9nZW48L3RleHQ+PC9zdmc+'; this.classList.add('error-image'); this.onerror=null;">
            </div>
            <div class="col-span-2 row-span-2 col-start-11 row-start-4 portfolio-item" data-index="10">
                <img src="<?php echo $currentImages[10]; ?>" alt="Portfolio afbeelding 11" class="w-full h-full object-cover rounded-lg" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMzMzIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtc2l6ZT0iMTgi dGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iIGZpbGw9IiNmZmYiPkFmYmVlbGRpbmcgYW5kZXJlIGFmYmVlbGRpbmcgdGVzdDwvdGV4dD48L3N2Zz4='; this.classList.add('error-image'); this.onerror=null;">
            </div>
        </div>

        <!-- "Bekijk Meer" knop -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-20">
            <button id="togglePortfolio" class="bg-black/90 backdrop-blur-md border-2 border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                Bekijk Meer Werk
            </button>
        </div>
    </div>
</section>

<!-- Lightbox element -->
<div id="lightbox">
    <div class="lightbox-overlay"></div>
    <div class="lightbox-content">
        <span id="closeLightbox" class="close-button">&times;</span>
        <div class="lightbox-image-container rounded-lg">
            <img id="lightboxImage" src="" alt="LightBox Image" class="lightbox-image">
        </div>
        <p id="lightboxDescription" class="mt-4 text-center text-lg max-w-2xl"></p>
        <div id="lightboxPrev" class="lightbox-arrow left">&#10094;</div>
        <div id="lightboxNext" class="lightbox-arrow right">&#10095;</div>
    </div>
</div>

<script type="module" src="assets/js/metalicss.js"></script>
<script>
    // Registreer de GSAP plugin
    gsap.registerPlugin(ScrollTrigger);

    // === Configuratie opties ===
    const CONFIG = {
        numImages: 11, // Aantal afbeeldingen om te tonen (gelijk aan aantal grid items)
        gap: '0rem', // Ruimte tussen de afbeeldingen
        border: 'border-4 border-white/70', // Rand/border rond de afbeeldingen
        sizeVariation: false, // Variabele grootte uitschakelen (grid is vast)
        minRowHeight: '200px', // De minimale hoogte van een rij in de grid
        lightbox: {
            overlayColor: 'rgba(0, 0, 0, 0.9)', // Kleur van de overlay
            imageDescriptions: {} // Geen beschrijvingen voor lokale afbeeldingen
        }
    };
    
    // Huidige set afbeeldingen voor lightbox (wordt gevuld vanuit DOM)
    let currentImages = [];

    const portfolioContainer = document.getElementById('portfolioContainer');
    const toggleButton = document.getElementById('togglePortfolio');

    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxDescription = document.getElementById('lightboxDescription');
    const lightboxPrev = document.getElementById('lightboxPrev');
    const lightboxNext = document.getElementById('lightboxNext');
    const closeLightboxBtn = document.getElementById('closeLightbox');
    const lightboxOverlay = document.querySelector('.lightbox-overlay');

    let currentImageIndex = 0;

    /**
     * Verzamel afbeeldingen vanuit de DOM (gegenereerd door PHP)
     */
    function collectImagesFromDOM() {
        const gridItems = document.querySelectorAll('.portfolio-item');
        currentImages = Array.from(gridItems).map(item => {
            const img = item.querySelector('img');
            return img ? img.src : '';
        }).filter(src => src !== '');
    }

    // === Lightbox logica ===
    function showLightbox(index) {
        // Verzamel afbeeldingen vanuit DOM voor lightbox
        collectImagesFromDOM();
        currentImageIndex = index;
        updateLightboxContent();
        lightbox.style.display = 'flex';
        gsap.fromTo(lightbox, {opacity: 0, scale: 0.8}, {opacity: 1, scale: 1, duration: 0.3});
    }

    function hideLightbox() {
        gsap.to(lightbox, {opacity: 0, scale: 0.8, duration: 0.3, onComplete: () => {
            lightbox.style.display = 'none';
        }});
    }
    
    function updateLightboxContent() {
        lightboxImage.src = currentImages[currentImageIndex];
        lightboxDescription.textContent = `Project ${currentImageIndex + 1}`;
    }

    function goToNextImage() {
        const nextIndex = (currentImageIndex + 1) % currentImages.length;
        transitionImage(nextIndex, 1);
    }
    
    function goToPrevImage() {
        const prevIndex = (currentImageIndex - 1 + currentImages.length) % currentImages.length;
        transitionImage(prevIndex, -1);
    }

    function transitionImage(newIndex, direction) {
        gsap.to(lightboxImage, {
            x: -direction * 100,
            opacity: 0,
            duration: 0.3,
            onComplete: () => {
                currentImageIndex = newIndex;
                updateLightboxContent();
                gsap.fromTo(lightboxImage, {
                    x: direction * 100,
                    opacity: 0
                }, {
                    x: 0,
                    opacity: 1,
                    duration: 0.3
                });
            }
        });
    }

    // Event listeners
    closeLightboxBtn.addEventListener('click', hideLightbox);
    lightboxOverlay.addEventListener('click', hideLightbox);
    lightboxNext.addEventListener('click', goToNextImage);
    lightboxPrev.addEventListener('click', goToPrevImage);

    // Swipe logica
    let touchstartX = 0;
    let touchendX = 0;

    const handleGesture = () => {
        if (touchendX < touchstartX - 50) {
            goToNextImage();
        }
        if (touchendX > touchstartX + 50) {
            goToPrevImage();
        }
    }

    lightboxImage.addEventListener('touchstart', e => {
        touchstartX = e.changedTouches[0].screenX;
    });

    lightboxImage.addEventListener('touchend', e => {
        touchendX = e.changedTouches[0].screenX;
        handleGesture();
    });

    // Voeg click event listeners toe aan portfolio items voor lightbox en metallic effect
    document.addEventListener('DOMContentLoaded', function() {
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        portfolioItems.forEach((item, index) => {
            item.addEventListener('click', () => showLightbox(index));
        });

        // Pas metallicss effect toe met steel kleur en padding voor border-achtig effect
        portfolioItems.forEach(item => {
            item.classList.add('metallicss');
            item.style.setProperty('--metal', 'lead');
            item.style.setProperty('--convexity', '4');
            item.style.padding = '8px';
            item.style.boxSizing = 'border-box';
            const img = item.querySelector('img');
            if (img) {
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover'; // Of 'contain' voor logo
            }
            // Random convexity voor variatie in shine
            const randomConvexity = Math.floor(Math.random() * 8) + 2; // 2-9 voor variatie
            item.style.setProperty('--convexity', randomConvexity.toString());
        });
    });

</script>