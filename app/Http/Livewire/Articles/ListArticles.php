<?php

namespace App\Http\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class ListArticles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $state = [];
    public $article;
    public $showEditModal = false;
    public $articleIdBeingRemoved = null;
    public  $nom_article, $description_technique,  $article_id;


    public function addNewArticle()
    {
        $this->state = [];

        $this->nom_article = '';
        $this->description_technique = '';

        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function createArticle()
    {
     

        $validatedData = Validator::make($this->state, [
            'nom_article' => 'required',
            'description_technique' => 'required'
        ])->validate();

       Article::create($validatedData);

      //session()->flash('message','Article added successfully');

       $this->dispatchBrowserEvent('hide-form', ['message' => 'Article added successfully']);
        return redirect()->back();
    }

    public function edit(Article $article)
    {

        $this->showEditModal = true;
        $this->article = $article;
        $this->state = $article->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateArticle()
    {
     

        $validatedData = Validator::make($this->state, [
            'nom_article' => 'required',
            'description_technique' => 'required'
        ])->validate();

        $this->article->update($validatedData);

      //session()->flash('message','Article added successfully');

       $this->dispatchBrowserEvent('hide-form', ['message' => 'Article updated successfully']);
        return redirect()->back();
    }

    public function confirmArticleRemoval($articleId)
    {

        
           $this->articleIdBeingRemoved = $articleId;
           $this->dispatchBrowserEvent('show-delete-modal');
    }
   
    public function deleteArticle()
    {
        $article = Article::findOrFail($this->articleIdBeingRemoved);

        $article->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Article deleted successfully']);

    }

    public function render()
    {

        $articles = Article::latest()->paginate(5);
        return view('livewire.articles.list-articles', [
            'articles' => $articles,
        ]);
    }
}
