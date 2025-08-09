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

        .table th {
            text-align: center;

        }
    </style>
@endsection

@section('content')
    <!-- users edit start -->
    <div class="card">
        <form action="{{ route('documents.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5" id="app">
                <div class="col-md-11 mx-auto">
                    {{-- mian form --}}

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0">Supporting Documents to be submitted to KPEF
                                Scholarship Scheme</h2>
                            <h5 class="content-header-title border-0">Application form</h5>
                            <hr />
                        </div>
                    </div>
                    {{-- <div class="form-group" id="app"> --}}


                    {{-- </div> --}}


                    <div class="row">
                        <div class="col-md-12">
                            <table class="table my-2 table-bordered">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>SUPPORTING DOCUMENTS</th>
                                        <th>Upload File</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    <tr>
                                        <th>1</th>
                                        <td>Copy of Applicant CNIC/B.FORM</td>
                                        <td>

                                            {{ BsForm::media('applicant_nic')->collection('applicant_nic')->files($model ? $model->getMediaResource('applicant_nic') : []) }}
                                            {{-- {{ BsForm::media('p_nic')->collection('p_nic')->files() }} --}}


                                        </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Copy of CNIC(Father, Mother/Guardian)</td>
                                        <td>{{ BsForm::media('p_nic')->collection('p_nic')->files($model ? $model->getMediaResource('p_nic') : []) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Salary Slip/Income Certificate (Father/Guardian, Mother)</td>
                                        <td>{{ BsForm::media('income_slip')->collection('income_slip')->files($model ? $model->getMediaResource('income_slip') : []) }}
                                        </td>
                                        ~
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>Copies of last six-month utility bills (Electricity Gas, Telephone, water)
                                            (if applicable) </td>
                                        <td>{{ BsForm::media('bills')->collection('bills')->files($model ? $model->getMediaResource('bills') : []) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>5</th>
                                        <td>Copy of Rent Agreement in case of Rented House</td>
                                        <td>{{ BsForm::media('agreement_rent')->collection('agreement_rent')->files($model ? $model->getMediaResource('agreement_rent') : []) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>6</th>
                                        <td>Copies of Last Fee Receipts of Applicant and Siblings
                                            (if applicable )</td>
                                        <td>{{ BsForm::media('last_fee')->collection('last_fee')->files($model ? $model->getMediaResource('last_fee') : []) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>7</th>
                                        <td>Copies of Medical Bills/expenditure related documents
                                            (if applicable )</td>
                                        <td>{{ BsForm::media('medical_bills')->collection('medical_bills')->files($model ? $model->getMediaResource('medical_bills') : []) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>8</th>
                                        <td>01 Passport size Photograph of Applicant </td>
                                        <td>{{ BsForm::media('applicant_img')->collection('applicant_img')->files($model ? $model->getMediaResource('applicant_img') : []) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>9</th>
                                        <td> Add all educational documents in One PDF </td>
                                        <td>{{ BsForm::media('applicant_edu_doc')->collection('applicant_edu_doc')->files($model ? $model->getMediaResource('applicant_edu_doc') : []) }}
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0 my-1">Undertaking</h2>
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item">1. The information given in this application is true to the best
                                    of my knowledge and I understand any incorrect information will result in the
                                    cancellation of this application. If any information given in this application is found
                                    incorrect or false, after grant of financial assistance. The institute will stop further
                                    assistance and the student will have to refund all payment received and or penalty equal
                                    to total scholarship amount.</li>
                                <li class="list-group-item">2. KPEF and Institution reserve the right to use information
                                    given in this form for verification and other purposes.</li>
                            </ul>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" name="father_guardian_signature"
                                    value="{{ $model->father_guardian_signature ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                {{-- <label>please Upload the Digital Signature of Father/ Guardian </label>
                            {{ BsForm::image('father_guardian_signature')->collection('father_guardian_signature')->files() }} --}}

                                <label for="">Father/ Guardian Signature
                                    ________________________________________</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" name="applicant_signature"
                                    value="{{ $model->applicant_signature ?? '' }}">

                            </div>
                            <div class="form-group mt-3">
                                {{-- <label>please Upload the Digital Signature of Applicant </label>
                            {{ BsForm::image('applicant_signature')->collection('applicant_signature')->files() }} --}}

                                <label for="">Applicant Signature ________________________________________</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                @if ($model)
                                    <input type="checkbox" class=" " id="myCheckbox"name="terms_conditions"
                                        value="{{ $model->terms_conditions ?? '' }}"
                                        {{ $model->terms_conditions == true ? 'checked' : '' }}>
                                    <label> I agree to the Terms and Conditions</label>
                                @else
                                    <input type="checkbox" class=" " id="myCheckbox"name="terms_conditions">
                                    <label> I agree to the Terms and Conditions</label>
                                @endif

                            </div>



                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="content-header-title border-0 my-2">For Official Use</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Application Form Complete with supporting documents</td>
                                        <td width="200"></td>
                                        <td>Application Case Review Date</td>
                                        <td width="200"></td>
                                    </tr>

                                    <tr>
                                        <td>The notices furnished to the applicant for furnishing of required documentation
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Signature of the Focal Person Date</td>
                                        <td></td>
                                    </tr>
                                </tbody>
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

<style>
    .uploader-w-32[data-v-597f7c1e] {
        width: 4rem !important;
    }

    .uploader-h-32[data-v-597f7c1e] {
        height: 4rem !important;
    }

    .uploader-w-12[data-v-597f7c1e] {
        width: 2rem !important;
    }

    .uploader-h-12[data-v-597f7c1e] {
        width: 2rem !important;
    }
</style>

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-slide-create.js')) }}"></script>
@endsection
