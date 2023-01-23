<?php

namespace App\Http\Livewire\Admin\Email;

use App\Models\Email;
use Livewire\Component;
use App\Constants\EmailConstant;

abstract class EmailBase  extends Component
{
    /** Esta es la propiedad donde se carga el id */
    public $email = [];
    /** Esta propieda se encarga de definir si es para egresado o empleador */
    public $type;

    /**
     * Esta función es cuando se carga el componente, 
     * se encarga de retorna el email que se va a editar
     * basado en el la propiedad type
     */
    public function mount()
    {
        $this->email = Email::where([
            ['type_id', EmailConstant::ADVICE],
            ['type_user_id', $this->type]
        ])->first()->toArray();

        $this->dispatchBrowserEvent('setBody', [
            'key' => 'body',
            'body' => $this->email['body']
        ]);
    }

    /**
     * Esta función se encarga de guardar el email
     * primero valida que exita el id, una vez validado
     * se encarga de validar el cuerpo del email que no esté vacío
     */
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
