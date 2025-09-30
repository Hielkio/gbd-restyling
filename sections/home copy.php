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

        .buttons-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            font-weight: bold;
            border-radius: 9999px;
            transition: transform 0.2s, box-shadow 0.2s;
            opacity: 0;
            transform: scale(0.5);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }

        .btn-secondary {
            background-color: #ec4899;
            color: white;
        }

        #sub-text {
            opacity: 0;
            transform: translateY(-20px) scale(0.8);
        }

        #main-text {
            min-height: 1.5em; /* zorgt ervoor dat de hoogte vast is */
            line-height: 1.5;
        }
    </style>

<section id="home" class="page-section">
    <div class="section-content container mx-auto px-6 text-center">
        <h2 class="text-6xl md:text-8xl font-bold mb-6 text-glow">Uitdeuken Zonder Spuiten</h2>
        <p class="text-2xl md:text-3xl text-gray-200 mb-8 max-w-3xl mx-auto">Professionele autoreparatie zonder verf of spuitwerk</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#diensten">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg text-xl transition-all duration-300 transform hover:scale-105">
                    Onze Diensten
                </button>
            </a>
            <a href="#contact">
                <button class="#dis-border-2 bg-[#FF146E] text-white hover:bg-blue-500 hover:text-white font-bold py-4 px-8 rounded-lg text-xl transition-all duration-300">
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
        const buttonPrimary = document.querySelector('.btn-primary');
        const buttonSecondary = document.querySelector('.btn-secondary');

        const tl = gsap.timeline({
            onComplete: () => {
                // Verberg de knipperende cursor aan het einde van de animatie
                gsap.to(".cursor", { opacity: 0, duration: 0.5, onComplete: () => document.querySelector('.cursor').remove() });
            }
        });

        // Tekstinhoud
        const text1 = 'Schade gereden?';
        const text2 = 'Geen zorgen! Wij hebben dé oplossing...';
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