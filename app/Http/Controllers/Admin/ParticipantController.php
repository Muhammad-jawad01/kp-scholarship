<?php

namespace App\Http\Controllers\Admin;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use Yajra\Datatables\Datatables;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Application::select('*')->with('participant')->where('levels_or_stage_id', $request->level_id);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('participants.show', $row->participant_id) . '" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('content.apps.participant.index');
    }


    public function show($id)
    {
        $participant = Participant::findorfail($id);
        return view('content.apps.participant.show', compact('participant'));
    }
}
