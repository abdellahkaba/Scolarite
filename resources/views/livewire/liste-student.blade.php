<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
        <div class="flex justify-between items-center">
            <div class="w-1/3">
                <input type="text" class="block mt-1 rounded-md border-gray-300 w-full" placeholder="Rechercher" wire:model="search">
            </div>
            <a href="{{ route('eleves.create') }}" class="text-white text-sm bg-blue-600 rounded-md p-2 m-2">Enregistrer un elève</a>
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
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Matricule</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Prénom</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Nom</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Parents</th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $item)
                                    <tr class="border-b-2 border-gray-100">
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->matricule }}</td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">{{ $item->prenom }}</td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                           {{ $item->nom }}
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                            {{ $item->contact_parents }}
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-6">
                                            <a href="{{ route('eleves.show', $item->id) }}" class="text-sm bg-blue-800 p-1 text-white rounded-sm">Détail</a>
                                            <a href="{{ route('eleves.edit', $item->id) }}" class="text-sm bg-green-500 p-1 text-white rounded-sm">Modifier</a>
                                            <a href="" wire:click='delete({{ $item->id }})' class="text-sm bg-red-500 p-1 text-white rounded-sm">Supprimer</a>
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
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
