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

    /* p#sub-text, p.sub-text {
        opacity: 0;
        transform: translateY(-20px) scale(0.8);
    } */

</style>

<section id="home" class="page-section">
    <div class="section-content container mx-auto px-6 text-center">
        <h2 id="main-text" class="text-6xl md:text-8xl font-bold mb-6 text-glow">
            <span id="text-span"></span>
            <span class="cursor"></span>
        </h2>
        <p id="sub-text" class="opacity-0 text-base sm:text-xl md:text-2xl lg:text-3xl mb-8">Professionele autoreparatie zonder verf of spuitwerk.</p>
        <div id="buttons" class="flex flex-col sm:flex-row gap-4 justify-center">
            <a class="opacity-0 gsap-btn-diensten" href="#diensten">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg text-xl transition-all duration-300 transform hover:scale-105">
                    Onze Diensten
                </button>
            </a>
            <a class="opacity-0 gsap-btn-contact" href="#contact">
                <button class="bg-[#FF146E] text-white hover:bg-blue-500 hover:text-white font-bold py-4 px-8 rounded-lg text-xl transition-all duration-300">
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

        const tl = gsap.timeline({
            onComplete: () => {
                // Verberg de knipperende cursor aan het einde van de animatie
                gsap.to(".cursor", { opacity: 0, duration: 0.5, onComplete: () => document.querySelector('.cursor').remove() });
            }
        });

        // Tekstinhoud
        const text1 = 'Schade gereden?';
        const text2 = 'Wij hebben dé oplossing...';
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

        // Wis de eerste zin
        .to(textSpan, {
            duration: 1.5,
            text: "",
            ease: "none"
        })

        // Animateer de tweede zin
        .to(textSpan, {
            duration: 2.5,
            text: text2,
            ease: "none"
        })
        .to({}, { duration: 0.5 }) // Pauze

        // Wis de tweede zin
        .to(textSpan, {
            duration: 1.5,
            text: "",
            ease: "none"
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

        // Fade in de knoppen met bounce-effect, één voor één
        .to(buttonPrimary, { 
            opacity: 1, 
            scale: 1, 
            duration: 0.8, 
            ease: "back.out(1.7)" 
        }, "-=0.4")
        .to(buttonSecondary, { 
            opacity: 1, 
            scale: 1, 
            duration: 0.8, 
            ease: "back.out(1.7)" 
        }, "-=0.4");
    });
</script>