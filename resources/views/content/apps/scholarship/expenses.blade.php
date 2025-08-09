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

    .table:nth-child(2) td, .table:nth-child(2) th {
        padding: 0.52rem 5px !important;
        text-align: center;
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
                        <h2 class="content-header-title border-0 my-2">Monthly Educational Expenditure</h2>
                        <hr />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 mx-auto">
                        <table class="table my-2">
                            <thead>
                                <tr>
                                    <th width="400">Name</th>
                                    <th class="text-center">Per Month Education Expenditure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >Self(please include expenditure including tuition fee and loading charges)</td>
                                    <td><input type="number" class="form-control" placeholder="25000"></td>
                                </tr>
                            </tbody>
                           
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table my-2 table-bordered">
                            <thead>
                                <tr>
                                    <th>Name of earning Person</th>
                                    <th>Profession</th>
                                    <th>Financially supporting the family</th>
                                    <th>Relationship with applicant </th>
                                    <th>Gross Income (Rs.)</th>
                                    <th >Net Income(Rs.)</th>
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
                                </tr>
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
                                </tr>
                                <tr>
                                    <td>
                                        Total Monthly Income
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
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        Please include all income e.g Salary, Pension, Income from mortgage, lease, dividends, shares etc. in gross income. Please attach the Latest Salary Slip / income certificate with application Form. The profession includes Public/ Government job. Private Sector Job, Business, Farmer, labor, self employed, Other.
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="content-header-title border-0 my-1">Accommodation Expenditure</h2>
                        <hr />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Type</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Structure of House</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No of Rooms</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Size of home in (Sq.ft) (Sq. ft= length x width)</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Covered Area (Sq.ft=length x width)	</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No. of Air Conditioners</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Number of Servants</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Monthly Rent Paid	</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="" id="" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Any other house/ flat owned by the parents/ Guardian ( if yes please specify with location and size)</label>
                            <textarea name="" id="" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h2 class="content-header-title border-0 my-1">Monthly Family Expenditure</h2>
                        <hr />
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered my-2">
                            <thead>
                                <tr>
                                    <th >Detail</th>
                                    <th class="text-center">Per month amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Average Telephone bill of last Six months</td>
                                    <td><input type="text" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Average Electricity bill of last Six months</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Average Gas bill of last Six months</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Average water bill of last Six months</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Average monthly mobile bill </td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Average family educational Expenditure other than Applicant </td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Applicant Educational Expenditure </td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Average family Expenditure on kitchen food</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Average family medical Expenditure</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Accommodation Expenditure in case of rent</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Average family Misc. Expenditure</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>

                                <tr>
                                    <th class="text-center">Total Monthly Expenditure</th>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                           
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered my-2">
                            <thead>
                                <tr>
                                    <th width="500">Detail</th>
                                    <th class="text-center">Per month Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Net Reusable income (Total monthly income- Total monthly expenditure.)</td>
                                    <td><input type="number" class="form-control" placeholder="25000"></td>
                                </tr>
                            </tbody>
                           
                        </table>
                    </div>
                    <div class="col-md-12">
                        <p>If the monthly income is negative kindly explain the reasons for the gap, and the arrangements through which the differential gap is met by the family.</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h2 class="content-header-title border-0 my-1">Assets</h2>
                        <hr />
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Does the family own any Transport? </label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Does the family won any cattle?  </label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h2 class="content-header-title border-0 my-1">Other Assets</h2>
                        <hr />
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered my-2">
                            <thead>
                                <tr>
                                    <th>Other Assets</th>
                                    <th>Quantity</th>
                                    <th>Current Market Value ( Rs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Other House</td>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Business</td>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Agriculture land</td>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Bank Balance</td>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Stocks/ Prize Bond</td>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Plots(s)</td>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Any other Asset</td>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><input type="number" class="form-control" ></td>
                                    <td><input type="number" class="form-control" ></td>
                                </tr>
                            </tbody>
                           
                        </table>
                    </div>
                  
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Detail of Assets on lease (Please Specify) </label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">The admission / first semester charges paid? </label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p>Have you ever been awarded any other scholarship before? If yes please share the</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Statement of Purpose (attach separate sheet if required)</label>
                            <textarea name="" id="" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">How did you know about KPEF merit and Needs- based Scholarships Program?</label>
                            <textarea name="" id="" rows="5" class="form-control"></textarea>
                        </div>
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

{{-- <script>
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
</script> --}}


@endsection