<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;
use App\Models\Score as Scores;
use Illuminate\Support\Facades\DB;

class Tutor extends Component
{
    public function render(){
        $data = Scores::select('grado','seccion','asignatura')
        ->where('docente',auth()->user()->fullname)
        ->where('anioLectivo',date('Y'))
        ->where('asignatura','Conducta')
        ->distinct('grado')
        ->orderBy('grado','desc')
        ->get();

        return view('livewire.tutor.tutor',['scores'=>$data])
                   ->layout('layouts.main')
                   ->section('page-body');
    }
}
