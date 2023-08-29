<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Visit;
use App\Models\Inmate;
use App\Models\Disease;
use App\Models\CellBlock;
use App\Models\InmateCrime;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(){
        $inmates = Inmate::join('requests as r', 'inmates.id', 'r.inmate_id')->where('r.status', 'Approved')->where('r.requester_id', Auth::user()->id)->get();
        $health_records = HealthRecord::join('requests as r', 'health_records.inmate_id', 'r.inmate_id')->where('r.status', 'Approved')->where('r.requester_id', Auth::user()->id)->get();
        $visits = Visit::join('requests as r', 'visits.inmate_id', 'r.inmate_id')->where('r.status', 'Approved')->where('r.requester_id', Auth::user()->id)->get();
        return view('user.dashboard', compact('inmates', 'health_records', 'visits'));
    }

    public function inmates(){
        $inmates = Inmate::join('requests as r', 'inmates.id', 'r.inmate_id')->where('r.status', 'Approved')->where('r.requester_id', Auth::user()->id)->get();
        return view('user.inmate.index', compact('inmates'));
    }

    public function viewInmate($id){
        $inmate = Inmate::findOrFail($id);
        $cell = CellBlock::where('id', $inmate->cell_block_id)->first()->name;
        $cell_blocks = CellBlock::all();
        $inmate_crimes = InmateCrime::join('crimes as c', 'inmates_crimes.crime_id', 'c.id')->where('inmate_id', $inmate->id)->get();
        
        $crimes = Crime::all();
        return view('user.inmate.edit', compact('inmate', 'cell','inmate_crimes','cell_blocks','crimes'));
    }

    public function inmateHealthRecords(){
        $health_records = HealthRecord::join('requests as r', 'health_records.inmate_id', 'r.inmate_id')->where('r.status', 'Approved')->where('r.requester_id', Auth::user()->id)->get();
        return view('user.health_record.index', compact('health_records'));
    }

    public function viewInmateHealthRecord($id){
        $health_record = HealthRecord::findOrFail($id);
        $inmates = Inmate::all();
        $diseases = Disease::all();
        return view('user.health_record.edit', compact('health_record','inmates', 'diseases'));
    }

    public function inmeateVisits(){
        $visits = Visit::join('requests as r', 'visits.inmate_id', 'r.inmate_id')->where('r.status', 'Approved')->where('r.requester_id', Auth::user()->id)->get();
        return view('user.visit.index', compact('visits'));
    }
}
