<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $name ="Tester";

     public $count = 0;

 

    public function increment()

    {

        $this->count++;

    }

 

    public function render()
    {
        return view('livewire.auth.login');
    }
}
