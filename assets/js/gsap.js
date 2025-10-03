document.addEventListener('DOMContentLoaded', (event) => {
 // GSAP Animations
 gsap.registerPlugin(ScrollTrigger);

 // Smooth scrolling for navigation links
 document.querySelectorAll('a[href^="#"]').forEach(anchor => {
	 anchor.addEventListener('click', function (e) {
		 e.preventDefault();
		 const target = document.querySelector(this.getAttribute('href'));
		 if (target) {
			 target.scrollIntoView({
				 behavior: 'smooth',
				 block: 'start'
			 });
		 }
		});
	
		// Contact form toggle
		const btnMessage = document.getElementById('btn-message');
		const btnQuote = document.getElementById('btn-quote');
		const formMessage = document.getElementById('contactformcontainer');
		const formQuote = document.getElementById('offerteformcontainer');
	
		if (btnMessage && btnQuote && formMessage && formQuote) {
			// Set initial state
			gsap.set(formQuote, { autoAlpha: 0, height: 0 });
			gsap.set(formMessage, { autoAlpha: 1, height: "auto" });
	
			// Initial button styles: active (message) has no bg, inactive (quote) has bg
			btnMessage.classList.remove('bg-[#FF146E]');
			btnQuote.classList.add('bg-[#FF146E]');
	
			// Toggle functions
			function switchToMessage() {
				gsap.to(formQuote, { autoAlpha: 0, height: 0, duration: 0.5, ease: "power2.inOut" });
				gsap.to(formMessage, { autoAlpha: 1, height: "auto", duration: 0.5, ease: "power2.inOut" });
				formQuote.classList.add('h-0');
				formMessage.classList.remove('h-0');
				btnMessage.classList.remove('bg-[#FF146E]');
				btnQuote.classList.add('bg-[#FF146E]');
			}
	
			function switchToQuote() {
				gsap.to(formMessage, { autoAlpha: 0, height: 0, duration: 0.5, ease: "power2.inOut" });
				gsap.to(formQuote, { autoAlpha: 1, height: "auto", duration: 0.5, ease: "power2.inOut" });
				formMessage.classList.add('h-0');
				formQuote.classList.remove('h-0');
				btnQuote.classList.remove('bg-[#FF146E]');
				btnMessage.classList.add('bg-[#FF146E]');
			}
	
			// Event listeners
			btnMessage.addEventListener('click', switchToMessage);
			btnQuote.addEventListener('click', switchToQuote);
		}
	
		// Media upload thumbnails
		const mediaUpload = document.getElementById('media-upload');
		const thumbnails = document.getElementById('thumbnails');
		let selectedFiles = [];
	
		if (mediaUpload && thumbnails) {
			mediaUpload.addEventListener('change', function(event) {
				selectedFiles = Array.from(event.target.files);
				thumbnails.innerHTML = ''; // Clear previous thumbnails
	
				for (let i = 0; i < selectedFiles.length; i++) {
					const file = selectedFiles[i];
					const fileType = file.type;
	
					const thumbnailDiv = document.createElement('div');
					thumbnailDiv.className = 'relative bg-gray-700 rounded-lg overflow-hidden w-20 h-20';
					thumbnailDiv.dataset.index = i;
	
					if (fileType.startsWith('image/')) {
						const img = document.createElement('img');
						img.src = URL.createObjectURL(file);
						img.className = 'w-full h-full object-cover';
						thumbnailDiv.appendChild(img);
					} else if (fileType.startsWith('video/')) {
						const video = document.createElement('video');
						video.src = URL.createObjectURL(file);
						video.className = 'w-full h-full object-cover';
						video.controls = true;
						thumbnailDiv.appendChild(video);
					}
	
					// Add remove button
					const removeBtn = document.createElement('button');
					removeBtn.innerHTML = '×';
					removeBtn.className = 'absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm hover:bg-red-700';
					removeBtn.onclick = function() {
						const index = parseInt(thumbnailDiv.dataset.index);
						selectedFiles.splice(index, 1);
						thumbnailDiv.remove();
						// Update indices for remaining thumbnails
						const remainingThumbs = thumbnails.querySelectorAll('[data-index]');
						remainingThumbs.forEach((thumb, idx) => {
							thumb.dataset.index = idx;
						});
						// Update input files
						const dt = new DataTransfer();
						selectedFiles.forEach(f => dt.items.add(f));
						mediaUpload.files = dt.files;
					};
					thumbnailDiv.appendChild(removeBtn);
	
					thumbnails.appendChild(thumbnailDiv);
				}
			});
		}
	
		// Phone modal
		const phoneLink = document.getElementById('phone-link');
		const phoneModal = document.getElementById('phone-modal');
		const closeModal = document.getElementById('close-modal');
	
		if (phoneLink && phoneModal && closeModal) {
			phoneLink.addEventListener('click', function(e) {
				e.preventDefault();
				phoneModal.classList.remove('hidden');
				gsap.fromTo(phoneModal, { opacity: 0 }, { opacity: 1, duration: 0.3 });
			});
	
			closeModal.addEventListener('click', function() {
				gsap.to(phoneModal, { opacity: 0, duration: 0.3, onComplete: () => {
					phoneModal.classList.add('hidden');
				}});
			});
	
			// Close modal when clicking outside
			phoneModal.addEventListener('click', function(e) {
				if (e.target === phoneModal) {
					gsap.to(phoneModal, { opacity: 0, duration: 0.3, onComplete: () => {
						phoneModal.classList.add('hidden');
					}});
				}
			});
		}
	});

 // Achtergrondelementen uit de DOM verplaatsen en de JavaScript aanpassen
 // Map backgrounds to specific sections (skipping portfolio)
 const bgSections = [
   { section: '#home', bg: '.section-bg-home' },
   { section: '#diensten', bg: '.section-bg-diensten' },
   { section: '#voordelen', bg: '.section-bg-voordelen' },
   { section: '#over-ons', bg: '.section-bg-over-ons' },
   { section: '#contact', bg: '.section-bg-contact' }
 ];

 // Stel de eerste achtergrond in om direct zichtbaar te zijn
 gsap.set(document.querySelector('.section-bg-home'), { opacity: 1 });

 bgSections.forEach(({ section, bg }) => {
   const sec = document.querySelector(section);
   const bkg = document.querySelector(bg);
   if (sec && bkg) {
     ScrollTrigger.create({
       trigger: sec,
       start: "top 50%", // Begin de overgang wanneer de sectie in het midden van het scherm komt
       end: "bottom 50%", // Einde van de overgang wanneer de sectie het midden van het scherm verlaat
       onEnter: () => {
         gsap.to(bkg, { opacity: 1, duration: 0.5, ease: "power2.out" });
       },
       onLeave: () => {
         gsap.to(bkg, { opacity: 0, duration: 0.5, ease: "power2.out" });
       },
       onEnterBack: () => {
         gsap.to(bkg, { opacity: 1, duration: 0.5, ease: "power2.out" });
       },
       onLeaveBack: () => {
         gsap.to(bkg, { opacity: 0, duration: 0.5, ease: "power2.out" });
       }
     });
   }
 });

 // Fade in animations for content with overlapping triggers
 gsap.utils.toArray('.section-content').forEach((container, index) => {
  gsap.fromTo(container.children,
 	 { y: 50, opacity: 0 },
 	 {
 		 y: 0,
 		 opacity: 1,
 		 duration: 1,
 		 stagger: 0.2,
 		 ease: 'power2.out',
 		 scrollTrigger: {
 			 trigger: container,
 			 start: 'top 70%',
 			 end: 'bottom 30%',
 			 toggleActions: 'play none none reverse'
 		 }
 	 }
  );
 });

 // Snap-to-section functionality
 const snapSections = gsap.utils.toArray('.page-section');
 let snapPoints = [];

 // Calculate snap points for each section
 snapSections.forEach((section, index) => {
   if (index === 0) {
     snapPoints.push(0); // First section starts at top
   } else {
     snapPoints.push(section.offsetTop);
   }
 });

 // Create ScrollTrigger for snap functionality
 ScrollTrigger.create({
   trigger: "body",
   start: "top top",
   end: "max",
   snap: {
     snapTo: (value) => {
       // Find the closest snap point
       let closest = snapPoints[0];
       let minDistance = Math.abs(value - closest);

       snapPoints.forEach(point => {
         const distance = Math.abs(value - point);
         if (distance < minDistance) {
           minDistance = distance;
           closest = point;
         }
       });

       return closest / (document.body.scrollHeight - window.innerHeight);
     },
     duration: { min: 0.4, max: 1.0 },
     ease: "power2.inOut",
     directional: true,
     delay: 0.1
   },
   markers: false // Set to true for debugging
 });

 // Enhanced scroll experience with smoother snapping
 let lastScrollY = window.scrollY;
 let ticking = false;
 let scrollTimeout;

 function updateSnapPoints() {
   if (!ticking) {
     requestAnimationFrame(() => {
       snapPoints = [];
       snapSections.forEach((section, index) => {
         if (index === 0) {
           snapPoints.push(0);
         } else {
           snapPoints.push(section.offsetTop);
         }
       });
       ticking = false;
     });
     ticking = true;
   }
 }

 // Update snap points on window resize
 window.addEventListener('resize', updateSnapPoints);

 // Prevent snap during active scrolling
 window.addEventListener('wheel', () => {
   clearTimeout(scrollTimeout);
   scrollTimeout = setTimeout(() => {
     // Re-enable snap after scroll stops
   }, 150);
 });

 window.addEventListener('touchmove', () => {
   clearTimeout(scrollTimeout);
   scrollTimeout = setTimeout(() => {
     // Re-enable snap after touch stops
   }, 150);
 });

 // Optional: Add keyboard navigation for sections
 document.addEventListener('keydown', (e) => {
   if (e.key === 'ArrowDown' || e.key === 'PageDown') {
     e.preventDefault();
     const currentSection = getCurrentSection();
     const nextSection = snapSections[currentSection + 1];
     if (nextSection) {
       nextSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
     }
   } else if (e.key === 'ArrowUp' || e.key === 'PageUp') {
     e.preventDefault();
     const currentSection = getCurrentSection();
     const prevSection = snapSections[currentSection - 1];
     if (prevSection) {
       prevSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
     }
   }
 });

 function getCurrentSection() {
   const scrollY = window.scrollY;
   let currentIndex = 0;

   for (let i = 0; i < snapSections.length; i++) {
     if (scrollY >= snapSections[i].offsetTop - window.innerHeight / 2) {
       currentIndex = i;
     }
   }

   return currentIndex;
 }

 // Mobile menu toggle
 function toggleMobileMenu() {
	 const menu = document.getElementById('mobileMenu');
	 menu.classList.toggle('hidden');
 }

 // Header scroll effect
 window.addEventListener('scroll', function() {
	 const header = document.querySelector('header');
	 if (window.scrollY > 100) {
		 header.classList.add('bg-black/95');
	 } else {
		 header.classList.remove('bg-black/95');
		}
	});
	
	// Logo animations
	// Set initial state - clean logo hidden, full logo visible
	gsap.set("#logo-clean", { opacity: 0 });
	gsap.set("#logo-full", { opacity: 1 });
	
	// Page load animation - slide full logo down after 1 second
	gsap.from("#logo-full", {
		duration: 1,
		y: -100,
		opacity: 0,
		delay: 1,
		ease: "power2.out"
	});
	
	// Scroll effect using ScrollTrigger
	ScrollTrigger.create({
		trigger: "body",
		start: "top top",
		// end: "max",
		onEnter: () => {
			const logoFull = document.getElementById("logo-full");
			const logoClean = document.getElementById("logo-clean");

			if (logoFull) {
				// Fade out full logo and fade in clean logo
				gsap.to("#logo-full", {
					opacity: 0,
					duration: 0.5,
					ease: "power2.out",
					onComplete: function() {
						// Hide the full logo completely after fading out
						if (logoFull) {
							logoFull.classList.add("hidden");
						}
					}
				});
			}

			if (logoClean) {
				// Show and fade in clean logo
				logoClean.classList.remove("hidden");
				gsap.fromTo("#logo-clean",
					{ opacity: 0 },
					{ opacity: 1, duration: 0.5, ease: "power2.out" }
				);
			}
		},
		onLeaveBack: () => {
			const logoFull = document.getElementById("logo-full");
			const logoClean = document.getElementById("logo-clean");

			if (logoClean) {
				// Fade out clean logo and fade in full logo
				gsap.to("#logo-clean", {
					opacity: 0,
					duration: 0.5,
					ease: "power2.out",
					onComplete: function() {
						// Hide the clean logo completely after fading out
						if (logoClean) {
							logoClean.classList.add("hidden");
						}
					}
				});
			}

			if (logoFull) {
				// Show and fade in full logo
				logoFull.classList.remove("hidden");
				gsap.fromTo("#logo-full",
					{ opacity: 0 },
					{ opacity: 1, duration: 0.5, ease: "power2.out" }
				);
			}
		}
	});
});