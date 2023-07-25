<div class="p-2 shadow-sm">
    <form method="POST" wire:submit.prevent="update">
        @csrf
        @method('POST')
        @if(Session::get('error'))
            <div class="p-5">
                <div class="border-red-500 bg-red-500 animate-bounce text-white">{{ Session::get('error') }}</div>
            </div>
        @endif
        @if($error)
            <div class="p-5">
                <div class="border-red-500 bg-red-500 animate-bounce text-white">{{ $error }}</div>
            </div>
        @endif
        <div class="p-5 flex flex-col gap-4">
            <div class="block">
                <x-label  value="{{ __('Matricule') }}" />
                <input type="text" name="matricule"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('matricule')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="matricule">
                @error('matriule')
                    <div class="text-red-500 mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="block">
                <x-label  value="{{ __('Nom complet') }}" />
                <input type="text" name="matricule" wire:model='fullname'  class="block mt-1 rounded-md border-gray-300 w-full" readonly>
                
            </div>
            <div class="block">
                <x-label  value="{{ __('Choix du niveau') }}" />
                <select name="level_id" id="" class="block mt-1 rounded-md border-gray-300 w-full" wire:model='level_id'>
                    <option value=""></option>
                    @foreach ($levels as $item)
                        <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                    @endforeach
                </select>
                @error('level_id')
                    <div class="text-red-500 mt-1">
                        *{{ $message }}
                    </div>  
                @enderror
            </div>
            <div class="block">
                <x-label  value="{{ __('Selectionner une classe') }}" />
                <select name="classe_id" id="" class="block mt-1 rounded-md border-gray-300 w-full" wire:model='classe_id'>
                    <option value=""></option>
                    @foreach ($classes as $item)
                        <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                    @endforeach
                </select>
                @error('classe_id')
                    <div class="text-red-500 mt-1">
                        *{{ $message }}
                    </div>  
                @enderror
            </div>
           
            
            
        </div>


        <div class="p-5 flex justify-between items-center bg-gray-300">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
            <button type="submit" class="bg-green-600 p-3 rounded-sm text-white text-sm">Mettre à jour</button>
        </div>
    </form>
</div>

