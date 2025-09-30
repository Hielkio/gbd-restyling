<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>
<style>
    .cursor {
        display: inline-block;
        width: 10px;
        height: 1em;
        vertical-align: middle;
        opacity: 1;
        animation: blink 0.8s infinite;
        background-color: white;
        border-right: 0px; 
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }

    #sub-text {
        opacity: 0;
        transform: translateY(-20px) scale(0.8);
    }

    .btn-blue {
        background-color: #2563eb;
    }
    .btn-blue:hover {
        background-color: #1d4ed8;
    }
    .btn-pink {
        background-color: #FF146E;
    }
    .btn-pink:hover {
        background-color: #db0a5e;
    }
</style>

<section id="home" class="page-section h-[calc(100vh-4rem)] flex flex-col justify-center items-center py-0">
    <div class="section-content container mx-auto px-6 text-center">
        <h2 id="main-text" class="text-6xl md:text-8xl font-bold mb-6 #dis-text-glow">
            <span id="text-span"></span>
            <span class="cursor"></span>
        </h2>
        <span><p id="sub-text" class="opacity-0 text-base sm:text-xl md:text-2xl lg:text-3xl font-bold mb-8">Professionele autoreparatie zonder verf of spuitwerk.</p></span>
        <div id="buttons" class="flex flex-col sm:flex-row gap-8 justify-center">
            <a class="opacity-0 gsap-btn-diensten" href="#diensten">
                <button class="btn-blue text-white font-bold py-4 px-8 rounded-lg text-xl transition-all duration-300 transform hover:scale-105">
                    Onze Diensten
                </button>
            </a>
            <a class="opacity-0 gsap-btn-contact" href="#contact">
                <button class="btn-pink text-white font-bold py-4 px-8 rounded-lg text-xl transition-all duration-300 transform hover:scale-105">
                    Vrijblijvende Offerte
                </button>
            </a>
        </div>
    </div>
</section>

<script>
    gsap.registerPlugin(TextPlugin);

    document.addEventListener('DOMContentLoaded', () => {
        const textSpan = document.getElementById('text-span');
        const subText = document.getElementById('sub-text');
        const buttonPrimary = document.querySelector('.gsap-btn-diensten');
        const buttonSecondary = document.querySelector('.gsap-btn-contact');
        gsap.set([buttonPrimary, buttonSecondary], {scale: 0.5});

        const tl = gsap.timeline({
            onComplete: () => {
                // Verberg de knipperende cursor aan het einde van de animatie
                gsap.to(".cursor", { opacity: 0, duration: 0.5 });
            }
        });

        // Tekstinhoud
        const text1 = 'Schade gereden?';
        const text2 = 'Wij hebben dé oplossing';
        const text3 = 'Uitdeuken zonder spuiten!';

        tl
        // Toon de cursor
        .to(".cursor", { duration: 0.5, opacity: 1 })
        
        // Animateer de eerste zin
        .to(textSpan, {
            duration: 1.5,
            text: text1,
            ease: "none"
        })
        .to({}, { duration: 0.5 }) // Pauze

        // Wis de eerste zin vloeiend zonder type-effect
        .to(textSpan, { opacity: 0, duration: 0.5, ease: "power2.out" })
        .call(() => {
            textSpan.innerHTML = "";
            gsap.set(textSpan, { opacity: 1 });
        })

        // Animateer de tweede zin
        .to(textSpan, {
            duration: 2.5,
            text: text2,
            ease: "none"
        })
        .to({}, { duration: 0.5 }) // Pauze

        // Wis de tweede zin vloeiend zonder type-effect
        .to(textSpan, { opacity: 0, duration: 0.5, ease: "power2.out" })
        .call(() => {
            textSpan.innerHTML = "";
            gsap.set(textSpan, { opacity: 1 });
        })
        
        // Animateer de laatste zin en laat deze staan
        .to(textSpan, {
            duration: 1.5,
            text: text3,
            ease: "none"
        })
        
        // Fade in de subtekst met inschuif- en zoom-effect
        .to(subText, { 
            opacity: 1, 
            y: 0, 
            scale: 1, 
            duration: 1, 
            ease: "power2.out" 
        }, "+=0.5")

        // Refined button animations: from small to zoom with subtle bounce, increased delay between buttons
        .to(buttonPrimary, {
            opacity: 1,
            scale: 1.1,
            duration: 0.4,
            ease: "back.out(1.1)"
        }, "-=0.2")
        .to(buttonPrimary, {
            scale: 1,
            duration: 0.4,
            ease: "power2.out"
        })
        .to({}, { duration: 0.6 }) // More time between buttons
        .to(buttonSecondary, {
            opacity: 1,
            scale: 1.1,
            duration: 0.4,
            ease: "back.out(1.1)"
        })
        .to(buttonSecondary, {
            scale: 1,
            duration: 0.4,
            ease: "power2.out"
        });

        // Hover color swap between buttons
        const primaryButton = document.querySelector('.gsap-btn-diensten button');
        const secondaryButton = document.querySelector('.gsap-btn-contact button');
        let isSwapped = false;

        const swapColors = () => {
            if (!isSwapped) {
                primaryButton.classList.remove('btn-blue');
                primaryButton.classList.add('btn-pink');
                secondaryButton.classList.remove('btn-pink');
                secondaryButton.classList.add('btn-blue');
                isSwapped = true;
            }
        };

        const revertColors = () => {
            if (isSwapped) {
                primaryButton.classList.remove('btn-pink');
                primaryButton.classList.add('btn-blue');
                secondaryButton.classList.remove('btn-blue');
                secondaryButton.classList.add('btn-pink');
                isSwapped = false;
            }
        };

        let revertTimeout;
        const scheduleRevert = () => {
            revertTimeout = setTimeout(revertColors, 150);
        };
        const cancelRevert = () => {
            if (revertTimeout) {
                clearTimeout(revertTimeout);
                revertTimeout = null;
            }
        };

        [primaryButton, secondaryButton].forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                swapColors();
                cancelRevert();
            });
            btn.addEventListener('mouseleave', scheduleRevert);
        });
    });
</script>