<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Etat()
    {
        return $this->belongsTo(Etat::class);
    }

    public function Article()
    {
        return $this->belongsTo(Article::class);
    }

    protected $fillable = [
        'reference', 'description','priorite', 'type','commentaire','plan','quantite','ville_pose','pays','technique','livraison_prevue','client_id', 
          'article_id','etat_id', 'atelier_id'
    ];

    protected $casts = [
        'plan' => 'boolean'
    
    ];
}
