<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;

class ScoreDetail extends Component{
    
    public $score;
    public $index;

    public function mount($score,$index){
        $this->score = $score;
        $this->index = $index;
    }
    
    
    
    public function render(){
        return view('livewire.score.score-detail');
    }
}
