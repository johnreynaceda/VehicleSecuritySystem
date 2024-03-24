<?php

namespace App\Livewire;

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
use Livewire\Component;
use Livewire\WithFileUploads;
use Filament\Forms\Components\ViewField;
class RegisterUser extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public $user_type, $identification, $firstname, $middlename, $lastname, $email, $password, $confirm_password, $contact;

    public $front_view = [], $back_view = [], $side_view = [], $model, $plate_number, $orcr, $license, $proof_orcr = [], $proof_license = [];
    public function render()
    {
        return view('livewire.register-user');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Personal Information')
                        ->schema([
                            Radio::make('user_type')->required()
                                ->options([
                                    'faculty' => 'Faculty',
                                    'student' => 'Student',
                                ]),
                            Fieldset::make('')->schema([
                                TextInput::make('identification')->label('ID Number')->prefixIcon('heroicon-m-identification')->required(),
                                TextInput::make('firstname')->label('Firstname')->prefixIcon('heroicon-m-user')->required(),
                                TextInput::make('middlename')->label('Middlename(Optional)')->prefixIcon('heroicon-m-user'),
                                TextInput::make('lastname')->label('Lastname')->prefixIcon('heroicon-m-user')->required(),
                                TextInput::make('email')->label('Email Address')->email()->prefixIcon('heroicon-m-at-symbol')->required(),
                                TextInput::make('contact')->label('Contact')->prefixIcon('heroicon-m-device-phone-mobile')->required(),
                                TextInput::make('password')->label('Password')->password()->prefixIcon('heroicon-m-key')->required(),
                                TextInput::make('confirm_password')->label('Confirm Password')->password()->same('password')->prefixIcon('heroicon-m-key'),

                            ]),
                        ]),
                    Wizard\Step::make('Vehicle Information')
                        ->schema([
                            Grid::make(2)->schema([
                                FileUpload::make('front_view'),
                                FileUpload::make('back_view'),
                                FileUpload::make('side_view'),
                            ]),
                            Fieldset::make('INFORMATION')->schema([
                                TextInput::make('model')->label('Vehicle Model')->required(),
                                TextInput::make('plate_number')->label('Plate Number')->required(),
                                TextInput::make('orcr')->label('ORCR')->required(),
                                TextInput::make('license')->label('License Number')->required(),
                                FileUpload::make('proof_orcr')->label('Proof of ORCR'),
                                FileUpload::make('proof_license')->label('Proof of License'),
                            ]),
                        ]),
                    Wizard\Step::make('Summary')
                        ->schema([
                            ViewField::make('rating')
                            ->view('filament.forms.summary')
                        ])
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                <x-filament::button
                    type="submit"
                    size="sm"
                    wire:click="registerAccount"
                    icon="heroicon-o-arrow-long-right"
                >
                    Register Account
                </x-filament::button>
            BLADE)))
                        ]);

    }

    public function registerAccount(){
        $user = User::create([
            'name' => $this->firstname. ' ' . $this->lastname,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'user_type' => $this->user_type,
            'identification' => $this->identification,
            'contact' => $this->contact,
        ]);

        $vehicle = VehicleInformation::create([
            'user_id' => $user->id,
            'model' => $this->model,
            'orcr' => $this->orcr,
            'license' => $this->license,
            'plate_number' => $this->plate_number,
        ]);

        foreach ($this->front_view as $key => $value) {
            $vehicle->update([
                'front_view_path' => $value->store('Front View', 'public'),
            ]);
        }

        foreach ($this->back_view as $key => $value) {
            $vehicle->update([
                'back_view_path' => $value->store('Back View', 'public'),
            ]);
        }
        foreach ($this->side_view as $key => $value) {
            $vehicle->update([
                'side_view_path' => $value->store('Side View', 'public'),
            ]);
        }

        foreach ($this->proof_orcr as $key => $value) {
            $vehicle->update([
                'proof_of_orcr' => $value->store('ORCR', 'public'),
            ]);
        }
        foreach ($this->proof_license as $key => $value) {
            $vehicle->update([
                'proof_of_license' => $value->store('License', 'public'),
            ]);
        }

        auth()->loginUsingId($user->id);

        sleep(2);

        return redirect()->route('dashboard');
    }
}
