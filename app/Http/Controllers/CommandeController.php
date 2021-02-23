<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Article;
use App\Models\Commande;
use App\Models\Etat;
use App\Models\Atelier;
use Illuminate\Http\Request;


class CommandeController extends Controller
{
    public function index()
    {
        $clients = Client::get();
        $articles = Article::get();
        $etats = Etat::get();
        $ateliers = Atelier::get();
      
        $commandes = Commande::latest()->paginate(5);
        return view ('commandes.index',compact('commandes'))->with('clients', $clients)->with('articles', $articles)
        ->with('etats', $etats)->with('ateliers', $ateliers);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $path = $request->file('image')->store('public/commande');
       $commande = new Commande;
       $commande->image = $path;
        Commande::create($request->all());
       
     
        return redirect()->route('commandes.index')->with('commande_added','Commande a été créée avec succès');
    }

    public function show(Commande $commande)
    {
        //
    }

    public function edit($commande_id)
    {
        
        /*    $relations = [
            'clients' => Client::get()->pluck('nom', 'id'),
            'articles' => Article::get()->pluck('nom_article', 'id'),
            'etats' => Etat::get()->pluck('nom_etat', 'id'),
            'ateliers' => Atelier::get()->pluck('nom_atelier', 'id'),
        ];

        $cde = Commande::findOrFail($id);

       return view('commandes.index', compact('cde') + $relations);*/

       $commande = Commande::find($commande_id);
       return response()->json($commande);

    }


    public function update(Request $request, Commande $commande)
    {
        //
    }

    public function destroy(Commande $commande)
    {
        //
    }
}
