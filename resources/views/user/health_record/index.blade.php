@extends('user.user')

@section('title', 'Health Records')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Inmate Health Records
                    {{-- <a href="{{ url('admin/add-health_record') }}" class="btn btn-primary btn-sm float-end">Add Health Record
                        </a> --}}
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
                            <th>Inmate</th>
                            <th>Disease</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Treatment</th>
                            <th>Status</th>
                            {{-- <th>Date Created</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($health_records as $health_record)
                            <tr>
                                <td>{{ $health_record->id }}</td>
                                @php
                                    $inmate = App\Models\Inmate::where('id', $health_record->inmate_id)->first();
                                    $disease = App\Models\Disease::where('id', $health_record->disease_id)->first();
                                @endphp
                                <td>{{ $inmate->firstname.' '.$inmate->lastname }}</td>
                                <td>{{ $disease->name }}</td>
                                <td>{{ $health_record->date_from }}</td>
                                <td>{{ $health_record->date_to }}</td>
                                <td>{{ $health_record->treatment_done }}</td>
                                <td>{{ $health_record->status }}</td>
                                {{-- <td>{{ $health_record->created_at->toDateString() }}</td> --}}
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('/inmate/view/health_record/' . $health_record->id) }}">View</a> 
                                    {{-- |
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-health_record/' . $health_record->id) }}">Delete</a> --}}

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
