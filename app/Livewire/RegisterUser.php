<?php

namespace App\Livewire;

use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Radio;

class RegisterUser extends Component implements HasForms
{
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.register-user');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order')
                        ->schema([
                            Radio::make('statusssss')
                            ->options([
                                'faculty' => 'Faculty',
                                'user' => 'User',
                            ])
                        ]),
                    Wizard\Step::make('Delivery')
                        ->schema([
                            Radio::make('statuss')
                            ->options([
                                'faculty' => 'Faculty',
                                'user' => 'User',
                            ])
                        ]),
                    Wizard\Step::make('Billing')
                        ->schema([
                            // ...
                        ]),
                ])
                    ]);

    }
}
