@extends('layouts/scholarshipLayout')

@section('title', 'KP Scholarship Apply')

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

    .table:nth-child(2) td,
    .table:nth-child(2) th {
        padding: 0.52rem 5px !important;
        text-align: center;
    }
</style>
@endsection

@section('content')
<!-- users edit start -->
<div class="card">
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <!-- {{ csrf_field() }} -->
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
                    <div class="col-md-12 mx-auto">
                        <table class="table my-2">
                            <thead>
                                <tr>
                                    <th width="400">Name</th>
                                    <th class="text-center">Per Month Education Expenditure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Self(please include expenditure including tuition fee and loading charges)</td>
                                    <td><input type="number" class="form-control" name="per_month_edu_expenditure"
                                            value="{{ $model->per_month_edu_expenditure ?? '' }}" placeholder="25000">
                                    </td>
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
                                    <th>Net Income(Rs.)</th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">

                                @if (!empty($applicant_fn_r))

                                @foreach ($applicant_fn_r as $data)
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="name[]"
                                            value="{{ $data->name ?? '' }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="profession[]"
                                            value="{{ $data->profession ?? '' }}">
                                    </td>
                                    <td>
                                        {{-- <input type="text" class="form-control" name="financially_supporting[]"> --}}
                                        {!! Form::select(
                                        'financially_supporting[]',
                                        \Helper::financially_supporting(),
                                        $data->financially_supporting ?? '',
                                        ['class' => 'form-control'],
                                        ) !!}

                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="relationship[]"
                                            value="{{ $data->relationship ?? '' }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="gross_income[]"
                                            value="{{ $data->gross_income ?? '' }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="net_income[]"
                                            value="{{ $data->net_income ?? '' }}">
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                @php
                                $i = 1;
                                @endphp
                                @for ($i; $i <= 2; $i++) <tr>
                                    <td>
                                        <input type="text" class="form-control" name="name[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="profession[]">
                                    </td>
                                    <td>
                                        {{-- <input type="text" class="form-control" name="financially_supporting[]"> --}}
                                        {!! Form::select('financially_supporting[]', \Helper::financially_supporting(),
                                        null, [
                                        'class' => 'form-control',
                                        ]) !!}

                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="relationship[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="gross_income[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="net_income[]">
                                    </td>
                                    </tr>
                                    @endfor
                                    @endif


                                    <tr>
                                        <td>
                                            Total Monthly Income
                                        </td>
                                        <td colspan="5">

                                            <input type="number" class="form-control" name="total_monthly_income"
                                                value="{{ $model->total_monthly_income ?? '' }}">
                                        </td>
                                    </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        Please include all income e.g Salary, Pension, Income from mortgage, lease,
                                        dividends, shares etc. in gross income. Please attach the Latest Salary Slip /
                                        income certificate with application Form. The profession includes Public/
                                        Government job. Private Sector Job, Business, Farmer, labor, self employed,
                                        Other.
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

                            {!! Form::select('accommodation_type', \Helper::accommodation_type(),
                            $model->accommodation_type ?? '', [
                            'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Structure of House</label>
                            {!! Form::select('house_structure', \Helper::house_structure(), $model->house_structure ??
                            '', [
                            'class' => 'form-control',
                            ]) !!}

                            {{-- <input type="text" class="form-control" name="name" > --}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Status</label>
                            {!! Form::select('house_status', \Helper::house_status(), $model->house_status ?? '', [
                            'class' => 'form-control',
                            ]) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No of Rooms</label>
                            <input type="number" class="form-control" name="num_rooms"
                                value="{{ $model->num_rooms ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Size of home in (Sq.ft) (Sq. ft= length x width)</label>
                            <input type="text" class="form-control" name="home_size"
                                value="{{ $model->home_size ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Covered Area (Sq.ft=length x width) </label>
                            <input type="text" class="form-control" name="covered_area"
                                value="{{ $model->covered_area ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">No. of Air Conditioners</label>
                            <input type="number" class="form-control" name="num_air_conditioners"
                                value="{{ $model->num_air_conditioners ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Number of Servants</label>
                            <input type="number" class="form-control" name="num_servants"
                                value="{{ $model->num_servants ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Monthly Rent Paid </label>
                            <input type="number" class="form-control" name="monthly_rent"
                                value="{{ $model->monthly_rent ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" rows="5"
                                class="form-control">{{ $model->address ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Any other house/ flat owned by the parents/ Guardian ( if yes please
                                specify with location and size)</label>
                            <textarea name="other_house_details" id="" rows="5"
                                class="form-control"> {{ $model->other_house_details ?? '' }}</textarea>
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
                                    <th>Detail</th>
                                    <th class="text-center">Per month amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Average Telephone bill of last Six months</td>
                                    <td><input type="text" class="form-control" name="average_telephone_bill_six_months"
                                            value="{{ $model->average_telephone_bill_six_months ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Average Electricity bill of last Six months</td>
                                    <td><input type="text" class="form-control"
                                            name="average_electricity_bill_six_months"
                                            value="{{ $model->average_electricity_bill_six_months ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Average Gas bill of last Six months</td>
                                    <td><input type="text" class="form-control" name="average_gas_bill_six_months"
                                            value="{{ $model->average_gas_bill_six_months ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Average water bill of last Six months</td>
                                    <td><input type="text" class="form-control" name="average_water_bill_six_months"
                                            value="{{ $model->average_water_bill_six_months ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Average monthly mobile bill </td>
                                    <td><input type="text" class="form-control" name="average_mobile_bill_six_months"
                                            value="{{ $model->average_mobile_bill_six_months ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Average family educational Expenditure other than Applicant </td>
                                    <td><input type="text" class="form-control"
                                            name="average_educational_expenditure_siblings"
                                            value="{{ $model->average_educational_expenditure_siblings ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Applicant Educational Expenditure </td>
                                    <td><input type="text" class="form-control"
                                            name="average_educational_expenditure_applicant"
                                            value="{{ $model->average_educational_expenditure_applicant ?? '' }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Average family Expenditure on kitchen food</td>
                                    <td><input type="text" class="form-control" name="average_kitchen_expenditure"
                                            value="{{ $model->average_kitchen_expenditure ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Average family medical Expenditure</td>
                                    <td><input type="text" class="form-control" name="average_medical_expenditure"
                                            value="{{ $model->average_medical_expenditure ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Accommodation Expenditure in case of rent</td>
                                    <td><input type="text" class="form-control"
                                            name="accommodation_expenditure_case_rent"
                                            value="{{ $model->accommodation_expenditure_case_rent ?? '' }}"></td>
                                </tr>
                                <tr>
                                    <td>Average family Misc. Expenditure</td>
                                    <td><input type="text" class="form-control" name="average_family_misc_expenditure"
                                            value="{{ $model->average_family_misc_expenditure ?? '' }}"></td>
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
                                    <td>Net Reusable income (Total monthly income (Subtract -) Total monthly
                                        expenditure.)</td>
                                    <td><input type="number" class="form-control" name="per_month_disposable_income"
                                            placeholder="25000" value="{{ $model->per_month_disposable_income ?? '' }}">
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="col-md-12">
                        <p>If the monthly income is negative kindly explain the reasons for the gap, and the
                            arrangements through which the differential gap is met by the family.</p>
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
                            {!! Form::select('family_own_transport', \Helper::family_own_transport(),
                            $model->family_own_transport ?? '', [
                            'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Does the family won any cattle? </label>
                            {!! Form::select('family_own_cattle', \Helper::family_own_cattle(),
                            $model->family_own_cattle ?? '', [
                            'class' => 'form-control',
                            ]) !!}
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
                                @if ($scholarship_assets->isNotEmpty())
                                @foreach ($scholarship_assets as $assets)
                                <tr>
                                    <td>{{ $assets->type ?? '' }}<input type="hidden" class="form-control"
                                            value="{{ $assets->type ?? '' }}" name="type[]"></td>
                                    <td><input type="number" class="form-control" value="{{ $assets->quantity ?? '' }}"
                                            name="quantity[]"></td>
                                    <td><input type="number" class="form-control"
                                            value="{{ $assets->current_market_value ?? '' }}" name="market_value[]">
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                                @if ($scholarship_assets->isEmpty())
                                <tr>
                                    <td>Other House <input type="hidden" class="form-control" value="Other House"
                                            name="type[]"></td>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <td>Business <input type="hidden" class="form-control" value="Business"
                                            name="type[]"></td>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <td>Agriculture land <input type="hidden" class="form-control"
                                            value="Agriculture land" name="type[]"></td>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <td>Bank Balance <input type="hidden" class="form-control" value="Bank Balance"
                                            name="type[]"></td>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <td>Stocks/ Prize Bond <input type="hidden" class="form-control"
                                            value="Stocks/ Prize Bond" name="type[]"></td>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <td>Plots(s) <input type="hidden" class="form-control" value="Plots(s)"
                                            name="type[]"></td>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <td>Any other Asset <input type="hidden" class="form-control"
                                            value="Any other Asset" name="type[]"></td>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <th>Total <input type="hidden" class="form-control" value="Total" name="type[]">
                                    </th>
                                    <td><input type="number" min="0" class="form-control" name="quantity[]" value="0">
                                    </td>
                                    <td><input type="number" min="0" class="form-control" name="market_value[]"
                                            value="0"></td>
                                </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Detail of Assets on lease (Please Specify) </label>
                            <input type="text" class="form-control" name="detail_assets_lease"
                                value="{{ $model->detail_assets_lease ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">The admission / first semester charges paid? </label>
                            <input type="text" class="form-control" name="admission_first_semester_charges"
                                value="{{ $model->admission_first_semester_charges ?? '' }}">
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
                            <textarea name="statement_purpose" id="" rows="5"
                                class="form-control">{{ $model->statement_purpose ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">How did you know about KPEF merit and Needs- based Scholarships
                                Program?</label>
                            <textarea name="KPEF_merit_Needsbased_scholarships_program" id="" rows="5"
                                class="form-control">{{ $model->KPEF_merit_Needsbased_scholarships_program ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mx-auto my-3">
                        <button class="btn btn-solid-green  btn-block">Submit</button>
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
