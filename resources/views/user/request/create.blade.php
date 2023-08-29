@extends('user.user')

@section('title', 'Add Crime')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Request</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('/add-request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Inmate Id Number</label>
                        <input type="number" name="inmate_id_number" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Your Phone</label>
                        <input type="number" name="requester_phone" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Relationship</label>
                        <input type="text" name="relation" id="" class="form-control" required>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Send Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
