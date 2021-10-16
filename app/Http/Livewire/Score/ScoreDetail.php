<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;
use DB;
use App\Models\Enable;

class ScoreDetail extends Component{

    public $score;
    public $fullname;
    public $enable;
    

    public function mount($score){
        $this->score = $score;
        $this->fullname = $score->nombres.' '.$score->apellidos;
        $this->enable = Enable::first();
    }


    public function render(){
        return view('livewire.score.score-detail');
    }
}
