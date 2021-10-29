<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score as Scores;

class Average extends Component{
    public $title;    
    public $grade;
    public $seccion;
      
    public function mount($grado,$seccion){
        $this->grade = str_replace('-',' ',$grado);
        $this->seccion = $seccion;
         $this->title = 'Registro de promedio del '.$this->grade .' '. $seccion;
       
    }
    
    public function render(){
         return view('livewire.tutor.average')->layout('layouts.main')->section('page-body');
    }
}
