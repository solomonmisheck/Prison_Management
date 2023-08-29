<?php

namespace App\Http\Controllers;

use App\Models\Inmate;
use App\Models\Disease;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\HealthRecordRequest;

class HealthRecordController extends Controller
{
    public function index(){
        $health_records = HealthRecord::all();
        return view('admin.health_record.index', compact('health_records'));
    }

    public function create(){
        $inmates = Inmate::all();
        $diseases = Disease::all();
        return view('admin.health_record.create', compact('inmates', 'diseases'));
    }

    public function store(HealthRecordRequest $request)
    {
        $data = $request->validated();
        $health_record = new HealthRecord;
        $data['created_by'] = Auth::user()->id;
        $health_record->create($data);

        return redirect('admin/health_records')->with('message', "HealthRecord created successfully");
    }

    public function edit($id){
        $health_record = HealthRecord::findOrFail($id);
        $inmates = Inmate::all();
        $diseases = Disease::all();
        return view('admin.health_record.edit', compact('health_record','inmates', 'diseases'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $health_record = HealthRecord::findOrFail($id);
        $health_record->update($data);

        return redirect('admin/health_records')->with('message', "HealthRecord updated successfully");
    }

    public function destroy($id)
    {
        $health_record = HealthRecord::findOrFail($id);
        $health_record->delete();

        return redirect('admin/health_records')->with('message', "HealthRecord deleted successfully");
    }
}
