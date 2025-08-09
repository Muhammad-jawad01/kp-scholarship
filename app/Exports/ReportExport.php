<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport implements FromView
{
    protected $report;

    public function __construct($report)
    {
        $this->report = $report;
    }
    public function view(): View
    {
        if ($this->report) {
            $users = [];
            foreach ($this->report as $value) {
                $user = User::where('id', $value->user_id)->first();
                if ($user) {
                    $users[] = $user;
                }
            }

            return view('export', compact('users'));
        } else {
            return view('export', ['users' => []]);
        }
    }
}
