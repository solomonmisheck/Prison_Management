@extends('layouts.master')

@section('title', 'Transfer Inmate')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Transfer Inmate
                    <a href="{{ url('admin/inmates') }}" class="btn btn-danger btn-sm float-end">Close
                    </a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/transfer-inmate/' . $inmate->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4 class="">Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label for="">Code</label>
                                <input type="text" name="code" value="{{ $inmate->code }}" class="form-control"
                                    disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" value="{{ $inmate->firstname }}" class="form-control"
                                disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Middle Name</label>
                                <input type="text" name="middlename" value="{{ $inmate->middlename }}"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" value="{{ $inmate->lastname }}" class="form-control"
                                disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">ID Number</label>
                                <input type="number" name="id_number" value="{{ $inmate->id_number }}" class="form-control"
                                disabled>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Gender</label>
                                <input type="text" name="gender" value="{{ $inmate->gender }}" class="form-control"
                                disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="">Cell Block Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Current Cell Block</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                                    <option selected>{{ $cell }}</option>
                                    @foreach ($cell_blocks as $cell_block)
                                        <option
                                            {{ old('cell_block_id', $inmate->cell_block_id) == $cell_block->id ? 'selected' : '' }}
                                            value="{{ $cell_block->id }}">{{ $cell_block->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Next Cell Block</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="cell_block_id">
                                    <option selected>{{ $cell }}</option>
                                    @foreach ($cell_blocks as $cell_block)
                                        <option
                                            {{ old('cell_block_id', $inmate->cell_block_id) == $cell_block->id ? 'selected' : '' }}
                                            value="{{ $cell_block->id }}">{{ $cell_block->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary">Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
