@extends('layouts.master')

@section('title', 'Add Visit')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Visit</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/add-visit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Inmate</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required" name="inmate_id">
                            <option selected>Choose Inmate</option>
                            @foreach ($inmates as $inmate)
                                <option name="inmate_id" value="{{ $inmate->id }}">{{ $inmate->firstname .' '.$inmate->lastname }}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Visitor Name</label>
                        <input type="text" name="visitor_name" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Visitor Phone</label>
                        <input type="number" name="visitor_phone" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Relationship</label>
                        <input type="text" name="visitor_relation" id="" class="form-control">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
