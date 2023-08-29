<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Inmate;
use Illuminate\Http\Request;
use App\Http\Requests\VisitRequest;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function index(){
        $visits = Visit::all();
        return view('admin.visit.index', compact('visits'));
    }

    public function create(){
        $inmates = Inmate::all();
        return view('admin.visit.create', compact('inmates'));
    }

    public function store(VisitRequest $request)
    {
        $data = $request->validated();
        $visit = new Visit;
        $data['created_by'] = Auth::user()->id;
        $visit->create($data);

        return redirect('admin/visits')->with('message', "Visit created successfully");
    }

    public function edit($id){
        $visit = Visit::findOrFail($id);
        $inmates = Inmate::all();
        return view('admin.visit.edit', compact('visit', 'inmates'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $Visit = Visit::findOrFail($id);
        $Visit->update($data);

        return redirect('admin/visits')->with('message', "Visit updated successfully");
    }

    public function destroy($id)
    {
        $Visit = Visit::findOrFail($id);
        $Visit->delete();

        return redirect('admin/visits')->with('message', "Visit deleted successfully");
    }
}
