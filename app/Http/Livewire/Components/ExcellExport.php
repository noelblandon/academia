<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Exports\PromedioExport;
use Maatwebsite\Excel\Facades\Excel;


class ExcellExport extends Component{

    public $grado;
    public $seccion;
    public $parcial;

    public function getExcell(){
       // dd('hi');
        return (new PromedioExport($this->grado,$this->seccion,$this->parcial))->download('users.xlsx');
        //return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function mount($grado,$seccion,$parcial){
        $this->grado = $grado;
        $this->seccion = $seccion;
        $this->parcial = $parcial;
    }


    public function render(){
        return view('livewire.components.excell-export');
    }
}
