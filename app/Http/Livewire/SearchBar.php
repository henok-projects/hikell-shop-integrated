<?php

namespace App\Http\Livewire;

use App\Models\Support;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBar extends Component
{    public $searchQu='';
    public $questions;
    use WithPagination;
    public function render()
    {
        // $searchs ='%'.$this->search.'%';
        // $suppor = Support::where('question','like',$searchs)->orderBy('id','desc')->get();
        // $questions = Support::where('question', 'like', $searchTerm)->get();
       //if ($this->searchQu != '') {
         //  $this->questions = Support::where('question', 'like', '%'.$this->searchQu.'%')->get();
         //  return view('livewire.search-bar',['questions'=>$this->questions]);
        //}
        // else
         // return view('livewire.search-bar');

//}       // }
        if ($this->searchQu !='') {
           $this->questions=  Support::when($this->searchQu, function ($questions, $searchQu) {
                 return $questions->where('question', 'LIKE', "$searchQu");
                 
                })->get();
                
                     }

              return view('livewire.search-bar',['questions'=>$this->questions]);

            }
        }
