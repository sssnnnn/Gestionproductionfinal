<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use Livewire\WithPagination;

class ListClients extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public  $nom, $prenom, $email, $telephone, $adresse,$pays,$ville,$code_postal, $client_id;
    public $client;
    public $state = [];
    public $showEditModal = false;
    public $clientIdBeingRemoved = null;

    public function addNewClient()
    {
        $this->state = [];
        $this->nom = '';
        $this->prenom = '';
        $this->email = '';
        $this->telephone = '';
        $this->adresse = '';
        $this->pays = '';
        $this->ville = '';
        $this->code_postal = '';
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }


    public function createClient()
    {
        
      /*  Client::create(['id' => $this->client_id], [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'adresse' => $this->adresse,
            'pays' => $this->pays,
            'ville' => $this->ville,
            'code_postal' => $this->code_postal
        ]);
*/
       Client::create($this->state);


       $this->dispatchBrowserEvent('hide-form', ['message' => 'Client added successfully']);
        return redirect()->back();
    }


    public function edit(Client $client)
    {

        $this->showEditModal = true;
        $this->client = $client;
        $this->state = $client->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateClient()
    {
     


        $this->client->update($this->state);

    
       $this->dispatchBrowserEvent('hide-form', ['message' => 'Client updated successfully']);
        return redirect()->back();
    }

    public function confirmClientRemoval($clientId)
    {

        
           $this->clientIdBeingRemoved = $clientId;
           $this->dispatchBrowserEvent('show-delete-modal');
    }
   
    public function deleteClient()
    {
        $client = Client::findOrFail($this->clientIdBeingRemoved);

        $client->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Client deleted successfully']);

    }

    public function render()
    {

        $clients = Client::latest()->paginate(5);
        return view('livewire.clients.list-clients', [
            'clients' => $clients,
        ]);
    }

  
}
