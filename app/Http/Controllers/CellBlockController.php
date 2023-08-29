<?php

namespace App\Http\Controllers;

use App\Models\CellBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CellBlockRequest;

class CellBlockController extends Controller
{
    public function index(){
        $cell_blocks = CellBlock::all();
        return view('admin.cellblocks.index', compact('cell_blocks'));
    }

    public function create(){
        return view('admin.cellblocks.create');
    }

    public function store(CellBlockRequest $request)
    {
        $data = $request->validated();

        $cell_block = new CellBlock;
        $data['created_by'] = Auth::user()->id;
        $cell_block->create($data);

        return redirect('admin/cellblocks')->with('message', "Cell Block created successfully");
    }

    public function edit($id){
        $cell_block = CellBlock::findOrFail($id);
        return view('admin.cellblocks.edit', compact('cell_block'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $cell_block = CellBlock::findOrFail($id);
        $cell_block->update($data);

        return redirect('admin/cellblocks')->with('message', "Cell Block updated successfully");
    }

    public function destroy($id)
    {
        $cell_block = CellBlock::findOrFail($id);
        $cell_block->delete();

        return redirect('admin/cellblocks')->with('message', "Cell Block deleted successfully");
    }
}
