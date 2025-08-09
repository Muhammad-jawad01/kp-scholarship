@extends('layouts/scholarshipLayout')

@section('title', 'KPEF Scholarship Form')

@section('vendor-style')
    {{-- Vendor Css files --}}

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">

    <style>
        .table td,
        .table th {
            padding: 0.52rem 5px !important;
        }
    </style>
@endsection

@section('content')

    <!-- users edit start -->
    <div class="card mt-5">
        <form action="{{ route('general_info.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-11 mx-auto">
                    {{-- mian form --}}

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0 my-2">General Information</h2>
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">University Name</label>
                                {{-- <input type="text" class="form-control" name="university_name"
                                    value="{{ Auth()->user()->university_name }}"> --}}

                                <select name="university_id" class="form-control">
                                    @foreach ($universities as $uni)
                                        {{-- <option value="{{ $uni->id }}"
                                            @if (Auth::user()->university_id == $uni->id) selected @endif>
                                            {{ $uni->name }} --}}
                                        <option value="{{ $uni->id }}"
                                            {{ Auth::user()->university_id == $uni->id ? 'selected' : '' }}>
                                            {{ $uni->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Degreee</label>
                                <input type="text" class="form-control"
                                    name="degree"value="{{ Auth()->user()->degree }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Campus</label>
                                <input type="text" class="form-control" name="campus"
                                    value="{{ Auth()->user()->campus }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Discipline</label>
                                <input type="text" class="form-control" name="discipline"
                                    value="{{ Auth()->user()->discipline }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Sub Discipline</label>
                                <input type="text" class="form-control" name="sub_discipline"
                                    value="{{ Auth()->user()->sub_discipline }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">University Reg. No</label>
                                <input type="text" class="form-control"
                                    name="university_reg_no"value="{{ Auth()->user()->university_reg_no }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Program Duration</label>
                                <input type="number" class="form-control" name="program_duration"
                                    value="{{ Auth()->user()->program_duration }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Current Semester</label>
                                <input type="number" class="form-control" name="current_semester"
                                    value="{{ Auth()->user()->current_semester }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0 my-1">Applicant information</h2>
                            <hr />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ Auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Father Name</label>
                                <input type="text" class="form-control" name="father_name"
                                    value="{{ Auth()->user()->father_name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Guardian Name</label>
                                <input type="text" class="form-control"
                                    name="guardian_name"value="{{ Auth()->user()->guardian_name }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Fe-Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date Of Birth</label>
                                <input type="date" class="form-control" name="birth_date"
                                    value="{{ Auth()->user()->birth_date }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="number" class="form-control" name="age"
                                    value="{{ Auth()->user()->age }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Marital Status</label>
                                <select name="marital_status" id="" class="form-control">
                                    <option value="Married">Married</option>
                                    <option value="Un married">Un-Married</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">CNIC</label>
                                <input type="number" class="form-control" name="nic"
                                    value="{{ Auth()->user()->nic }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="number" class="form-control" name="mobile_no"
                                    value="{{ Auth()->user()->mobile_no }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nationality</label>
                                <input type="text" class="form-control" name="nationality"
                                    value="{{ Auth()->user()->nationality }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Domicile</label>
                                <select name="domicile_district_id" id="" class="form-control">
                                    {{-- <option value="">Married</option>
                                    <option value="">Non-Married</option> --}}

                                    @foreach ($districts as $value)
                                        <option value="{{ $value->id }}"
                                            {{ Auth()->user()->domicile_district_id === $value->id ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tehsil</label>
                                {{-- <select name="tehsil" id="" class="form-control">
                                    <option value="">Married</option>
                                    <option value="">Non-Married</option>
                                </select> --}}
                                <input type="text" class="form-control" name="tehsil"
                                    value="{{ Auth()->user()->tehsil }}">

                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ Auth()->user()->email }}">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ Auth()->user()->address }}">
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0 my-1">Previous Education of the Applicant </h2>
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table my-2">
                                <thead>
                                    <tr>
                                        <th>LEVEL</th>
                                        <th width="250">INSTITUTE</th>
                                        <th>PASSING YEAR</th>
                                        <th>PER MONTH KPEF </th>
                                        <th>TOTAL MARKS/CGPA</th>
                                        <th colspan="2">OBTAINED MARKA/CGPA</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    @if ($user_edu)

                                        @foreach ($user_edu as $data)
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control"
                                                        value="{{ $data->id }}" name="edu_id[]">
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->level }}" name="level[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->institute_university_name }}"
                                                        name="institute_university_name[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->passing_year }}" name="passing_year[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->per_month_kpef }}"name="per_month_kpef[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->total_marks_cgpa }}" name="total_marks_cgpa[]">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        class="form-control"value="{{ $data->obtained_marks_cgpa }}"
                                                        name="obtained_marks_cgpa[]">
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm remove_row"
                                                        type="button">x</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="level[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    name="institute_university_name[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="passing_year[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="per_month_kpef[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="total_marks_cgpa[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="obtained_marks_cgpa[]">
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm remove_row" type="button">x</button>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <button class="btn btn-success btn-sm" id="addRow" type="button"><i
                                                    data-feather="plus"></i> Add Row</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mx-auto my-3">
                            <button class="btn btn-success  btn-block">Submit</button>
                        </div>
                    </div>


                    {{-- ./ mian form --}}

                </div>
            </div>
        </form>

    </div>
    <!-- users edit ends -->
@endsection



@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>

    <script>
        $(document).ready(function() {
            $('#addRow').click(function() {
                let str = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="level[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="institute_university_name[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="passing_year[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="per_month_kpef[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="total_marks_cgpa[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="obtained_marks_cgpa[]">
                </td>
                <td>
                    <button class="btn btn-danger btn-sm remove_row"  type="button">x</button>
                </td>
            </tr>`;
                $('#tablebody').append(str);
                $(".remove_row").click(function() {
                    $(this).closest('tr').remove();
                });
            });
        });
    </script>

@endsection
