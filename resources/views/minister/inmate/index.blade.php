@extends('minister.minister')

@section('title', 'Inmate List')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Inmate List
                    {{-- <a href="{{ url('admin/add-inmate') }}" class="btn btn-primary btn-sm float-end">Add Inmate
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
                            <th>Code</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Cell Block</th>
                            <th>Crime</th>
                            <th>Sentance</th>
                            <th>Date of Conviction</th>
                            <th>Release Date</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inmates as $inmate)
                            <tr>
                                <td>{{ $inmate->id }}</td>
                                <td>{{ $inmate->code }}</td>
                                <td>{{ $inmate->firstname . ' ' . $inmate->middlename . ' ' . $inmate->lastname }}</td>
                                <td>{{ $inmate->gender }}</td>
                                <td>{{ $inmate->dob }}</td>
                                <td>{{ $inmate->address }}</td>
                                <td>{{ App\Models\CellBlock::where('id', $inmate->cell_block_id)->first()->name }}</td>
                                @php
                                    $crimes_array = null;
                                    $crimes = App\Models\InmateCrime::join('crimes as c', 'inmates_crimes.crime_id', 'c.id')->select('name')->where('inmate_id', $inmate->id)->get();
                                @endphp
                                <td>{{ $crimes->pluck('name')->implode(', ') }}
                                </td>
                                <td>{{ $inmate->sentence }}</td>
                                <td>{{ $inmate->date_from }}</td>
                                <td>{{ $inmate->date_to }}</td>
                                <td>
                                    <img src="{{ asset('uploads/images/' . $inmate->image) }}" width="50px" height="50px"
                                        alt="">
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ url('minister/inmate/view/' . $inmate->id) }}">View</a>
                                    {{-- <a class="btn btn-danger btn-sm"
                                        href="{{ url('admin/delete-inmate/' . $inmate->id) }}">Delete</a> --}}

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
