<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Mail\ResetPasswordMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Component
{
    public $email;
    public $disabled = false;

    public function render()
    {
        return view('livewire.auth.reset-password')
            ->extends('layouts.guests')
            ->section('body');
    }

    public function getRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }


    public function sentEmail()
    {
        $this->disabled = true;
        if ($this->email == env('MAIL_MAIN')) {
            $this->dispatchBrowserEvent('message', [
                'message' => "No es posible editar a este usuario",
                'type' => 'error'
            ]);
            return;
        }

        $user = User::where('email', $this->email)->first();
        if ($user) {
            $newPassword = $this->getRandomString(8);
            $hashPassword = strval(Hash::make($newPassword));
            $correo = new ResetPasswordMailable($newPassword);
            Mail::to(strval($this->email))->send($correo);

            $this->dispatchBrowserEvent('message', [
                'message' => "Se envió el correo correctamente",
                'type' => 'success'
            ]);

            $user->password = $hashPassword;
            $user->save();

            $this->email = '';
            $this->disabled = false;
        } else {
            $this->dispatchBrowserEvent('message', [
                'message' => "Este correo no existe en nuestros registros",
                'type' => 'error'
            ]);
            $this->disabled = false;
        }
    }
}
