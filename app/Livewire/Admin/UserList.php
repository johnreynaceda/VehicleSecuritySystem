<?php

namespace App\Livewire\Admin;

use App\Models\Attendance;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;


class UserList extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->whereIn('user_type', ['faculty','student']))
            ->columns([
                TextColumn::make('name')->label('NAME'),
                TextColumn::make('email')->label('EMAIL'),
                TextColumn::make('contact')->label('CONTACT'),
                TextColumn::make('user_type')->label('USER TYPE'),

            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.user-list');
    }
}
