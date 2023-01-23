<?php

namespace App\Http\Livewire\Admin\Email;

use App\Constants\EmailConstant;
use App\Http\Livewire\Admin\Email\EmailBase;

class EmailCompanyTemplate extends EmailBase
{
    public function __construct()
    {
        $this->type = EmailConstant::COMPANY;
    }

    public function render()
    {
        return view('livewire.admin.email.email-company-template');
    }
}
