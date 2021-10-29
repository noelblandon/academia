<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;

class TutorDetail extends Component{

    public $score;
    public $index;

    public function mount($score,$index){
        $this->score = $score;
        $this->index = $index;
    }

    public function render(){
        return view('livewire.tutor.tutor-detail');
    }
}
