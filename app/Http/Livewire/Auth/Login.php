<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Session\SessionManager;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Component {

    
    public $username = '';
    public $password = '';
    public $alert = 'block';
   
    public function login(){

        $request = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $message = [
            'username.required' => 'El nombre de usuario no debe estar vacio',
            'password.required' => 'La contraseña no debe estar vacio',
        ];

        $validatedData = Validator::make(
            $request,
            $rules,
            $message,
        )->validate();

        $user_id = User::where('user', $this->username)->first();
            
            if(!$user_id){
                $this->resetValidation();
                $errors = $this->getErrorBag();
                $this->addError('error', 'Nombre de Usuario y contraseña incorrectos');        
                return false;
            }else{
                $user_id = User::where('pass', $this->password)->first();
                Auth::loginUsingId($user_id->id_user);
                return redirect()->to('/');
            }
        


    }

 

    public function mount(){
        
    }

 

    public function render()
    {
        return view('livewire.auth.login');
    }
}
