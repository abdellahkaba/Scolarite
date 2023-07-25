<div class="p-2 shadow-sm">
    <form method="POST" wire:submit.prevent="store">
        @csrf
        @method('POST')
        @if(Session::get('error'))
            <div class="p-5">
                <div class="border-red-500 bg-red-500 animate-bounce text-white">{{ Session::get('error') }}</div>
            </div>
        @endif
        <div class="p-5">
            <x-label  value="{{ __('Année scolaire') }}" />
            <input type="text" class="block mt-1 rounded-md border-gray-300 w-full @error('libelle')
                border-red-500 bg-red-100 animate-bounce
            @enderror" wire:model="libelle">
            @error('libelle') <div class="text-red-500 mt-1">*Le champ est requis ou<br> L'année est en cours d'utilisation</div> @enderror
        </div>
        <div class="p-5 flex justify-between items-center bg-gray-300">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
            <button type="submit" class="bg-green-600 p-3 rounded-sm text-white text-sm">Ajouter</button>
        </div>
    </form>
</div>
