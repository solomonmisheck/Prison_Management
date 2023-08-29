@extends('layouts.master')

@section('title', 'Requests')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Requests List
                    {{-- <a href="{{ url('/add-request') }}" class="btn btn-primary btn-sm float-end">Add Request
                        </a> --}}
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Inmate</th>
                            <th>Inmate ID</th>
                            <th>Relation</th>
                            <th>Requester</th>
                            <th>Requester Phone</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->firstname.' '.$request->lastname }}</td>
                                <td>{{ $request->inmateNameId }}</td>
                                <td>{{ $request->relation }}</td>
                                <td>{{ $request->requesterName }}</td>
                                <td>{{ $request->requester_phone }}</td>
                                <td>{{ $request->created_at->toDateString() }}</td>
                                <td>{{ $request->status }}</td>
                                {{-- <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('approve-request/' . $request->id) }}">Accept</a> |
                                    <a class="btn btn-danger btn-sm" href="{{ url('reject-request/' . $request->id) }}">Reject</a>
                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
