<?php

use App\Livewire\Footer\Foot;

new Foot;
?>
<div>
<footer class="bg-3d-green-radial rounded text-gray-300 w-full p-8 md:p-12">
    <div class="max-w-7xl mx-auto">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            <div class="mb-8 lg:mb-0">
                <h3 class="text-xl font-bold text-white mb-6 border-b-2 border-blue-500 pb-2">{{ __('footer.contact')}}</h3>
                
                <form wire:submit="sendMessage" class="space-y-6">
                    
                    <div>
                        <label for="name" class="">{{__('accueil.contactez_nous_nom')}}</label>
                        <input type="text" wire:model="nom" id="name" name="name" placeholder="{{__('accueil.contactez_nous_nom')}}" required 
                               class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200">
                               <x-input-error :messages="$errors->get('nom')" />

                    </div>
                    <div>
                        <label for="email" class="">{{__('accueil.contactez_nous_email')}}</label>
                        <input type="email" wire:model="email" id="email" name="email" placeholder="{{__('accueil.contactez_nous_email')}}" required 
                               class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200">
                            <x-input-error :messages="$errors->get('email')" />
                    </div>
                    <div>
                        <label for="message" class="">{{__('accueil.contactez_nous_message')}}</label>
                        <textarea id="message" wire:model="message" name="message" rows="4" placeholder="{{__('accueil.contactez_nous_message')}}" required 
                                  class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200"></textarea>
                                  <x-input-error :messages="$errors->get('message')" />

                    </div>
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 active:bg-blue-700/90 transition duration-300 shadow-lg">
                            {{__('accueil.contactez_nous_envoyer')}}
                    </button>
                    <input type="radio" name="" style="opacity: 0%" id="contacte">
                </form>

                <div class="mt-8 text-sm">
                    <p class="font-semibold text-white mb-3">{{__('accueil.nous_appelez')}} :</p>
                    <a href="tel:+262" class="hover:text-white transition duration-200 block mb-2">
                        <i class="fas fa-phone-alt mr-2 text-blue-500"></i> +262.........
                    </a>
                    <a href="https://wa.me/262" target="_blank" class="hover:text-white transition duration-200 block text-green-400">
                        <i class="bi bi-whatsapp mr-2 text-green-500"></i> WhatsApp
                    </a>
                </div>
            </div>

            <div class="mb-8 lg:mb-0">
                <h3 class="text-xl font-bold text-white mb-6 border-b-2 border-blue-500 pb-2">{{ __('accueil.showroom_title') }}</h3>
                
                <div class="w-full h-64 bg-gray-800 rounded-xl overflow-hidden shadow-2xl flex items-center justify-center text-center text-sm text-gray-500">
                    <p>
                        <i class="fas fa-map-marker-alt text-4xl mb-4 text-blue-500"></i><br>
                        {{__('accueil.showroom_maps')}}<br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3778.6835266851173!2d47.46046754988075!3d-18.841455999516625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f081ceb7e49c35%3A0x124bfa4ee7d574e1!2sScore%20Talatamaty!5e0!3m2!1sfr!2smg!4v1700000000000!5m2!1sfr!2smg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                </div>
            </div>

            <div class="mb-8 lg:mb-0">
                <h3 class="text-xl font-bold text-white mb-6 border-b-2 border-blue-500 pb-2">{{ __('accueil.information_title')}}</h3>
                <ul class="space-y-4">
                    <li>
                        <span style="cursor:pointer" class="hover:text-white transition duration-200" x-on:click.prevent="$dispatch('open-modal','mention')">
                            {{ __('accueil.information_1')}}
                        </span>
                        <x-modal name="mention">
                                @include('footer.mention_legale')
                        </x-modal>
                    </li>
                    <li>
                        <a href="#contacte" class="hover:text-white transition duration-200">
                        {{ __('accueil.information_2')}}
                        </a>
                    </li>
                    <li>
                        <span style="cursor:pointer" x-on:click.prevent="$dispatch('open-modal','blog')" class="hover:text-white transition duration-200">
                        {{ __('accueil.information_3')}}
                        </span>
                        <x-modal name="blog">
                                @include('commentaire')
                        </x-modal>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold text-white mb-6 border-b-2 border-blue-500 pb-2">{{ __('accueil.suivez_nous')}}
                </h3>
                <div class="flex space-x-6 mt-4">
                    <a href="https://instagram.com/..." target="_blank" class="text-gray-400 hover:text-white transition duration-200 transform hover:scale-110">
                        <i class="bi bi-instagram text-brown text-3d-red-linear text-3xl"></i>
                        <span class="">Instagram</span>
                    </a>
                    
                    <a href="https://facebook.com/..." target="_blank" class="hover:text-white transition duration-200 transform hover:scale-110">
                        <i class="bi bi-facebook text-blue  text-3xl"></i>
                        <span class="">Facebook</span>
                    </a>
                    <a href="https://twitter.com/..." target="_blank" class="hover:text-white transition duration-200 transform hover:scale-110">
                        <i class="bi bi-twitter text-blue  text-3xl"></i>
                        <span class="">twitter</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="border-t border-gray-800  mt-12 pt-8 text-center text-sm text-white">
            <p>&copy; 2025 {{ __('accueil.banniere_hero_title') }}. Tous droits réservés.</p>
        </div>

    </div>
</footer>

</div>
