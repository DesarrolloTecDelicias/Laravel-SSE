<?php

namespace App\Http\Livewire\Admin\Email;

use App\Constants\EmailConstant;
use App\Http\Livewire\Admin\Email\EmailBase;

class EmailTemplate extends EmailBase
{
    public function __construct()
    {
        $this->type = EmailConstant::GRADUATE;
    }

    public function render()
    {
        return view('livewire.admin.email.email-template');
    }
}
