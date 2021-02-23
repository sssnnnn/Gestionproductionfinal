<div>
    
<div class="row">

<div class="col-md-12 text-left">
    <h2 class="table-title">Tableau de bord</h2>
</div>
<div class="col-md-12 text-right">
    <button type="button" class="actions-btn mb-2"  wire:click.prevent="addNewCommande">
        <i class="fas fa-plus"></i>
        <span>Ajouter une commande</span>
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
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title form-title" id="exampleModalLabel">Information sur Le produit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
         <form  autocomplete="off" wire:submit.prevent="createCommande"  >
           
                <div class="row">
                    <div class="col-sm-12 col-md-4 mb-3">
                       
                        <input type="text" class="form-control" wire:model.defer="reference" id="reference" name="reference"  placeholder="Reference">
                    </div>

                    <div class="col-sm-12 col-md-4  mb-3">

                    <select wire:model.defer="clientId" name="client_id" class="form-control">
                       
                            <option>Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nom }}</option>
                            @endforeach
                    </select>
                       
                    </div>

                    <div class="col-sm-12 col-md-4">

                    <select wire:model.defer="articleId" name="article_id" class="form-control">
                       
                       <option>Select Article</option>
                       @foreach($articles as $article)
                       <option value="{{ $article->id }}">{{ $article->nom_article }}</option>
                       @endforeach
               </select>

                    </div>



                </div>
                <div class="row options">
                    <div class="col-sm-12 col-md-4  mb-3">
                        <input type="text" class="form-control" wire:model.defer="quantite" id="quantite" name="quantite" placeholder="Quantité">
                    </div>


                    <div class="col-sm-12 col-md-4">

                        <input type="date" class="form-control" wire:model.defer="livraison_prevue" id="livraison_prevue" name="livraison_prevue" placeholder="Livraison Preuve">

                    </div>

                </div>



                <div class="mb-3 options">
                    <input type="text" class="form-control" wire:model.defer="description" id="description" name="description" placeholder="Description de produit">
                </div>
                <div class="mb-3 options">
                <textarea wire:model.defer="commentaire" id="commentaire" name="commentaire" cols="56" rows="2"></textarea>
                </div>

                <div class="row options">
                    <div class="col-6">
                        
                        <input type="text" class="form-control" wire:model.defer="pays" id="pays" name="pays" placeholder="Pays">
                    </div>

                    <div class="col-6">
                        
                        <input type="text" class="form-control" wire:model.defer="ville_pose"  id="ville_pose" name="ville_pose" placeholder="Ville">
                    </div>

                </div>

                <div class="row options">
                    <div class="col-6">
                        <select wire:model.defer="etatId" id="etat"  class="form-select input" aria-label="Default select example">
                        <option></option>
                            @foreach($etats as $etat)
                       <option value="{{ $etat->id }}">{{ $etat->nom_etat }}</option>
                       @endforeach
                        </select>
                    </div>
       
                    <div class="col-6">
                        <input type="text" wire:model.defer="technique" class="form-control" id="inputToDisplay" name="technique" style="display:none"  placeholder="Technique">
                    </div>
                   

                    <div class="col-6">
                        <select wire:model.defer="atelierId" name="atelier_id" class="form-select" aria-label="Default select example" style="display:none" id="selectToDisplay">
                          
                            @foreach($ateliers as $atelier)                                          
                       <option value="{{ $atelier->id }}"> {{ $atelier->nom_atelier }} </option>
                       @endforeach
                        </select>
                    </div>

                    <div class="col-6">

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input"
                                id="customSwitches" name="plan" wire:model.defer="plan"
                                value="1" {{ old('plan') ? 'checked="checked"' : '' }}>
                            <label class="custom-control-label" for="customSwitches">Cette
                                Demande nécessite un plan?</label><br>
                        </div>
                    </div>


                </div>

                <div class="row options">
                    <div class="col-6">
                        <select wire:model.defer="priorite" name="priorite" class="form-select" aria-label="Default select example">
                            <option selected>Priorité</option>                                                   
                       <option value="Haute"> Haute </option>
                       <option value="Medium"> Medium </option>
                       <option value="Normal"> Normal </option>
                        </select>
                    </div>

                    <div class="col-6">
                        <select wire:model.defer="type" name="type" class="form-select" aria-label="Default select example">
                            <option selected>Sélectionner type</option>                                                   
                       <option value="Showroom"> Showroom </option>
                       <option value="Client"> Client </option>
                       <option value="Sous-traitant"> Sous-traitant </option>
                        </select>
            </div>





<script>
var select = document.getElementById( "etat" )
select.addEventListener( "change", function ( e )
{
var input = document.getElementById( "inputToDisplay" )

if ( e.target.value == '3' )
input.style.display = "inline-block"
else
input.style.display = "none"
} )
</script>
<script>
var select = document.getElementById( "etat" )
select.addEventListener( "change", function ( e )
{
var input = document.getElementById( "inputToDisplay2" )

if ( e.target.value == '3' )
input.style.display = "inline-block"
else
input.style.display = "none"
} )
</script>

<script>
var select = document.getElementById( "etat" )
select.addEventListener( "change", function ( e )
{
var input = document.getElementById( "selectToDisplay" )

if ( e.target.value == '2' )
input.style.display = "inline-block"
else
input.style.display = "none"
} )
</script>







</div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="submit-btn mt-4 ">Création.....</button>
                    <br>
                    <div class="comments mt-2">
                        <span>En Cliquant sur créer une commande vérifier soigneusement</span>
                        <br>
                        <span>Les informations relative sur la fiche atelier</span>
                    </div>
                </div>


            </form>
        </div>

    </div>
</div>
</div>


<!--Edit Modal -->
<div class="modal" tabindex="-1" id="form2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-sm-12 col-md-4 mb-3">
      <input type="text" class="form-control" name="reference" wire:model="commande.reference"  placeholder="Enter Product Name">            
    
        </div>

      </div>
      <div class="modal-footer">
  
        <button type="button" class="btn btn-danger" wire:click.prevent="">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<div class="table-responsive">

<table class="table  table-stripped text-center">
    <thead>
        <tr>
                          <th>Réf</th>
                          <th>Client</th>
                          <th>Quantité</th>
                          <th>Article</th>
                          <th>Description</th>
                          <th>Ville</th>
                          <th>Livraison</th>
                          <th>Etat</th>


        </tr>
    </thead>
    <tbody>
       @foreach($commandes as $commande )
        <tr>
        
            <td>{{ $commande->reference }}</td>
            <td >
                <span>{{ $commande->client->nom }}</span>
                <br>
                <small>{{ $commande->type }}</small>

            </td>
            
            <td>{{ $commande->quantite }}</td>
            <td>{{ $commande->article->nom_article }}</td>          
            <td >{{ $commande->description }}</td>        
            <td>{{ $commande->ville_pose }}</td>
            <td>{{ $commande->livraison_prevue }}</td>
            <td>
            <a href="" wire:click.prevent="edit({{ $commande }})">
               {{ $commande->etat->nom_etat }}        
                                    </a>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="card-footer d-flex justify-content-end">
{{ $commandes->links() }}
</div>


</div>
