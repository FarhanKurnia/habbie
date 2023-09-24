<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Article;

class Search extends Component
{
    public $searchTerm;
    public $productResults;
    public $articleResults;

    public $dataCount = 0;

    public function render()
    {
        if ($this->searchTerm) {
            $this->productResults = Product::where([['deleted_at', null],['status','active']])->where([['name', 'LIKE', "%{$this->searchTerm}%"],['status','active']])
                ->orWhere([['description', 'LIKE', "%{$this->searchTerm}%"],['status','active']])
                ->get();

            $this->articleResults = Article::where('deleted_at', null)->where('title', 'LIKE', "%{$this->searchTerm}%")
                ->orWhere('post', 'LIKE', "%{$this->searchTerm}%")->where('deleted_at', null)
                ->get();

            $this->dataCount = $this->productResults->count() + $this->articleResults->count();
        } else {
            $this->productResults = collect([]);
            $this->articleResults = collect([]);
            $this->dataCount = 0;
        }

        // sleep(1);
        return view('livewire.search');
    }
}
