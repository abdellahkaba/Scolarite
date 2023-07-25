<div>
    <div class="w-full flex">
        <div class="w-2/3">
            <div class="custom_card p-3 bg-white rounded-md">
                <div class="title pb-2 border-b-2 border-red-500">Information de l'élève</div>
                <section class="flex mt-2">
                    <div class="div w-24">
                        <img src="https://ui-avatars.com/api/?name={{ $inscription->id }}+{{ $inscription->id }}" alt="" class="w-24">
                    </div>
                    <section class="flex flex-col">
                        <div class="flex flex-row pl-3">
                            <div class="name  mr-2 uppercase">Matricule:</div>
                            <div class="name text-md">{{ $inscription->student_id}}</div>
                        </div>
                        <div class="flex flex-row pl-3">
                            <div class="name font-bold mr-2">{{ $inscription->classe_id }}</div>
                            <div class="name font-bold">{{ $inscription->student_id }}</div>
                        </div>
                        {{-- <div class="flex flex-row pl-3">
                            <div class="name  mr-2">Classe actuelle:</div>
                            <div class="name ">{{ $this->getClasseStudent()}}</div>
                        </div> --}}
                    </section>
                </section>

                <div class="title pb-2 border-b-2 border-red-500">Dernier paiment effectué</div>
               {{-- @forelse ($studentPayement as $payement)
               <div class="shadow-sm p-2 border-b-1 mt-2 border-b-red-200">
                   <span>{{ $payement->montant }} FG</span>
                   <span>Payé le : {{ $payement->created_at }}</span>
               </div>
               @empty
                <tr class="w-full">
                    <td colspan="4" class="flex-1 w-full items-center justify-center">
                        <div>
                            <p class="flex justify-center content-center p-4">
                                <img src="{{ asset('storage/undraw.svg') }}" alt="" class="w-20 h-20">
                                <div>Aucun paiement effectué</div>
                            </p>
                        </div>
                        
                    </td>
                </tr>
               @endforelse --}}
            </div>
        </div>
        <div class="w-1/3"></div>
    </div>
</div>
