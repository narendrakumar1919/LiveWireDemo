<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Register Page')]
class Register extends Component
{
    #[Validate]
    // #[Validate('required|string|min:3|max:250')]
    public $name;
    #[Validate]
    // #[Validate('required|email|max:250|unique:users,email')]
    public $email;
    #[Validate]
    public $mobile;
    #[Validate]
    // #[Validate('required|string|min:8|confirmed')]
    public $password;
    #[Validate]
    public $password_confirmation;
    // public $password_confirmation;

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:250',
            'email' => 'required|email|max:250|unique:users,email',
            'mobile' => 'required|string|min:10|max:12|',
            'password' => 'required|string|min:8|confirmed',
        ];
    }


    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile'=>$this->mobile,
            'password' => Hash::make($this->password),
        ]);

        // $credentials = [
        //     'email' => $this->email,
        //     'password' => $this->password,
        // ];

        // Auth::attempt($credentials);

        session()->flash('message', 'You have successfully registered!');

        return $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.auth.register');
    }
}
