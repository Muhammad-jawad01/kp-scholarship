@extends('layouts/contentLayoutMaster')

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
    .table td, .table th {
        padding: 0.52rem 5px !important;
    }
</style>
@endsection

@section('content')
<!-- users edit start -->
    <form action="">
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
                            <input type="text" class="form-control" name="university_name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Degreee</label>
                            <input type="text" class="form-control" name="degree" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Campus</label>
                            <input type="text" class="form-control" name="campus" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Discipline</label>
                            <input type="text" class="form-control" name="discipline" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Sub Discipline</label>
                            <input type="text" class="form-control" name="sub_discipline" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">University Reg. No</label>
                            <input type="text" class="form-control" name="reg_no" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Program Duration</label>
                            <input type="text" class="form-control" name="program_duration" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Current Semester</label>
                            <input type="text" class="form-control" name="current_semester" >
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
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Father Name</label>
                            <input type="text" class="form-control" name="f_name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Guardian Name</label>
                            <input type="text" class="form-control" name="guardian_name" >
                        </div>
                    </div>
                  
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Gender</label>
                           <select name="gender" id="" class="form-control">
                            <option value="">Male</option>
                            <option value="">Fe-Male</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Date Of Birth</label>
                            <input type="date" class="form-control" name="bod" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="number" class="form-control" name="age" >
                        </div>
                    </div>
                  
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Marital Status</label>
                           <select name="marital" id="" class="form-control">
                            <option value="">Married</option>
                            <option value="">Non-Married</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">CNIC</label>
                            <input type="number" class="form-control" name="cnic">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Mobile Number</label>
                            <input type="number" class="form-control" name="number">
                        </div>
                    </div>
                  
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nationality</label>
                            <input type="text" class="form-control" name="nationality">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Domicile</label>
                           <select name="domicile" id="" class="form-control">
                            <option value="">Married</option>
                            <option value="">Non-Married</option>
                           </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tehsil</label>
                           <select name="tehsil" id="" class="form-control">
                            <option value="">Married</option>
                            <option value="">Non-Married</option>
                           </select>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <h2 class="content-header-title border-0 my-1">Previous Education of the Applicant	</h2>
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
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="level[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="intitute[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="year[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="month[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="total[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="obtain[]">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm remove_row"  type="button">x</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <button class="btn btn-success btn-sm" id="addRow" type="button"><i data-feather="plus"></i> Add Row</button>
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

<!-- users edit ends -->
@endsection



@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>

<script>
    $(document).ready(function(){
        $('#addRow').click(function(){
            let str = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="level[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="intitute[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="year[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="month[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="total[]">
                </td>
                <td>
                    <input type="text" class="form-control" name="obtain[]">
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