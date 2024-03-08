<?php

namespace App\Livewire\User;

use Livewire\Component;

class EditDetail extends Component
{
    public $edit_data = false;

    public $fullname, $contact, $gmail, $model, $plate_number, $orcr, $license;



    public function editData(){
        $this->fullname = auth()->user()->name;
        $this->contact = auth()->user()->contact;
        $this->gmail = auth()->user()->email;

        $this->model = auth()->user()->vehicleInformation->model;
        $this->plate_number = auth()->user()->vehicleInformation->plate_number;
        $this->orcr = auth()->user()->vehicleInformation->orcr;
        $this->license = auth()->user()->vehicleInformation->license;
        $this->edit_data = true;
    }

    public function updateRecord(){
        auth()->user()->update([
            'name' => $this->fullname,
            'contact' => $this->contact,
            'email' => $this->gmail,
        ]);

        auth()->user()->vehicleInformation->update([
          'model' => $this->model,
            'plate_number' => $this->plate_number,
            'orcr' => $this->orcr,
            'license' => $this->license,
        ]);

        return redirect()->route('user.dashboard');
    }


    public function render()
    {
        return view('livewire.user.edit-detail');
    }
}
