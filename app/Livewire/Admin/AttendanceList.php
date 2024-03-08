<?php

namespace App\Livewire\Admin;

use App\Exports\AttendanceExport;
use App\Models\Attendance;
use App\Models\Shop\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Tables\Filters\SelectFilter;
use Maatwebsite\Excel\Excel;

class AttendanceList extends Component
{

    public $user_type;
    public $type;


    // public function table(Table $table): Table
    // {
    //     return $table
    //         ->query(Attendance::query()->where('user_type', 'like', '%'. $this->user_type. '%')->orderBy('created_at', 'DESC'))
    //         ->columns([
    //             TextColumn::make('fullname')->label('FULLNAME'),
    //             TextColumn::make('user_type')->label('USER TYPE'),
    //             TextColumn::make('time_in')->date('F d, Y h:i A')->label('TIME IN'),
    //             TextColumn::make('time_out')->date('F d, Y h:i A')->label('TIME OUT'),
    //             TextColumn::make('status')->label('STATUS'),

    //         ])
    //         ->filters([

    //         ])

    //         ->actions([
    //             Action::make('timeout')->label('TIMEOUT')->button()->size('xs')->icon('heroicon-m-clock')->hidden(
    //                 function($record){
    //                     return $record->time_out != null || $record->user_type != 'visitor';
    //                 }
    //             )->action(
    //                 function($record){
    //                     $record->update([
    //                         'time_out' => now(),
    //                       'status' => 'done',
    //                     ]);
    //                 }
    //             ),
    //         ])
    //         ->bulkActions([
    //             // ...
    //         ]);
    // }

    public function generateReport(){
        return \Maatwebsite\Excel\Facades\Excel::download(new AttendanceExport($this->user_type), 'attendance.xlsx');
    }

    public function timeout($id){
        $data = Attendance::where('id', $id)->first();
        $data->update([
            'time_out' => now(),
          'status' => 'done',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.attendance-list',[
            'attendances' => Attendance::when($this->user_type, function($record){
                $record->where('user_type', $this->user_type);
            })->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
