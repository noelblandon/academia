<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score as Scores;



class ScoreController extends Controller
{
    private $parcial_cuant = array('','ICE_cuant','IICE_cuant','IIICE_cuant','IVCE_cuant');
    private $parcial_cual = array('','ICE_cual','IICE_cual','IIICE_cual','IVCE_cual');
    
    
    
    private function getLetter($value){
        $letra = '';
        switch (true) {
            case ($value >= 90 ): $letra = 'AA'; break;
            case ($value >= 75 || $value < 90): $letra = 'AS'; break;
            case ($value >= 60 || $value < 75): $letra = 'AE'; break;
            default: $letra = 'AI';
            }                   

            return $letra;
            /* $aa = '90-100';
            $as = '76-89';
            $ae = '60-75';
            $ai = '< 59';

            $E = '90-100';
            $MB = '80-89';
            $B = '70-79';
            $R = '60-69';
            $D = '< 59';*/
    }

    private function queryUpdate($request){
       
      
        $score = Scores::select('ICE_cuant','IICE_cuant','ISemestre_cuant','IIICE_cuant','IVCE_cuant','IISemestre_cuant','notaFinal_cuant')
                         ->firstWhere('idnotas', $request->id);

        $cuant = number_format($request->value);
        $cual = $this->getLetter(intval($request->value));
        $update_val = [
                       $this->parcial_cuant[$request->parcial] => $cuant,
                       $this->parcial_cual[$request->parcial] => $cual 
                    ];   
        
        if($request->parcial == 2){
            $semestre_cuan = number_format((intval($score->ICE_cuant)+intval($cuant))/2);
            $semestre_cual = $this->getletter(intval($semestre_cuan));
                        
            return $update_val = [
                        'IICE_cuant' => $cuant,
                        'IICE_cual' => $cual, 
                        'ISemestre_cuant' => $semestre_cuan,
                        'ISemestre_cual' => $semestre_cual,
                        'notaFinal_cuant' => $semestre_cuan,
                        'notaFinal_cual' => $semestre_cual  
                        ]; 
        }     
        
        
        
        if($request->parcial == 4){
            $semestre_cuan = number_format((intval($score->IIICE_cuant)+intval($cuant))/2);
            $semestre_cual = $this->getletter(intval($semestre_cuan));
            
          
            if(empty($score->ISemestre_cuant)){
                $final_cuan = $semestre_cuan;
                $final_cual = $semestre_cual;
            }else{
                $final_cuan = number_format((intval($score->ISemestre_cuant)+intval($semestre_cuan))/2); 
                $final_cual = $this->getletter(intval($semestre_cuan));
            }
            
            return $update_val = [
                        'IVCE_cuant' => $cuant,
                        'IVCE_cual' => $cual, 
                        'IISemestre_cuant' => $semestre_cuan,
                        'IISemestre_cual' => $semestre_cual,
                        'notaFinal_cuant' => $final_cuan,
                        'notaFinal_cual' => $final_cual  
                        ]; 
        }
        
       return $update_val;
                      

    }
   
    private function queryLetterUpdate($request){
 
        $cuant = $request->value;
        $cual = ' ';
        $update_val = [
            $this->parcial_cuant[$request->parcial] => $cuant,
            $this->parcial_cual[$request->parcial] => $cual 
        ];   

        if($request->parcial == 2){
            $cuan = $request->value;
            $cual = ' ';
                
            return $update_val = [
                'IICE_cuant' => $cuan,
                'IICE_cual' => $cual, 
                'ISemestre_cuant' => $cuan,
                'ISemestre_cual' => $cual,
                'notaFinal_cuant' => $cuan,
                'notaFinal_cual' => $cual  
                ]; 
            }   

        if($request->parcial == 3 || $request->parcial == 4){
            $cuan = $request->value;
            $cual = ' ';
                
            return $update_val = [
                'IIICE_cuant' => $cuan,
                'IIICE_cual' => $cual, 
                'IVCE_cuant' => $cuan,
                'IVCE_cual' => $cual, 
                'IISemestre_cuant' => $cuan,
                'IISemestre_cual' => $cual,
                'notaFinal_cuant' => $cuan,
                'notaFinal_cual' => $cual  
                ]; 
        }     


        return $update_val;
    }

    public function store(Request $request){

       if($request->ajax()){
     
            if(!is_numeric($request->value)){
                $score = $this->queryLetterUpdate($request);
            }else{
                $score = $this->queryUpdate($request);
            }
         
            $updated = Scores::where('idnotas', $request->id)
                               ->update($score);

            return  response()->json($updated,200);
        }

        return  response()->json(['error'=>"Error"],302);
    }
}
