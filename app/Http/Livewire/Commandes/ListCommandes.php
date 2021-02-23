<?php

namespace App\Http\Livewire\Commandes;

use Livewire\Component;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Etat;
use App\Models\Atelier;
use App\Models\Article;
use Livewire\WithPagination;


class ListCommandes extends Component
{

    use WithPagination;

    public $reference, $description, $type, $quantite, $ville_pose, $pays,
         $commentaire, $technique, $livraison_prevue, $plan, $priorite;


    public $clientId ;
    public $articleId ;
    public $etatId ;
    public $atelierId ;
   

    protected $paginationTheme = 'bootstrap';
    public $state = [];
    public $showEditModal = false;

    protected $listeners = [
        'clientSelected' ,
        'articleSelected',  'etatSelected', 'atelierSelected',
    ];

    public function clientSelected($clientId)
    {
        $this->clientId = $clientId;
    }

    public function articleSelected($articleId)
    {
        $this->articleId = $articleId;
    }

    public function etatSelected($etatId)
    {
        $this->etatId = $etatId;
    }

    public function atelierSelected($atelierId)
    {
        $this->atelierId = $atelierId;
    }
 
    public function addNewCommande()
    {

        $this->dispatchBrowserEvent('show-form');
    }

    public function createCommande()
    {
       
        $createdCommande = Commande::create([
            'reference'         => $this->reference, 
            'description'             => $this->description,
            'type'             => $this->type,
            'quantite'             => $this->quantite,
            'ville_pose'             => $this->ville_pose,
            'pays'             => $this->pays,
            'commentaire'             => $this->commentaire,
            'technique'             => $this->technique,
            'livraison_prevue'             => $this->livraison_prevue,
            'plan'             => $this->plan,
            'priorite'             => $this->priorite,
            'client_id' => $this->clientId,
            'article_id' => $this->articleId,
            'atelier_id' => $this->atelierId,
            'etat_id' => $this->etatId,
        ]);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Commande added successfully']);
        return redirect()->back();
    }

    public function edit(Commande $commande)
    {


        $this->commande = $commande;
        $this->state = $commande->toArray();
        $this->dispatchBrowserEvent('show-form2');
    }

    public function render()
    {
        $clients = Client::get();
        $articles = Article::get();
        $etats = Etat::get();
        $ateliers = Atelier::get();
        $commandes = Commande::latest()->paginate(5);
        return view('livewire.commandes.list-commandes', [
            'commandes' => $commandes,
        ])->with('clients', $clients)->with('articles', $articles)
        ->with('etats', $etats)->with('ateliers', $ateliers);
    }
}
