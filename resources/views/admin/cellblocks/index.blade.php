@extends('layouts.master')

@section('title', 'Cell-Blocks')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Cell Blocks
                    <a href="{{ url('admin/add-cellblock') }}" class="btn btn-primary btn-sm float-end">Add Cell
                        Block</a>
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
                        @foreach ($cell_blocks as $cell_block)
                            <tr>
                                <td>{{ $cell_block->id }}</td>
                                <td>{{ $cell_block->name }}</td>
                                <td>{{ $cell_block->description }}</td>
                                <td>{{ $cell_block->created_at->toDateString() }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('admin/edit-cellblock/' . $cell_block->id) }}">Edit</a> |
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-cellblock/' . $cell_block->id) }}">Delete</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
