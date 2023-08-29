@extends('layouts.master')

@section('title', 'Add Inmate')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Inmate</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/add-inmate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="">Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Code</label>
                                <input type="text" name="code" id="" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Cell Block</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="cell_block_id">
                                    <option selected>Choose Cell Block</option>
                                    @foreach ($cell_blocks as $cell_block)
                                        <option class="form-control" name="cell_block_id" value="{{ $cell_block->id }}">
                                            {{ $cell_block->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" id="" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Middle Name</label>
                                <input type="text" name="middlename" id="" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" id="" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">ID Number</label>
                                <input type="number" name="id_number" id="" class="form-control" required>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Gender</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-lg example"
                                    required="required" name="gender">
                                    <option selected>Choose Gender</option>
                                    <option name="gender" value="Male">Male</option>
                                    <option name="gender" value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Education Level</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-lg example"
                                    name="education_level">
                                    <option selected>Choose Education Level</option>
                                    <option name="education_level" value="Primary Education">Primary Education</option>
                                    <option name="education_level" value="Secondary Education">Secondary Education</option>
                                    <option name="education_level" value="Tertiary Education">Tertiary Education</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <textarea name="address" id="" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Photo</label>
                                <input type="file" name="image" id="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="">Case Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="" class="control-label">Crime Committed</label>
                                <select class="form-control form-control-sm rounded-0" name="crimes[]" required="required"
                                    multiple>
                                    @foreach ($crimes as $crime)
                                        <option value="{{ $crime->id }}">{{ $crime->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Offence</label>
                                <textarea name="offence" id="" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Judgement</label>
                                <textarea name="judgement" id="" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                            <label for="">Court</label>
                            <input type="text" name="court" id="" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Date Of Judgemet</label>
                            <input type="date" id="date_of_judgemet" name="date_from" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Virdict</label>
                            <input type="text" name="virdict" id="" class="form-control" required>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">Sentence</label>
                                <input type="text" name="sentence" id="" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Date of Conviction</label>
                                <input type="date" id="date_from" name="date_from" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Release Date</label>
                                <input type="date" id="date_to" name="date_to" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="">Emergency Contact Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="contact_name" id="" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Phone</label>
                                <input type="number" name="contact_phone" id="" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Relationship</label>
                                <input type="text" name="contact_relation" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
