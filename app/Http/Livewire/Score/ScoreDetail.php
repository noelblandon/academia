<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;
use DB;
use App\Models\Enable;
use App\Models\Score as scores;

class ScoreDetail extends Component{

    public $score;
    public $p1;
    public $p2;
    public $p3;
    public $p4;


    public function mount($score){
        $this->score = scores::firstWhere('idnotas', $score->idnotas);
        $this->fullname = $score->nombres.' '.$score->apellidos;
        $this->enable = Enable::first();
        $this->p1 = $this->enable->hab_ICE;
        $this->p2 = $this->enable->hab_IICE;
        $this->p3 = $this->enable->hab_IIICE;
        $this->p4 = $this->enable->hab_IVCE;
    }

    public function render(){
        return view('livewire.score.score-detail');
    }

    


}
