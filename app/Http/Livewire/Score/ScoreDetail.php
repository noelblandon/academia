<?php

namespace App\Http\Livewire\Score;

use Livewire\Component;
use DB;
use App\Models\Enable;
use App\Models\Score as scores;

class ScoreDetail extends Component{

    public $idnotas;
    public $carnet;
    public $fullname;
    public $p1n;
    public $p2n;
    public $p3n;
    public $p4n;
    public $p1l;
    public $p2l;
    public $p3l;
    public $p4l;
    public $s1n;
    public $s1l;
    public $s2n;
    public $s2l;
    public $nfn;
    public $nfl;    
    public $enabled;
    private $parcial_cuant = array('','ICE_cuant','IICE_cuant','IIICE_cuant','IVCE_cuant');
    private $parcial_cual = array('','ICE_cual','IICE_cual','IIICE_cual','IVCE_cual');
    

    private function addValue(){
        $scores = scores::firstWhere('idnotas', $this->idnotas);
        $this->carnet = $scores->carnet; 
        $this->fullname = $scores->nombres.' '.$scores->apellidos;        
        $this->p1n = $scores->ICE_cuant;
        $this->p2n = $scores->IICE_cuant;
        $this->p3n = $scores->IIICE_cuant;
        $this->p4n = $scores->IVCE_cuant;
        $this->p1l = $scores->ICE_cual;
        $this->p2l = $scores->IICE_cual;
        $this->p3l = $scores->IIICE_cual;
        $this->p4l = $scores->IVCE_cual;
        $this->s1n = $scores->ISemestre_cuant;
        $this->s1l = $scores->ISemestre_cual;
        $this->s2n = $scores->IISemestre_cuant;
        $this->s2l = $scores->IISemestre_cual;
        $this->nfn = $scores->notaFinal_cuant;
        $this->nfl = $scores->notaFinal_cual;
       
    }

    private function enableModule(){
        $this->enabled = Enable::first();
    }


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



    private function queryUpdate($value,$parcial){
        
        $cuant = number_format($value);
        $cual = $this->getLetter(intval($value));

        $update_val = [
                       $this->parcial_cuant[$parcial] => $cuant,
                       $this->parcial_cual[$parcial] => $cual 
                    ];   

        if($parcial == 2){
            $parcial_ant = (is_numeric($this->p1n))?$this->p1n:0;
            $parcial_ant = ($parcial_ant==0)?(intval($cuant)):(intval($parcial_ant)+intval($cuant));
            $semestre_cuan = number_format(($parcial_ant/2));
            $semestre_cual = $this->getletter(intval($semestre_cuan));

            $update_val = [
                        'IICE_cuant' => $cuant,
                        'IICE_cual' => $cual, 
                        'ISemestre_cuant' => $semestre_cuan,
                        'ISemestre_cual' => $semestre_cual,
                        'notaFinal_cuant' => $semestre_cuan,
                        'notaFinal_cual' => $semestre_cual  
                        ]; 
        }     
        
        if($parcial == 4){

            $parcial_ant = (is_numeric($this->p3n))?$this->p3n:0;
            $parcial_ant = ($parcial_ant==0)?(intval($cuant)):(intval($parcial_ant)+intval($cuant));
            $semestre_cuan = number_format(($parcial_ant/2));
            $semestre_cual = $this->getletter(intval($semestre_cuan));
            $final_cuan = $semestre_cuan;
            $final_cual = $semestre_cual;
            if(!empty($this->s1n)){
                $sem1 = (is_numeric($this->s1n))?$this->s1n:0;
                $final = (intval($sem1)+intval($semestre_cuan))/2;
                $final_cuan = number_format($final); 
                $final_cual = $this->getletter(intval($final_cuan));
            }
            
            $update_val = [
                        'IVCE_cuant' => $cuant,
                        'IVCE_cual' => $cual, 
                        'IISemestre_cuant' => $semestre_cuan,
                        'IISemestre_cual' => $semestre_cual,
                        'notaFinal_cuant' => $final_cuan,
                        'notaFinal_cual' => $final_cual  
                        ]; 

                        
        }
        return scores::where('idnotas', $this->idnotas)->update($update_val);                

    }
   
    private function queryLetterUpdate($value,$parcial){
 
        $cuant = $value;
        $cual = ' ';
        $update_val = [
            $this->parcial_cuant[$parcial] => $cuant,
            $this->parcial_cual[$parcial] => $cual 
        ];   

        if($parcial == 2){
            $update_val = [
                'IICE_cuant' => $cuan,
                'IICE_cual' => $cual, 
                'ISemestre_cuant' => $cuan,
                'ISemestre_cual' => $cual,
                'notaFinal_cuant' => $cuan,
                'notaFinal_cual' => $cual  
                ]; 
            }   

        if($parcial == 4){
            $update_val = [
                'IVCE_cuant' => $cuan,
                'IVCE_cual' => $cual, 
                'IISemestre_cuant' => $cuan,
                'IISemestre_cual' => $cual,
                'notaFinal_cuant' => $cuan,
                'notaFinal_cual' => $cual  
                ]; 
        }     

        return  scores::where('idnotas', $this->idnotas)->update($update_val);
    }

  
    public function changeScore($value,$parcial){
        
        $score = (!is_numeric($value))?$this->queryLetterUpdate($value,$parcial):$this->queryUpdate($value,$parcial);
      
        if($score){
           $this->addValue();
        }   
    }    

    public function mount($score){
        $this->idnotas = $score->idnotas;
        $this->addValue();
        $this->enableModule();
    }

    public function render(){
        return view('livewire.score.score-detail');
    }

}
