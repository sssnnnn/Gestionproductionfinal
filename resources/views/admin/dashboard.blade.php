<x-admin-layout>
<div>


<div class="row">

<div class="col-md-12 text-left">
    <h2 class="table-title">Vue D'ensemble</h2>
</div>
<div class="col-md-12 text-right">
    <button type="button" class="actions-btn mb-2" data-bs-toggle="modal" data-bs-target="#add">
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
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">Information sur Le produit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 mb-3">
                                               
                                                <input type="text" class="form-control" id="refernce" placeholder="Reference">
                                            </div>

                                            <div class="col-sm-12 col-md-4  mb-3">

                                                
                                                <input type="text" class="form-control" id="Nom" placeholder="Nom du Client">
                                            </div>

                                            <div class="col-sm-12 col-md-4">

                                                <input type="text" class="form-control" id="Article" placeholder="Article">

                                            </div>



                                        </div>
                                        <div class="row options">
                                            <div class="col-sm-12 col-md-4  mb-3">
                                                <input type="text" class="form-control" id="Quantité" placeholder="Quantité">
                                            </div>

                                            <div class="col-sm-12 col-md-4  mb-3">

                                                <input type="text" class="form-control" id="Livraison" placeholder="Livraison">
                                            </div>

                                            <div class="col-sm-12 col-md-4">

                                                <input type="text" class="form-control" id="Livraison" placeholder="Livraison Preuve">

                                            </div>



                                        </div>



                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" id="Description" placeholder="Description de produit">
                                        </div>

                                        <div class="row options">
                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" id="Pays" placeholder="Pays">
                                            </div>

                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" id="ville" placeholder="Ville">
                                            </div>

                                        </div>

                                        <div class="row options">
                                            <div class="col-6">

                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Sélectionner l'état</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="col-6">

                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitches">
                                                    <label class="custom-control-label" for="customSwitches">Cette
                                                        Demande nécessite un plan?</label><br>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="submit-btn mt-4 ">Création.....</button>
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
                    <div class="table-responsive">

<table class="table  table-stripped text-center">
    <thead>
        <tr>
            <th scope="col">Réf</th>
            <th scope="col">Client</th>
            <th scope="col">Clé</th>
            <th scope="col">Article</th>
            <th scope="col">Description</th>
            <th scope="col">Ville</th>
            <th scope="col">Livraison</th>
            <th scope="col">Etat</th>


        </tr>
    </thead>
    <tbody>
        <tr>
            <td>F6-A</td>
            <td>CLM ambassade</td>
            <td>2</td>
            <td>
                <span>Su332 Existante</span>
                <br>
                <small class="client">layla</small>
            </td>
            <td >
                <span>Parchemin PF31 bais Or vielli plateau dessous</span>
                <br>
                <small>Nettoyage ,polissage,Vernis de la bande lation</small>

            </td>
            <td>Casablanca</td>
            <td>12/02/2020</td>
            <td>En Production</td>

        </tr>

       <tr>
            <td>F6-A</td>
            <td>CLM ambassade</td>
            <td>2</td>
            <td>Su332 Existante
                <small class="client">layla</small>
            </td>
            <td >
                Regarder le Description de produit ici 
                <i class="fas fa-eye"  data-bs-toggle="modal" data-bs-target="#show"></i>

            </td>
            <td>Casablanca</td>
            <td>12/02/2020</td>
            <td>En Production</td>

        </tr>

    </tbody>
</table>
</div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>



</div>

</x-admin-layout>