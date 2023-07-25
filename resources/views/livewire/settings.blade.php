<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
        <div class="flex justify-between items-center">
            <div class="w-1/3">
                <input type="text" class="block mt-1 rounded-md border-gray-300 w-full" placeholder="Rechercher" wire:model="search">
            </div>
            <a href="{{ route('settings.create_school_year') }}" class="text-white text-sm bg-blue-600 rounded-md p-2 m-2">Nouvelle Année Scolaire</a>
        </div>
        <div class="flex flex-col">
            @if(Session::get('success'))
                <div class="p-5">
                    <div class="block p-2 bg-green-600 text-white rounded-sm shadow-sm">{{ Session::get('success') }}</div>
                </div>
            @endif
            <div class="overflow-x-auto ">
                <div class="min-w-full py-4 inline-block ">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-300">
                                <tr>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Id</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Année scolaire</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Active</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schoolYear as $item)
                                    <tr class="border-b-2 border-gray-100">
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->id }}</td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->school_year }}</td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                            @if($item->active >= 1)
                                                <span class="p-1 text-sm bg-green-600 text-white rounded-sm">Actif</span>
                                            @else
                                                <span class="p-1 text-sm bg-red-400 text-white rounded-sm">Inactif</span>
                                            @endif
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                            <button class="p-2 text-white {{ $item->active == 1 ? 'bg-red-600':'bg-green-600' }}" wire:click='toggleStatus({{ $item->id }})'>
                                                {{ $item->active == 1 ? 'Rendre Inactif' : 'Rendre Actif'}}
                                            </button>
                                        </td>
                                    </tr> 
                                @empty
                                    <tr class="w-full">
                                        <td colspan="4" class="flex-1 w-full items-center justify-center">
                                            <div>
                                                <p class="flex justify-center content-center p-4">
                                                    <img src="{{ asset('storage/undraw.svg') }}" alt="" class="w-20 h-20">
                                                    <div>Aucun élement</div>
                                                </p>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    
                                @endforelse
                                
                            </tbody>
                        </table>
                        <div class="mt-1">
                            {{ $schoolYear->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
