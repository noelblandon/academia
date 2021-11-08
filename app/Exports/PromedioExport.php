<?php

namespace App\Exports;

use App\Average;
use Maatwebsite\Excel\Concerns\FromCollection;

class PromedioExport implements FromCollection {

    public $grado;
    public $seccion;
    public $anio;
    public $parcial;

    
    public function __construct(){
        

    }

    public function collection(){
        return User::all();
    }
}