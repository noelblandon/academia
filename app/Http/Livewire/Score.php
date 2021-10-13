<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Score as Scores;
use APp\Models\Enable;



class Score extends Component{

    public $grado;
    public $seccion;
    public $asignatura;
    public $scores;
    public $cuantitativa;

    public function mount($grado,$seccion,$asignatura,Scores $scores){
        $this->grado = str_replace('-',' ',$grado);
        
        $this->scores = Scores::select('carnet','nombres','apellidos','ICE_cuant as cuantitativa','ICE_cual as cualitativa')
                                ->where('grado',$this->grado)
                                ->where('seccion',$seccion)
                                ->where('asignatura',$asignatura)
                                ->where('anioLectivo',date('Y'))
                                ->orderby('apellidos')
                                ->orderby('nombres')
                                ->get();     

                                  

    }


    public function render()
    {
        return view('livewire.score')
                ->layout('layouts.main-theme')
                ->section('body');
    }
}
