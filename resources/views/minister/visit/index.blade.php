@extends('minister.minister')

@section('title', 'Inmate Visits')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Inmate Visits
                    {{-- <a href="{{ url('admin/add-visit') }}" class="btn btn-primary btn-sm float-end">Add Visit
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
                            <th>Visitor Name</th>
                            <th>Visitor Phone</th>
                            <th>Visitor Relation</th>
                            <th>Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                            <tr>
                                <td>{{ $visit->id }}</td>
                                @php
                                    $inmate = App\Models\Inmate::where('id', $visit->inmate_id)->first();
                                @endphp
                                <td>{{ $inmate->firstname.' '.$inmate->lastname }}</td>
                                <td>{{ $visit->visitor_name }}</td>
                                <td>{{ $visit->visitor_phone }}</td>
                                <td>{{ $visit->visitor_relation }}</td>
                                <td>{{ $visit->created_at->toDateString() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
