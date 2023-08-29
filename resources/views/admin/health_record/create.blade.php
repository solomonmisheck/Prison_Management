@extends('layouts.master')

@section('title', 'Add Health Record')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Health Record</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/add-health_record') }}" method="POST">
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
                        <label for="">Disease</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required" name="disease_id">
                            <option selected>Select Disease</option>
                            @foreach ($diseases as $disease)
                                <option name="disease_id" value="{{ $disease->id }}">{{ $disease->name }}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Start Date</label>
                        <input type="date" id="date_from" name="date_from" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">End Date</label>
                        <input type="date" id="date_to" name="date_to" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Treatment Done</label>
                        <input type="text" name="treatment_done" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="text" name="status" id="" class="form-control">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
