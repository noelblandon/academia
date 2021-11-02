<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score as Scores;

class Average extends Component{
    public $title;    
    public $grade;
    public $seccion;
    public $parcial;
    private $par = array('','Primer Parcial','Segundo Parcial','Primer Semestre','Tercer Parcial','Cuarto Parcial','Segundo Semestre','Nota Final');
      
    public function mount($grado,$seccion,$parcial){
        $this->grade = str_replace('-',' ',$grado);
        $this->seccion = $seccion;
        $this->parcial = $parcial;
        $this->title = 'Promedio del '.$this->par[$parcial].' del '.$this->grade .' '. $seccion;
       
    }
    
    public function render(){
         return view('livewire.tutor.average')->layout('layouts.main')->section('page-body');
    }
}
