<?php

namespace App\Livewire;

use App\Models\Slot;
use Livewire\Component;

class SlotManage extends Component
{
    public $slots;
    public function mount(){
      $this->slots =  Slot::first()->total_slots ?? 0 ;
    }

    public function updatedSlots(){
        $total = Slot::get()->count();
        if($total > 0){
            Slot::first()->update([
                'total_slots' => $this->slots
            ]);
        }else{
            Slot::create([
                'total_slots' => $this->slots
            ]);
        }
    }
    public function render()
    {
        return view('livewire.slot-manage');
    }
}
