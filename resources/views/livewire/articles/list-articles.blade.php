<div>
    

<div class="row">

<div class="col-md-12 text-left">
    <h2 class="table-title">Liste des articles</h2>
</div>
<div class="col-md-12 text-right">
    <button type="button" class="actions-btn mb-2" wire:click.prevent="addNewArticle">
        <i class="fas fa-plus"></i>
        <span>Ajouter article</span>
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
                        aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">
                                    @if($showEditModal)
                                    <span>Modifier article</span>
                                    @else
                                    <span>Ajouter article</span>
                                    @endif
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form  autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateArticle': 'createArticle' }}" >  

                                        <div class="mb-3 options">
                                            <input type="text" class="form-control @error('nom_article') is-invalid @enderror" wire:model.defer="state.nom_article" id="nom_article"  >
                                        </div>
                                        @error('nom')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                         @enderror
                                        <div class="mb-3 options">
                                        <input type="text" class="form-control @error('description_technique') is-invalid @enderror" wire:model.defer="state.description_technique" id="description_technique"  >

                                        </div>
                                        @error('nom')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                         @enderror
                               
                                        <div class="col-md-12 text-center">
                                            <button  type="submit" class="submit-btn mt-4 ">
                                             @if($showEditModal)
                                            <span>Modifier</span>
                                            @else
                                            <span>Créer</span>
                                            @endif
                                            </button>
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
        <h5 class="modal-title">Supprimer article</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" wire:click.prevent="deleteArticle">Supprimer</button>
      </div>
    </div>
  </div>
</div>



@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> <i class="fa fa-check-circle mr-1"></i> {{session('message') }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="table-responsive">

<table class="table  table-stripped text-center">
    <thead>
        <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description technique</th>
                    <th scope="col">Actions</th>


        </tr>
    </thead>
    <tbody>
                    @foreach($articles as $article)
                            <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->nom_article }}</td>
                                    <td>{{ $article->description_technique }}</td>
                                    <td>
                                    <a href="" wire:click.prevent="edit({{ $article }})">
                                    <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <a href=""  wire:click.prevent="confirmArticleRemoval({{ $article->id }})">
                                    <i class="fa fa-trash-alt text-danger"></i>
                                    </a>
                                    </td>
                                </tr>
                      @endforeach
    </tbody>
</table>
</div>

<div class="card-footer d-flex justify-content-end">
{{ $articles->links() }}
</div>


</div>


