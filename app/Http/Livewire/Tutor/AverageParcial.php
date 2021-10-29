<?php

namespace App\Http\Livewire\Tutor;

use Livewire\Component;

class AverageParcial extends Component{
    
    public $parcial1 = false;
    public $parcial2 = false;
    public $parcial3 = false;
    public $parcial4 = false;
    public $grade;
    public $seccion;

    
    public function parcial($value){
        $this->parcial1 = false;
        $this->parcial2 = false;
        $this->parcial3 = false;
        $this->parcial4 = false;

        switch($value) {
            case 1:
                $this->parcial1 = true;
                break;
            case 2:
                $this->parcial2 = true;
                break;
            case 3:
                $this->parcial3 = true;
                break;
            default:
                $this->parcial4 = true;
        }
    }
    public function mount($grade,$seccion){
        $this->grade = $grade;
        $this->seccion = $seccion;
    }



    public function render(){
        return view('livewire.tutor.average-parcial');
    }
}
