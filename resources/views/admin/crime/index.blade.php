@extends('layouts.master')

@section('title', 'Crime List')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Crime List
                    <a href="{{ url('admin/add-crime') }}" class="btn btn-primary btn-sm float-end">Add Crime
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crime_list as $crime)
                            <tr>
                                <td>{{ $crime->id }}</td>
                                <td>{{ $crime->name }}</td>
                                <td>{{ $crime->description }}</td>
                                <td>{{ $crime->created_at->toDateString() }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('admin/edit-crime/' . $crime->id) }}">Edit</a> |
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-crime/' . $crime->id) }}">Delete</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
