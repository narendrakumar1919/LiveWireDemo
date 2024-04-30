<?php

namespace App\Livewire\Admin\Auth;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Login Page')]
class Login extends Component
{
    #[Validate]
     public $email;
     #[Validate]
     public $password;

     public function rules(){
        return[
        'email' => 'required|email|max:250',
        'password' => 'required|string|min:8',
        ];
     }

     public function login(){
        $this->validate();
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if(Auth::attempt($credentials))
        {
            session()->flash('message', 'You have successfully logged in!');

            return $this->redirectRoute('dashboard', navigate: true);
        }

        session()->flash('error', 'Invalid credentials!');

     }

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
