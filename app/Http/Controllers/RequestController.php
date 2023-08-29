<?php

namespace App\Http\Controllers;

use App\Models\Inmate;
use App\Models\RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestRequest;

class RequestController extends Controller
{
    public function index(){
        $requests = RequestModel::join('users as u', 'requests.requester_id', 'u.id')
        ->join('inmates as in', 'requests.inmate_id_number', 'in.id_number')
        ->select('requests.*', 'in.firstname','in.lastname', 'in.id_number as inmateNameId', 'u.name as requesterName')
        ->where('requester_id', Auth::user()->id)
        ->get();
        return view('user.request.index', compact('requests'));
    }

    public function create(){
        return view('user.request.create');
    }

    public function store(RequestRequest $request)
    {
        $data = $request->validated();
        $RequestModel = new RequestModel;
        $data['inmate_id'] = Inmate::where('id_number', $request->inmate_id_number)->first()->id;
        $data['requester_id'] = Auth::user()->id;
        $RequestModel->create($data);

        return redirect('/requests')->with('message', "Request created successfully");
    }

    public function edit($id){
        $request = RequestModel::findOrFail($id);
        return view('user.request.edit', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $requests = $request->all();

        $request = RequestModel::findOrFail($id);
        $request->update($data);

        return redirect('/requests')->with('message', "request updated successfully");
    }

    public function destroy($id)
    {
        $request = RequestModel::findOrFail($id);
        $request->delete();

        return redirect('/requests')->with('message', "request deleted successfully");
    }

    public function pendingRequests(){
        $requests = RequestModel::join('users as u', 'requests.requester_id', 'u.id')
        ->join('inmates as in', 'requests.inmate_id_number', 'in.id_number')
        ->select('requests.*', 'in.firstname','in.lastname', 'in.id_number as inmateNameId', 'u.name as requesterName')
        ->where('status', 'Pending')
        ->get();
        return view('admin.request.pending', compact('requests'));
    }

    public function approvedRequests(){
        $requests = RequestModel::join('users as u', 'requests.requester_id', 'u.id')
        ->join('inmates as in', 'requests.inmate_id_number', 'in.id_number')
        ->select('requests.*', 'in.firstname','in.lastname', 'in.id_number as inmateNameId', 'u.name as requesterName')
        ->where('status', 'Approved')
        ->get();
        return view('admin.request.index', compact('requests'));
    }

    public function rejectedRequests(){
        $requests = RequestModel::join('users as u', 'requests.requester_id', 'u.id')
        ->join('inmates as in', 'requests.inmate_id_number', 'in.id_number')
        ->select('requests.*', 'in.firstname','in.lastname', 'in.id_number as inmateNameId', 'u.name as requesterName')
        ->where('status', 'Rejected')
        ->get();
        return view('admin.request.index', compact('requests'));
    }

    public function rejectRequest($id)
    {
        $request = RequestModel::findOrFail($id);
        $request->status = 'Rejected';
        $request->save();
        return redirect('admin/rejected_requests')->with('message', "Request Rejected");
    }

    public function approveRequest($id)
    {
        $request = RequestModel::findOrFail($id);
        $request->status = 'Approved';
        $request->save();
        return redirect('admin/approved_requests')->with('message', "Request Approved");
    }



}
