<?php

namespace App\Http\Controllers\Minister;

use App\Models\Crime;
use App\Models\Visit;
use App\Models\Inmate;
use App\Models\Disease;
use App\Models\CellBlock;
use App\Models\InmateCrime;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('minister.dashboard');
    }

    public function inmates(){
        $inmates = Inmate::all();
        return view('minister.inmate.index', compact('inmates'));
    }

    public function viewInmate($id){
        $inmate = Inmate::findOrFail($id);
        $cell = CellBlock::where('id', $inmate->cell_block_id)->first()->name;
        $cell_blocks = CellBlock::all();
        $inmate_crimes = InmateCrime::join('crimes as c', 'inmates_crimes.crime_id', 'c.id')->where('inmate_id', $inmate->id)->get();
        
        $crimes = Crime::all();
        return view('minister.inmate.edit', compact('inmate', 'cell','inmate_crimes','cell_blocks','crimes'));
    }

    public function inmateHealthRecords(){
        $health_records = HealthRecord::all();
        return view('minister.health_record.index', compact('health_records'));
    }

    public function viewInmateHealthRecord($id){
        $health_record = HealthRecord::findOrFail($id);
        $inmates = Inmate::all();
        $diseases = Disease::all();
        return view('minister.health_record.edit', compact('health_record','inmates', 'diseases'));
    }

    public function inmeateVisits(){
        $visits = Visit::all();
        return view('minister.visit.index', compact('visits'));
    }
}
