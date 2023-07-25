<div class="p-2 shadow-sm">
    <form method="POST" wire:submit.prevent="edit">
        @csrf
        @method('POST')
        @if(Session::get('error'))
            <div class="p-5">
                <div class="border-red-500 bg-red-500 animate-bounce text-white">{{ Session::get('error') }}</div>
            </div>
        @endif
        <div class="p-5 flex flex-col gap-4">
            
            <div class="block">
                <x-label  value="{{ __('Prénom') }}" />
                <input type="text"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('prenom')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="prenom">
                @error('prenom')
                    <div class="text-red-500 mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="block">
                <x-label  value="{{ __('Nom') }}" />
                <input type="text"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('nom')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="nom">
                @error('nom')
                    <div class="text-red-500 mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="block">
                <x-label  value="{{ __('Adresse Email') }}" />
                <input type="email"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('email')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="email">
                @error('email')
                    <div class="text-red-500 mt-1">
                        *{{ $message }}
                    </div>
                @enderror
            </div>
            <div class="block">
                <x-label  value="{{ __('Contact') }}" />
                <input type="text"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('contact')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="contact">
                @error('contact')
                    <div class="text-red-500 mt-1">
                        *{{ $message }}
                    </div>
                @enderror
            </div>
        </div>


        <div class="p-5 flex justify-between items-center bg-gray-300">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
            <button type="submit" class="bg-green-600 p-3 rounded-sm text-white text-sm">Ajouter</button>
        </div>
    </form>
</div>




