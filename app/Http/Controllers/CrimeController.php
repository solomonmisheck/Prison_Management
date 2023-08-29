<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Illuminate\Http\Request;
use App\Http\Requests\CrimeRequest;
use Illuminate\Support\Facades\Auth;

class CrimeController extends Controller
{
    public function index(){
        $crime_list = Crime::all();
        return view('admin.crime.index', compact('crime_list'));
    }


    public function create(){
        return view('admin.crime.create');
    }

    public function store(CrimeRequest $request)
    {
        $data = $request->validated();

        $crime = new Crime;
        $data['created_by'] = Auth::user()->id;
        $crime->create($data);

        return redirect('admin/crime')->with('message', "Crime created successfully");
    }

    public function edit($id){
        $crime = Crime::findOrFail($id);
        return view('admin.crime.edit', compact('crime'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $crime = Crime::findOrFail($id);
        $crime->update($data);

        return redirect('admin/crime')->with('message', "Crime updated successfully");
    }

    public function destroy($id)
    {
        $crime = Crime::findOrFail($id);
        $crime->delete();

        return redirect('admin/crime')->with('message', "Crime deleted successfully");
    }

}
