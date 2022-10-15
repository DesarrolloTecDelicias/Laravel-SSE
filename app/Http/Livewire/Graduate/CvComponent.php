<?php

namespace App\Http\Livewire\Graduate;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CvComponent extends Component
{
    use WithFileUploads;

    public $cv;

    public function render()
    {
        return view('livewire.graduate.cv-component');
    }

    public function mount()
    {
        $this->cv = null;
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate(['cv' => 'required|file|mimes:pdf|max:5120']);

        if ($user->cv != null || $user->cv != '') {
            $destinationPath = public_path();
            File::delete($destinationPath . '/storage/pdf/' . $user->cv);
        }

        $filename = implode('_', explode(" ", $user->name)) . '_' . 'cv' . '_' . time()  . '.pdf';
        $this->cv->storeAs('pdf', $filename, 'public');
        $user->cv = $filename;
        $user->save();

        $this->dispatchBrowserEvent('message', [
            'message' => "Currículum agregado con éxito",
            'type' => 'success'
        ]);

        return redirect()->back();
    }
}
