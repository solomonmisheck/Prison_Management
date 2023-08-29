@extends('layouts.master')

@section('title', 'Visits List')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Visits List
                    <a href="{{ url('admin/add-visit') }}" class="btn btn-primary btn-sm float-end">Add Visit
                        </a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Inmate</th>
                            <th>Visitor Name</th>
                            <th>Visitor Phone</th>
                            <th>Visitor Relation</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                            <tr>
                                <td>{{ $visit->id }}</td>
                                @php
                                    $inmate = App\Models\Inmate::where('id', $visit->inmate_id)->first();
                                @endphp
                                <td>{{ $inmate->firstname.' '.$inmate->lastname }}</td>
                                <td>{{ $visit->visitor_name }}</td>
                                <td>{{ $visit->visitor_phone }}</td>
                                <td>{{ $visit->visitor_relation }}</td>
                                <td>{{ $visit->created_at->toDateString() }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('admin/edit-visit/' . $visit->id) }}">Edit</a> |
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-visit/' . $visit->id) }}">Delete</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
