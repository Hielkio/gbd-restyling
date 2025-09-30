<section id="portfolio" class="page-section h-screen flex items-center py-0">
    <div class="section-content w-full h-full relative">
        <!-- <div class="absolute top-6 left-1/2 transform -translate-x-1/2 text-center z-10 bg-black/30 backdrop-blur-sm px-8 py-4 rounded-lg">
            <h2 class="text-4xl md:text-6xl font-bold mb-2 text-glow">Portfolio</h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Bekijk enkele van onze recente projecten</p>
        </div> -->

        <!-- Dynamische Masonry Container -->
        <div id="portfolioContainer" class="portfolio-masonry-container absolute #dis-inset-0 p-8 pt-44">
            <!-- Afbeeldingen worden hier door JavaScript toegevoegd -->
        </div>

        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-10">
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

<script>
// Registreer de GSAP plugin
gsap.registerPlugin(ScrollTrigger);

// === Configuratie opties ===
const CONFIG = {
    numImages: 10, // Aantal afbeeldingen om te tonen
    gap: '2rem', // Ruimte tussen de afbeeldingen
    border: 'border-2 border-blue-500', // Rand/border rond de afbeeldingen
    sizeVariation: true, // Variabele grootte inschakelen
    minRowHeight: '200px', // De minimale hoogte van een rij in de grid
    lightbox: {
        overlayColor: 'rgba(0, 0, 0, 0.9)', // Kleur van de overlay
        imageDescriptions: {
            // Beschrijvingen voor portfolio afbeeldingen worden dynamisch toegevoegd
        }
    }
};

// === Portfolio afbeeldingen lijst ===
const portfolioImages = [
    "assets/images/portfolio/close-up.jpg",
    "assets/images/portfolio/dent-repair.avif",
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
 * Genereert de portfolio items en voegt deze toe aan de container.
 * Alle items passen netjes in een 12x12 grid binnen de viewport.
 */
function generatePortfolio() {
    console.log('Generating portfolio...');
    portfolioContainer.innerHTML = ''; // Maak de container leeg

    // Grid styling rechtstreeks op de container
    portfolioContainer.style.display = 'grid';
    portfolioContainer.style.gridTemplateColumns = 'repeat(12, 1fr)';
    portfolioContainer.style.gridAutoRows = 'minmax(50px, 1fr)';
    portfolioContainer.style.gap = CONFIG.gap;
    portfolioContainer.style.height = '100%';
    portfolioContainer.style.width = '100%';

    // Mogelijke span groottes (col/row)
    const spanOptions = [
        {col: 2, row: 2},
        {col: 3, row: 2},
        {col: 2, row: 3},
        {col: 3, row: 3},
        {col: 4, row: 3}
    ];

    for (let i = 0; i < portfolioImages.length; i++) {
        const itemDiv = document.createElement('div');
        itemDiv.className = `portfolio-item rounded-lg overflow-hidden relative shadow-lg group cursor-pointer transform transition-transform duration-300 hover:scale-105 ${CONFIG.border}`;
        itemDiv.setAttribute('data-index', i);

        // Kies random span
        let span = {col: 1, row: 1};
        if (CONFIG.sizeVariation) {
            span = spanOptions[Math.floor(Math.random() * spanOptions.length)];
        }

        // Zet de grid spans (maar max 12!)
        itemDiv.style.gridColumn = `span ${Math.min(span.col, 12)}`;
        itemDiv.style.gridRow = `span ${Math.min(span.row, 12)}`;

        const imageUrl = portfolioImages[i];

        itemDiv.innerHTML = `
            <img src="${imageUrl}" 
                 alt="Portfolio afbeelding ${i + 1}" 
                 class="w-full h-full object-cover rounded-lg transition-transform duration-300 group-hover:scale-110" 
                 onerror="console.error('Failed to load image:', '${imageUrl}'); this.style.display='none';" 
                 onload="console.log('Loaded image:', '${imageUrl}')">
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-4 text-center overlay">
                <p class="text-lg font-bold">Project ${i + 1}</p>
            </div>
        `;

        itemDiv.addEventListener('click', () => showLightbox(i));

        portfolioContainer.appendChild(itemDiv);
    }
}


/**
 * Stelt de ScrollTrigger in voor het "snappen" naar de afbeeldingen.
 */
function setupScrollSnap() {
    // Vernietig een bestaande ScrollTrigger om conflicten te voorkomen
    if (portfolioContainer.scrollTrigger) {
        portfolioContainer.scrollTrigger.kill();
    }

    // Creëer een array van de top-posities van elke afbeelding voor het snappen
    let snapPoints = [];
    const items = gsap.utils.toArray(".portfolio-item");
    items.forEach(item => {
        snapPoints.push(item.offsetTop);
    });

    // Filter duplicaten uit de snap-posities, want meerdere items kunnen op dezelfde Y-positie staan
    snapPoints = [...new Set(snapPoints)];

    ScrollTrigger.create({
        trigger: portfolioContainer,
        start: "top top", // De trigger begint bovenaan de container
        end: "bottom top", // De trigger eindigt onderaan de container
        scrub: true,
        snap: {
            snapTo: snapPoints,
            duration: {min: 0.2, max: 0.6},
            ease: "power1.inOut"
        },
        markers: false // Voor debugging, zet op true
    });
}

// === Lightbox logica ===
function showLightbox(index) {
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
    lightboxImage.src = portfolioImages[currentImageIndex];
    const description = CONFIG.lightbox.imageDescriptions[portfolioImages[currentImageIndex]] || 'Portfolio project - professionele autoreparatie';
    lightboxDescription.textContent = description;
}

function goToNextImage() {
    const nextIndex = (currentImageIndex + 1) % portfolioImages.length;
    transitionImage(nextIndex, 1);
}

function goToPrevImage() {
    const prevIndex = (currentImageIndex - 1 + portfolioImages.length) % portfolioImages.length;
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
toggleButton.addEventListener('click', generatePortfolio);
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

// Genereer de eerste set afbeeldingen bij het laden van de pagina
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing portfolio...');
    console.log('Portfolio images:', portfolioImages);
    console.log('Portfolio container:', portfolioContainer);
    console.log('Toggle button:', toggleButton);

    if (portfolioContainer && toggleButton) {
        generatePortfolio();
        console.log('Portfolio initialized successfully');
    } else {
        console.error('Portfolio container or toggle button not found!');
    }
});
</script>