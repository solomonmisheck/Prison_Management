<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiseaseRequest;

class DiseaseController extends Controller
{
    public function index(){
        $diseases = Disease::all();
        return view('admin.disease.index', compact('diseases'));
    }

    public function create(){
        return view('admin.disease.create');
    }

    public function store(DiseaseRequest $request)
    {
        $data = $request->validated();
        $Disease = new Disease;
        $data['created_by'] = Auth::user()->id;
        $Disease->create($data);

        return redirect('admin/diseases')->with('message', "Disease created successfully");
    }

    public function edit($id){
        $disease = Disease::findOrFail($id);
        return view('admin.disease.edit', compact('disease'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $Disease = Disease::findOrFail($id);
        $Disease->update($data);

        return redirect('admin/diseases')->with('message', "Disease updated successfully");
    }

    public function destroy($id)
    {
        $Disease = Disease::findOrFail($id);
        $Disease->delete();

        return redirect('admin/diseases')->with('message', "Disease deleted successfully");
    }
}
