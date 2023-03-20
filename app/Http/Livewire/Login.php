<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $num_asoc='', $password='';
    public $error;

    public function login()
    {
        if ($this->password=='' || $this->num_asoc=='') {
            $this->error = 'Campos email y password obligatórios';
        // }elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        //     $this->error = 'Email inválido';
        }else{
            $credentials = ['associated_num' => $this->num_asoc,'password' => $this->password];
            if (Auth::attempt($credentials)) {
                $this->error = '';
                request()->session()->regenerate();
                return redirect('/dashboard');
            }else{
                $this->error = 'Las credenciales no coinciden con nuestros registros';
            }
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
