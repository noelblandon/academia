<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;

class TutorDetail extends Component{

    public $score;
    public $index;
    public $grado;
    public $seccion;

    public function testRedirect($val){
        return redirect()->to('/tutor/promedio/'.setUrl($this->grado).'/'.setUrl($this->seccion).'/'.$val.'');
    }

    public function mount($score,$index){
        $this->score = $score;
        $this->index = $index;
        $this->grado = $this->score->grado;
        $this->seccion = $this->score->seccion;
        
    }

    public function render(){
        return view('livewire.tutor.tutor-detail');
    }
}
