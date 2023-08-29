@extends('layouts.master')

@section('title', 'Diseases')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Diseases
                    <a href="{{ url('admin/add-disease') }}" class="btn btn-primary btn-sm float-end">Add Disease
                        </a>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diseases as $disease)
                            <tr>
                                <td>{{ $disease->id }}</td>
                                <td>{{ $disease->name }}</td>
                                <td>{{ $disease->description }}</td>
                                <td>{{ $disease->created_at->toDateString() }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('admin/edit-disease/' . $disease->id) }}">Edit</a> |
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-disease/' . $disease->id) }}">Delete</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
