<!DOCTYPE html>
<html lang="nl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uitdeuken Zonder Spuiten - Professionele Autoreparatie</title>
    <link rel="stylesheet" href="assets/css/styles.css?v=3">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="assets/js/gsap.js?v=4" defer></script>
</head>
<body class="bg-gray-900 text-white text-xl overflow-x-hidden">
    <header class="fixed top-0 left-0 right-0 z-50 bg-black/70 backdrop-blur-sm border-b border-gray-700">
        <div class="container mx-auto px-6 py-6 h-16 overflow-visible relative flex relative items-center justify-between">
            <!-- <div class="flex h-32 w-64 items-center space-x-4 relative"> -->
                <div class="absolute left-0 t-0 py-1 px-2 h-full bg-[#1B191A]">
                    <div class="relative flex bg-[#1B191A] items-center h-full">
                        <img id="logo-cleanz" src="images/logo-clean.jpg" class="#temp-hidden h-full">
                        <img src="images/restyling.jpg" class="h-1/3">
                        <!-- <img src="images/uitdeukenzonderspuiten.jpg" class="h-3/8"> -->
                        <!-- <img src="images/restyling-uitdeukenzonderspuiten.jpg" class="h-2/3"> -->
                        <img id="logo-full" src="images/logo.jpg" class="!hidden absolute border-4 border-gray-500 border-t-0 object-contain bg-[#1B191A] py-0 px-4 top-0 left-0 h-48 w-72 z-30" height="200" width="400" alt="Logo GBD Restyling" />
                    </div>
                </div>
            <!-- </div> -->

            <nav class="text-xl ml-auto font-bold md:flex space-x-8">
                <a href="#home" class="menu-item text-gray-300 hover:text-blue-400">Home</a>
                <a href="#portfolio" class="menu-item text-gray-300 hover:text-blue-400">Impressie</a>
                <a href="#diensten" class="menu-item text-gray-300 hover:text-blue-400">Diensten</a>
                <a href="#voordelen" class="menu-item text-gray-300 hover:text-blue-400">Voordelen</a>
                <a href="#over-ons" class="menu-item text-gray-300 hover:text-blue-400">Over Ons</a>
                <a href="#contact" class="menu-item text-gray-300 hover:text-blue-400">Contact</a>
            </nav>

            <button class="md:hidden text-gray-300 hover:text-white" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <nav id="mobileMenu" class="hidden md:hidden bg-black/90 backdrop-blur-sm border-t border-gray-700">
            <div class="px-6 py-4 space-y-3">
                <a href="#home" class="block text-gray-300 hover:text-blue-400">Home</a>
                <a href="#portfolio" class="block text-gray-300 hover:text-blue-400">Portfolio</a>
                <a href="#diensten" class="block text-gray-300 hover:text-blue-400">Diensten</a>
                <a href="#voordelen" class="block text-gray-300 hover:text-blue-400">Voordelen</a>
                <a href="#over-ons" class="block text-gray-300 hover:text-blue-400">Over Ons</a>
                <a href="#contact" class="block text-gray-300 hover:text-blue-400">Contact</a>
            </div>
        </nav>
    </header>
    <div class="section-bg section-bg-home opacity-100"></div>
    <div class="section-bg section-bg-diensten"></div>
    <div class="section-bg section-bg-voordelen"></div>
    <div class="section-bg section-bg-over-ons"></div>
    <div class="section-bg section-bg-contact"></div>
    <div class="section-overlay"></div>
    
    <div class="pt-16">
        <?php // include "sections/home.php"; ?>
        <?php // include "sections/portfolio-new3.php"; ?>
        <?php // include "sections/diensten.php"; ?>
        <?php // include "sections/voordelen.php"; ?>
        <?php // include "sections/over-ons.php"; ?>
        <?php include "sections/contact-new.php"; ?>
    </div>


    <footer class="bg-black/90 backdrop-blur-sm border-t border-gray-700 py-8 relative z-30">
        <div class="container mx-auto px-6 text-center">
            <div class="text-gray-400 mb-4">
                © 2025 GBD Restyling - Alle rechten voorbehouden.
            </div>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>