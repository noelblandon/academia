<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;
use App\Models\Score as Scores;
use Illuminate\Support\Facades\DB;


class SetScore extends Component{
    

    public $title;    
    public $grado;
    public $seccion;
    public $asignatura;


    
    public function mount($grado,$seccion,$asignatura){

         $this->title = 'Registro de '. $asignatura .' del '. str_replace('-',' ',$grado) .' '. $seccion;
         $this->grado = $grado;
         $this->seccion = $seccion;
         $this->asignatura = $asignatura;
                             
    }    
    
    public function render(){
        $data = Scores::where('docente',auth()->user()->fullname)
                                ->where('anioLectivo',date('Y'))    
                                ->where('grado',str_replace('-',' ',$this->grado))                         
                                ->where('seccion',$this->seccion) 
                                ->where('asignatura',$this->asignatura) 
                                ->orderBy('apellidos','asc')
                                ->get();

        return view('livewire.score.set-score',['scores' => $data])
               ->layout('layouts.main')
               ->section('page-body');
    }
}
