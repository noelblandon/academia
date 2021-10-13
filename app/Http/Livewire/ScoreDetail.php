<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ScoreDetail extends Component
{
    public function render()
    {
        return view('livewire.score-detail')    
                    ->layout('layouts.main-theme')
                    ->section('body');;
    }
}
