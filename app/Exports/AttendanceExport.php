<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AttendanceExport implements FromView
{
    protected $user_type;

    public function __construct($user_type)
    {
        $this->user_type = $user_type;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Attendance::all();
    // }

    public function view(): View
    {
        return view('exports.attendance', [
            'attendances' => Attendance::where('user_type', $this->user_type)->get(),
        ]);
    }
}
