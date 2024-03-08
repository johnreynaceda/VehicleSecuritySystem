<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\VehicleInformation;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\WithFileUploads;
use Filament\Forms\Components\ViewField;

class VehicleUpdate extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;
    public $view_get;

    public $attachment = [];
    public $open_modal = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('attachment')->label('Upload Image'),
            ]);
    }


    public function updateRecord(){
        foreach ($this->attachment as $key => $value) {
            switch ($this->view_get) {
                case 'front_view':
                    auth()->user()->vehicleInformation->update([
                        'front_view_path' => $value->store('Front View', 'public'),
                    ]);
                    break;

                    case 'back_view':
                        auth()->user()->vehicleInformation->update([
                            'back_view_path' => $value->store('Back View', 'public'),
                        ]);
                        break;

                        case 'side_view':
                            auth()->user()->vehicleInformation->update([
                                'side_view_path' => $value->store('Side View', 'public'),
                            ]);
                            break;

                default:
                    # code...
                    break;
            }
            $this->open_modal = false;
            $this->attachment = [];
        }
    }

    public function render()
    {
        return view('livewire.user.vehicle-update');
    }

    public function updateView($view){
        $this->view_get = $view;
        $this->open_modal = true;
    }
}
