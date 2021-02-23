<div>
    

<div class="row">

<div class="col-md-12 text-left">
    <h2 class="table-title">Liste des clients</h2>
</div>
<div class="col-md-12 text-right">
    <button type="button" class="actions-btn mb-2" wire:click.prevent="addNewClient">
        <i class="fas fa-plus"></i>
        <span>Ajouter client</span>
    </button>
    <button class="actions-btn">
        <i class="fas fa-sort-amount-down-alt"></i>
        <span>Filter</span>
    </button>
</div>

</div>

<br>
         <!-- Modal -->
         <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">
                                    @if($showEditModal)
                                    <span>Modifier client</span>
                                    @else
                                    <span>Ajouter client</span>
                                    @endif
                                    
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateClient': 'createClient' }}"  >
                             
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mb-4">
                                               
                                                <input type="text" class="form-control" wire:model.defer="state.nom" id="nom" placeholder="Nom" >
                                            </div>
 
                                            <div class="col-sm-12 col-md-6  mb-4">

                                                
                                                <input type="text" class="form-control" wire:model.defer="state.prenom" id="prenom"  placeholder="Prénom">
                                            </div>

                                        </div>
                                        <div class="row options">
                                            <div class="col-sm-12 col-md-6  mb-3">
                                                <input type="email" class="form-control"
                                                wire:model.defer="state.email" id="email"  placeholder="Email">
                                            </div>

                                            <div class="col-sm-12 col-md-6  mb-3">

                                                <input type="text" class="form-control" wire:model.defer="state.telephone" id="telephone"  placeholder="Téléphone">
                                            </div>

                                        </div>



                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" wire:model.defer="state.adresse" id="adresse"  placeholder="Adresse">
                                        </div>

                                        <div class="row options">
                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" wire:model.defer="state.pays" id="pays"  placeholder="Pays">
                                            </div>

                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" wire:model.defer="state.ville" id="ville" placeholder="Ville">
                                            </div>
                                         

                                        </div>
                                        <div class="row options">
                                       
                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" wire:model.defer="state.code_postal" id="code_postal"  placeholder="Code postal">
                                            </div>

                                        </div>

                               
                                        <div class="col-md-12 text-center">
                                            <button  type="submit" class="submit-btn mt-4 ">Sauvegarder</button>
                                            <br>
                                            
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

<div class="modal" tabindex="-1" id="confirmationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this customer?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" wire:click.prevent="deleteClient">Supprimer</button>
      </div>
    </div>
  </div>
</div>


<div class="table-responsive">

<table class="table  table-stripped text-center">
    <thead>
        <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Actions</th>


        </tr>
    </thead>
    <tbody>
                 @foreach($clients as $client)
                            <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->nom }} {{ $client->prenom }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->telephone }}</td>
                                    <td>
                                    <a href="" wire:click.prevent="edit({{ $client }})">
                                    <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <a href=""  wire:click.prevent="confirmClientRemoval({{ $client->id }})">
                                    <i class="fa fa-trash-alt text-danger"></i>
                                    </a>
                                    </td>
                                </tr>
                  @endforeach
    </tbody>
</table>
</div>

<div class="card-footer d-flex justify-content-end">
{{ $clients->links() }}
</div>



</div>
