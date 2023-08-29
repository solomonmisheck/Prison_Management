@extends('user.user')

@section('title', 'View Health Record')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Health Record Details
                    <a href="{{ url('health_records') }}" class="btn btn-danger btn-sm float-end">Close
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
                <form action="{{ url('admin/edit-health_record/' . $health_record->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Inmate</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required"
                            name="inmate_id">
                            <option selected>Choose Inmate</option>
                            @foreach ($inmates as $inmate)
                                <option {{ old('inmate_id', $health_record->inmate_id) == $inmate->id ? 'selected' : '' }}
                                    value="{{ $inmate->id }}">{{ $inmate->firstname . ' ' . $inmate->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Disease</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required"
                            name="disease_id">
                            <option selected>Select Disease</option>
                            @foreach ($diseases as $disease)
                                <option
                                    {{ old('disease_id', $health_record->disease_id) == $disease->id ? 'selected' : '' }}
                                    value="{{ $disease->id }}">{{ $disease->name }}</option>

                                <option name="disease_id" value="{{ $disease->id }}">{{ $disease->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Start Date</label>
                        <input type="date" id="date_from" name="date_from" value="{{ $health_record->date_from }}"
                            class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">End Date</label>
                        <input type="date" id="date_to" name="date_to" value="{{ $health_record->date_to }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Treatment Done</label>
                        <input type="text" name="treatment_done" value="{{ $health_record->treatment_done }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="text" name="status" value="{{ $health_record->status }}" class="form-control">
                    </div>
                    <div class="row">
                        {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
