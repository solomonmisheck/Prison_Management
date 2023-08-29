@extends('layouts.master')

@section('title', 'Edit Visit')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Visit</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/edit-visit/'.$visit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Inmate</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required" name="inmate_id">
                            <option selected>Choose Inmate</option>
                            @foreach ($inmates as $inmate)
                            <option {{ old('inmate_id', $visit->inmate_id) ==  $inmate->id ? 'selected' : ''}} value="{{ $inmate->id }}">{{ $inmate->firstname .' '.$inmate->lastname }}</option>
                                {{-- <option name="inmate_id" value="{{ $inmate->id }}">{{ $inmate->firstname .' '.$inmate->lastname }}</option> --}}
                            @endforeach                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Visitor Name</label>
                        <input type="text" name="visitor_name" value="{{ $visit->visitor_name }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Visitor Phone</label>
                        <input type="number" name="visitor_phone" value="{{ $visit->visitor_phone }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Relationship</label>
                        <input type="text" name="visitor_relation" value="{{ $visit->visitor_relation }}" class="form-control">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
