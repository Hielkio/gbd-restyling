<section id="contact" class="page-section h-[calc(100vh-4rem)] flex flex-col justify-center items-center py-0">
        <div class="section-content container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-5xl md:text-7xl font-bold mb-4 #dis-text-glow">Contact</h2>
                <p class="text-2xl font-bold text-gray-300 max-w-2xl mx-auto">Neem contact met ons op</p>
            </div>
            
            <div class="max-w-5xl mx-auto #dis-grid #dis-md:grid-cols-2 gap-12">
                <div class="text-xl bg-black/40 backdrop-blur-sm rounded-lg p-8 mb-4 border border-gray-700">
                    <!-- <h3 class="text-2xl font-bold mb-6 text-white">Contactgegevens</h3> -->
                    <div class="flex gap-8 justify-between">
                        <div class="flex items-center space-x-4">
                            <div>
                                <div class="flex items-center gap-2 text-gray-400">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Adres</span>
                                </div>
                                <div class="text-white">Autolaan 123, 1234 AB Amsterdam</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div>
                                <div class="flex items-center gap-2 text-gray-400">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span>Telefoon<span>
                                </div>
                                <div class="text-white">020 - 123 4567</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div>
                                <div class="flex items-center gap-2 text-gray-400">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>    
                                    <span>Email</span>
                                </div>
                                <div class="text-white">info@uitdeukenzonderspuiten.nl</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-black/40 backdrop-blur-sm rounded-lg p-8 border border-gray-700">
                    <h3 class="flex gap-2 items-center text-2xl font-bold text-white">
                        <button id="btn-message" class="flex h-full items-center justify-center text-lg px-4 py-2 rounded">Bericht sturen</button>
                        <button id="btn-quote" class="flex h-full items-center justify-center text-lg px-4 py-2 bg-[#FF146E] rounded">Offerte aanvragen</button>
                    </h3>
                    <div id="contactformcontainer" class="overflow-hidden">
                        <!-- <h3 class="flex items-center gap-4 text-2xl font-bold mb-6 text-white"><span>Stuur ons een bericht</span><span class="text-lg">of</span><button class="flex h-full items-center justify-center text-lg px-4 py-2 bg-[#FF146E] rounded">vraag een offerte aan</button></h3> -->
                        <p class="my-4 mb-8">Heeft u een vraag, of behoefte aan vakkundig advies, stuur ons dan gerust een bericht door onderstaand formulier in te vullen. We reageren altijd op korte termijn met een passende reactie.</p>
                        <form id="contactform" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <input type="text" placeholder="Naam" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                                <div>
                                    <input type="text" placeholder="Bedrijfsnaam (optioneel)" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                                <div>
                                    <input type="email" placeholder="Email" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                                <div>
                                    <input type="tel" placeholder="Telefoonnummer" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                            </div>
                            <div>
                                <textarea placeholder="Schrijf hier uw bericht" rows="4" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105">
                                Bericht versturen
                            </button>
                        </form>
                    </div>
                    <div id="offerteformcontainer" class="h-0 overflow-hidden">
                        <p class="my-4 mb-8">Om een goede inschatting te kunnen maken hebben we zoveel mogelijk relevante informatie nodig. Voeg waar mogelijk ook foto's toe, zodat wij een goed beeld krijgen van de situatie.</p>
                        <form id="offerteform" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <input type="text" placeholder="Naam" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                                <div>
                                    <input type="text" placeholder="Bedrijfsnaam (optioneel)" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                                <div>
                                    <input type="email" placeholder="Email" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                                <div>
                                    <input type="tel" placeholder="Telefoonnummer" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white">
                                </div>
                            </div>
                            <div>
                                <textarea placeholder="Beschrijf uw schade" rows="4" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white"></textarea>
                            </div>
                            <div>
                                <label for="media-upload" class="block text-white mb-2">Upload afbeeldingen of video's (optioneel)</label>
                                <input type="file" id="media-upload" name="media[]" multiple accept="image/*,video/*" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-blue-500 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                                <div id="thumbnails" class="flex gap-2 mt-4"></div>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105">
                                Offerte Aanvragen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>