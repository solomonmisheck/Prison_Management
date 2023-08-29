<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Inmate;
use App\Models\CellBlock;
use App\Models\InmateCrime;
use Illuminate\Http\Request;
use App\Http\Requests\InmateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InmateController extends Controller
{
    public function index(){
        $inmates = Inmate::all();
        return view('admin.inmate.index', compact('inmates'));
    }


    public function create(){
        $cell_blocks = CellBlock::all();
        $crimes = Crime::all();
        return view('admin.inmate.create', compact('cell_blocks','crimes'));
    }

    public function store(InmateRequest $request)
    {
        $data = $request->validated();

        $Inmate = new Inmate;
        $data['created_by'] = Auth::user()->id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            // $filename = time().'.'.$file->getClientOriginalExtension();
            // $file->move('uploads/images/'.$filename);
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads/images'), $filename);
            $data['image'] = $filename;
        }

        $Inmate = $Inmate->create($data);

        $crimes = $request->crimes;
        foreach($crimes as $crime){
            $Inmate_crime = new InmateCrime;
            $Inmate_crime->inmate_id =$Inmate->id;
            $Inmate_crime->crime_id =$crime;
            $Inmate_crime->created_by = Auth::user()->id;
            $Inmate_crime->save();
        }

        return redirect('admin/inmates')->with('message', "Inmate created successfully");
    }

    public function edit($id){
        $inmate = Inmate::findOrFail($id);
        $cell = CellBlock::where('id', $inmate->cell_block_id)->first()->name;
        $cell_blocks = CellBlock::all();
        $inmate_crimes = InmateCrime::join('crimes as c', 'inmates_crimes.crime_id', 'c.id')->where('inmate_id', $inmate->id)->get();
        
        $crimes = Crime::all();
        return view('admin.inmate.edit', compact('inmate', 'cell','inmate_crimes','cell_blocks','crimes'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        $Inmate = Inmate::findOrFail($id);
        $data['created_by'] = Auth::user()->id;

        if($request->hasFile('image')){
            $destination = 'uploads/images/'.$Inmate->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads/images'), $filename);
            $data['image'] = $filename;
        }

        $Inmate->update($data);

        $Inmate_crimes = InmateCrime::where('inmate_id', $Inmate->id)->get();
        foreach ($Inmate_crimes as $Inmate_crime) {
            $Inmate_crime->delete();
        }
        $crimes = $request->crimes;
        foreach($crimes as $crime){
            $Inmate_crime = new InmateCrime;
            $Inmate_crime->inmate_id =$Inmate->id;
            $Inmate_crime->crime_id =$crime;
            $Inmate_crime->created_by = Auth::user()->id;
            $Inmate_crime->save();
        }

        return redirect('admin/inmates')->with('message', "Inmate updated successfully");
    }

    public function transfer($id){
        $inmate = Inmate::findOrFail($id);
        $cell = CellBlock::where('id', $inmate->cell_block_id)->first()->name;
        $cell_blocks = CellBlock::all();
        $inmate_crimes = InmateCrime::join('crimes as c', 'inmates_crimes.crime_id', 'c.id')->where('inmate_id', $inmate->id)->get();
        
        $crimes = Crime::all();
        return view('admin.inmate.transfer', compact('inmate', 'cell','inmate_crimes','cell_blocks','crimes'));
    }

    public function transferInmate(Request $request, $id)
    {
        $data = $request->all();
        $Inmate = Inmate::findOrFail($id);
        $Inmate->update($data);

        return redirect('admin/inmates')->with('message', "Inmate transfered successfully");
    }

    public function destroy($id)
    {
        $Inmate = Inmate::findOrFail($id);

        $Inmate_crimes = InmateCrime::where('inmate_id', $Inmate->id)->get();
        foreach ($Inmate_crimes as $Inmate_crime) {
            $Inmate_crime->delete();
        }
        $destination = 'uploads/images/'.$Inmate->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $Inmate->delete();

        return redirect('admin/inmates')->with('message', "Inmate deleted successfully");
    }
}
