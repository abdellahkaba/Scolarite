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
                <x-label  value="{{ __('Code de niveau') }}" />
                <input type="text"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('code')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="code">
                @error('code')
                    <div class="text-red-500 mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="block">
                <x-label  value="{{ __('Libellé') }}" />
                <input type="text"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('libelle')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="libelle">
                @error('libelle')
                    <div class="text-red-500 mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="block">
                <x-label  value="{{ __('Montant de la scolarité') }}" />
                <input type="number"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('scolarite')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="scolarite">
                @error('scolarite')
                    <div class="text-red-500 mt-1">
                        *{{ $message }}
                    </div>
                @enderror
            </div> --}}
        </div>


        <div class="p-5 flex justify-between items-center bg-gray-300">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
            <button type="submit" class="bg-green-600 p-3 rounded-sm text-white text-sm">Mettre à jour</button>
        </div>
    </form>
</div>

