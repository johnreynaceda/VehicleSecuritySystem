<?php

namespace App\Livewire\Guard;

use App\Models\Attendance;
use App\Models\User;
use Livewire\Component;

class Transaction extends Component
{
    public $identification;

    public function updatedIdentification(){
        $data = User::where('identification', '=', $this->identification)->get();
        $attendance = Attendance::where('identification', $this->identification)->whereDate('created_at', now())->get();
        if ($data->count() > 0) {
            if ($attendance->count() > 0) {
                dd('after');
            }else{
               Attendance::create([
                'identification' => $this->identification,
                'fullname' => $data->first()->name,
                'user_type' => $data->first()->user_type,
                'time-in' => now(),
               ]);

            }
        }else{
            dd('no data');
        }
    }
    public function render()
    {
        return view('livewire.guard.transaction');
    }
}
