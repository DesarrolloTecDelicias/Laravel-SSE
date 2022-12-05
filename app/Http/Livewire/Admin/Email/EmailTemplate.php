<?php

namespace App\Http\Livewire\Admin\Email;

use App\Constants\EmailConstant;
use App\Models\Email;
use Livewire\Component;

class EmailTemplate extends Component
{
    public $email = [];

    public function render()
    {
        return view('livewire.admin.email.email-template');
    }

    public function mount()
    {
        $this->email = Email::where([
            ['type_id', EmailConstant::$advice],
            ['type_user_id', EmailConstant::$graduate]
        ])->first()->toArray();
        $this->dispatchBrowserEvent('setBody', [
            'key' => 'body',
            'body' => $this->email['body']
        ]);
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->email) ? $this->email['id'] : '';
        $this->validate(
            ['email.body' => 'required'],
            ['email.body.required' => 'El campo cuerpo es obligatorio']
        );
        Email::updateOrCreate(['id' => $idValidator], $this->email);

        $this->dispatchBrowserEvent('message', [
            'message' => "Plantilla de correo actualizada correctamente",
            'type' => 'success'
        ]);
    }
}
