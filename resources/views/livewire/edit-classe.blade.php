<div class="p-2 shadow-sm">
    <form method="POST" wire:submit.prevent="update">
        @csrf
        @method('POST')
        @if(Session::get('error'))
            <div class="p-5">
                <div class="border-red-500 bg-red-500 animate-bounce text-white">{{ Session::get('error') }}</div>
            </div>
        @endif
        <div class="p-5 flex flex-col gap-4">
           
            <div class="block">
                <x-label  value="{{ __('Choix du niveau') }}" />
                <select name="lelevel_idvel_id" id="" class="block mt-1 rounded-md border-gray-300 w-full" wire:model='level_id'>
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
                <x-label  value="{{ __('Libellé') }}" />
                <input type="text" name="libelle"  class="block mt-1 rounded-md border-gray-300 w-full
                 @error('libelle')
                    border-red-500 bg-red-100 animate-bounce
                @enderror" wire:model="libelle">
                @error('libelle')
                    <div class="text-red-500 mt-1">
                        {{ $message }}
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

