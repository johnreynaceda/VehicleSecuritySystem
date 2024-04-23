<?php

namespace App\Livewire\Guard;

use App\Models\Attendance;
use App\Models\Slot;
use App\Models\User;
use App\Models\VehicleInformation;
use App\Models\VisitorInformation;
use Livewire\Component;
use WireUi\Traits\Actions;

class Transaction extends Component
{
    public $identification;
    use Actions;

    public $fullname,$address, $model, $plate_number, $orcr, $license, $account;

    public $visitor_modal = false;
    public function updatedIdentification(){
        $data = User::where('identification', '=', $this->identification)->get();
        $attendance = Attendance::where('identification', $this->identification)->where('status','on-progress')->get();
        if ($data->count() > 0) {
            if ($attendance->count() > 0) {
                $attendance->first()->update([
                    'time_out' => now(),
                    'status' => 'done',
                ]);
                $slot = Slot::first();
                $slot->update([
                    'total_slots' => $slot->total_slots + 1,
                ]);
                $this->dialog()->success(
                    $title = 'OUT',
                    $description = 'vehicle OUT successfully'
                );
                   $this->identification = null;
            }else{
               Attendance::create([
                'identification' => $this->identification,
                'fullname' => $data->first()->name,
                'user_type' => $data->first()->user_type,
                'time_in' => now(),
               ]);
               $slot = Slot::first();
               $slot->update([
                   'total_slots' => $slot->total_slots - 1,
               ]);
               $this->dialog()->success(
                $title = 'IN',
                $description = 'vehicle IN successfully'
            );
               $this->identification = null;
            }
        }else{
            $this->dialog()->error(
                $title = 'NOT FOUND',
                $description = 'QR has not been registered with this vehicle',
            );
        }
    }

    public function visitorIn(){
       $this->validate([
        'fullname' => 'required',
        'address' => 'required',
        'model' => 'required',
        'plate_number' =>'required',
        'orcr' =>'required',
        'license' =>'required',
       ]);

      $visitor =  VisitorInformation::create([
        'fullname' => $this->fullname,
        'address' => $this->address,
        'account' => $this->account,
      ]);

      VehicleInformation::create([
        'visitor_information_id' => $visitor->id,
        'model' => $this->model,
        'plate_number' => $this->plate_number,
        'orcr' => $this->orcr,
        'license' => $this->license,
      ]);

      Attendance::create([
        'fullname' => $this->fullname,
        'user_type' => 'visitor',
        'time_in' => now(),
      ]);
      $slot = Slot::first();
      $slot->update([
          'total_slots' => $slot->total_slots - 1,
      ]);

      $this->dialog()->success(
        $title = 'IN',
        $description = 'vehicle IN successfully'
    );
       $this->visitor_modal = false;


    }
    public function render()
    {
        return view('livewire.guard.transaction', [
            'slots' => Slot::get()->count() > 0 ? Slot::first()->total_slots : 0,
        ]);
    }
}
