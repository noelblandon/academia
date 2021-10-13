<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
   
   public $scores;     



   public function mount(Score $scores){
            $this->scores = Score::select('grado','seccion','asignatura')
                            ->where('docente',auth()->user()->fullname)
                            ->where('anioLectivo',date('Y'))
                            ->where('asignatura','!=','Conducta')
                            ->distinct('grado')
                            ->orderBy('grado','desc')
                            ->get();

                       
   }


   
    public function render()
    {
        return view('livewire.dashboard')
                ->layout('layouts.main-theme')
                ->section('body');
    }
}
