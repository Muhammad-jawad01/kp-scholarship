<!doctype html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('assets/print/style.css') }}">
</head>

<body>

    <div class="top_header">
        <div class="image">
            <img src="{{ asset('assets/print/logo.png') }}" alt="">
        </div>
        <h4>APPLICATION FORM FOR THE AWARD OF <br />
            KHYBER PAKHTUNKHWA EDUCATION FOUNDATION <br />
            MERIT CUM-IN-AFFORDABILITY SCHOLARSHIP</h4>
    </div>
    <div class="top_header_print">
        <div class="image">
            <img src="{{ asset('assets/print/logo.png') }}" alt="">
        </div>
        <h4>APPLICATION FORM FOR THE AWARD OF <br />
            KHYBER PAKHTUNKHWA EDUCATION FOUNDATION <br />
            MERIT CUM-IN-AFFORDABILITY SCHOLARSHIP</h4>
    </div>

    <table>
        <thead>
            <tr>
                <td>
                    <div class="table_head_div"></div>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <!-- Main td div -->
                    <!-- Application -->
                    @php
                        // $user = auth()->user();
                    @endphp
                    <div class="table_section">
                        <h4 class="table_head">Applicant information</h4>
                        <table cellspacing="0">
                            <tr>
                                <th> Name</th>
                                <td>{{ $user->name }}</td>
                                <th>Father Name</th>
                                <td>{{ isset($user->father_name) ? $user->father_name : $user->guardian_name }}</td>
                            </tr>
                            <tr>
                                <th>Guardian Name</th>
                                <td>{{ isset($user->guardian_name) ? $user->guardian_name : $user->father_name }}</td>
                                <th>Gender</th>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <td>{{ $user->birth_date }}</td>
                                <th>Age</th>
                                <td>{{ $user->age }}</td>
                            </tr>
                            <tr>
                                <th>Marital Status</th>
                                <td>{{ $user->marital_status }}</td>
                                <th>CNIC</th>
                                <td>{{ $user->nic }}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{ $user->mobile_no }}</td>
                                <th>Nationality</th>
                                <td>{{ $user->nationality }}</td>
                            </tr>
                            {{-- <tr>
                                <th>Domicile</th>
                                <td>Charsadda</td>
                                <th>Tehsil</th>
                                <td>Charsadda</td>
                            </tr> --}}
                            <tr>
                                <th>Domicile</th>
                                <td> {{ $user->district->name ?? 'N/A' }}
                                </td>
                                <th>Tehsil</th>
                                <td>{{ $user->tehsil }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $user->address }}</td>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </table>

                    </div>

                    <!-- General -->
                    <div class="table_section">
                        <h4 class="table_head">General Information</h4>
                        <table cellspacing="0">
                            <tr>
                                <th>University Name</th>
                                <td width="200">{{ $user->university->name }}</td>
                                <th>Degreee</th>
                                <td>{{ $user->degree }}</td>
                            </tr>
                            <tr>
                                <th>Campus</th>
                                <td>{{ $user->campus }}</td>
                                <th>Discipline</th>
                                <td>{{ $user->discipline }}</td>
                            </tr>
                            <tr>
                                <th>Sub Discipline</th>
                                <td>{{ $user->sub_discipline }}</td>
                                <th>University Reg. No</th>
                                <td>{{ $user->university_reg_no }}</td>
                            </tr>
                            <tr>
                                <th>Program Duration</th>
                                <td>{{ $user->program_duration }}</td>
                                <th>Current Semester</th>
                                <td>{{ $user->current_semester }}</td>
                            </tr>
                        </table>

                    </div>

                    <!-- Education -->
                    <div class="table_section education">
                        <h4 class="table_head">Previous Education of the Applicant</h4>
                        <table cellspacing="0">
                            <tr>
                                <th>LEVEL</th>
                                <th>INSTITUTE</th>
                                <th>PASSING YEAR</th>
                                <th>PER MONTH KPEF</th>
                                <th>TOTAL MARKS/CGPA</th>
                                <th>OBTAINED MARKA/CGPA</th>
                            </tr>
                            @foreach ($data['user_edu'] as $edu)
                                <tr>
                                    <td>{{ $edu['level'] }}</td>
                                    <td>{{ $edu['institute_university_name'] }}</td>
                                    <td>{{ $edu['passing_year'] }}</td>
                                    <td>{{ $edu['per_month_kpef'] }}</td>
                                    <td>{{ $edu['total_marks_cgpa'] }}</td>
                                    <td>{{ $edu['obtained_marks_cgpa'] }}</td>
                                    {{-- <td>{{ $edu['currently_studying'] }}</td> --}}
                                </tr>
                            @endforeach

                        </table>

                    </div>

                    <!-- family Info -->
                    <div class="table_section">
                        <h4 class="table_head">Family information</h4>
                        <table cellspacing="0">
                            <tr>
                                <th> Father Status</th>
                                <td>
                                    {{ $data['family_info']->father_status ?? 'Not Available' }}
                                </td>

                </td>
                <th>Father CNIC</th>
                <td>{{ $data['family_info']->father_cnic ?? '' }}</td>
            </tr>
            <tr>
                <th>Profession</th>
                <td>{{ $data['family_info']->father_profession ?? '' }}</td>
                <th>Earning</th>
                <td>
                    {{ $data['family_info']->father_earning == 1 ? 'Yes' : 'No' }}
                </td>
            </tr>
            {{-- <tr>
                <th>Date Of Birth</th>
                <td>{{ $data['family_info']->father_profession ?? '' }}</td>
                <th>Age</th>
                <td>{{ $data['family_info']->father_profession ?? '' }}</td>
            </tr> --}}
            <tr>
                <th>If not Earning</th>
                <td>NO</td>
                <th>Father/Guardian</th>
                <td>{{ $data['family_info']->father_guardian ?? '' }}</td>
            </tr>
            <tr>
                <th>Address of Employer</th>
                <td>{{ $data['family_info']->employer_address ?? '' }}</td>
                <th>Father/Guardian Designation</th>
                <td>{{ $data['family_info']->father_guardian_designation ?? '' }}</td>
            </tr>
            <tr>
                <th>Financial Support other than father income</th>
                <td>{{ $data['family_info']->financial_support ?? '' }}</td>
                <th>Father/Guardian NTN Number and Tax paid</th>
                <td>{{ $data['family_info']->father_ntn_number ?? '' }}</td>
            </tr>
            <tr>
                <th>Mother Status</th>
                <td> {{ $data['family_info']->mother_status ?? 'Not Available' }}
                </td>
                <th>Mother Profession</th>
                <td> {{ $data['family_info']->mother_profession ?? 'Not Available' }}
                </td>
            </tr>
            <tr>
                <th>Professional Status</th>
                <td>{{ $data['family_info']->professional_status ?? 'Not Available' }}</td>
                <th>Parent’s Marriage Relationship</th>
                <td>{{ $data['family_info']->parent_marriage_relationship ?? 'Not Available' }}</td>
            </tr>

            <tr>
                <th>Mobile Number</th>
                <td>{{ $data['family_info']->mobile_number ?? 'Not Available' }}</td>
                <th>Telephone Number</th>
                <td>{{ $data['family_info']->telephone_number ?? 'Not Available' }}</td>
            </tr>
    </table>
    </div>

    <!-- Family Members -->
    <div class="table_section">
        <h4 class="table_head">Family Members</h4>
        <table cellspacing="0">
            <tr>
                <th>Total Family Members</th>
                <td>{{ $data['family_info']->total_family_members ?? 'Not Available' }}</td>
                <th>Dependent Family Members</th>
                <td>{{ $data['family_info']->dependent_family_members ?? 'Not Available' }}</td>
            </tr>
            <tr>
                <th>Total Earning Member(s)</th>
                <td>{{ $data['family_info']->total_earning_members ?? 'Not Available' }}</td>
                <th>Family Member(s) Studying</th>
                <td>{{ $data['family_info']->family_members_studying ?? 'Not Available' }}</td>
            </tr>
            <tr>
                <th>No. of Brother(s)</th>
                <td>{{ $data['family_info']->num_of_brothers ?? 'Not Available' }}</td>
                <th>No. of Sister(s)</th>
                <td>{{ $data['family_info']->num_of_sisters ?? 'Not Available' }}</td>
            </tr>
            <tr>
                <th>Family Income</th>
                <td>{{ $data['family_info']->family_income ?? 'Not Available' }}</td>
                <th>Income From Other Sources</th>
                <td>{{ $data['family_info']->income_from_other_sources ?? 'Not Available' }}</td>
            </tr>
        </table>

    </div>

    <!-- Monthly Educational Expenditure -->
    <div class="table_section">
        <h4 class="table_head">Monthly Educational Expenditure</h4>
        <table cellspacing="0">
            <thead>

            </thead>
            <tr>
                <th> NAME</th>
                <th>PER MONTH EDUCATION EXPENDITURE</th>
            </tr>
            <tr>
                <td>Self(please include expenditure including tuition fee and loading charges)</td>
                <td>{{ $data['expense']->per_month_edu_expenditure ?? 'Not Available' }}</td>
            </tr>

        </table>
    </div>

    <div class="table_section education">
        <table cellspacing="0">
            <thead class="table_head">
                <tr>
                    <th>NAME OF EARNING PERSON</th>
                    <th>PROFESSION</th>
                    <th>FINANCIALLY SUPPORTING THE FAMILY</th>
                    <th>RELATIONSHIP WITH APPLICANT</th>
                    <th>GROSS INCOME (RS.)</th>
                    <th>NET INCOME(RS.)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['applicant_fn_r'] as $financial)
                    <tr>
                        <td>{{ $financial->name }}</td>
                        <td>{{ $financial->profession }}</td>
                        <td>{{ $financial->financially_supporting }}</td>
                        <td>{{ $financial->relationship }}</td>
                        <td>{{ $financial->gross_income }}</td>
                        <td>{{ $financial->net_income }}</td>
                    </tr>
                @endforeach


                <tr>
                    <td>Total Monthly Income</td>
                    <td colspan="5">{{ $data['expense']->total_monthly_income ?? 'Not Available' }}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">Please include all income e.g Salary,
                        Pension, Income from
                        mortgage, lease, dividends, shares etc. in gross income.
                        Please attach the Latest Salary Slip / income certificate with application Form.
                        The profession
                        includes Public/
                        Government job. Private Sector Job, Business, Farmer, labor, self employed,
                        Other.</td>
                </tr>
            </tbody>


        </table>

    </div>



    <!-- Accommodation Expenditure -->
    <div class="table_section">
        <h4 class="table_head">Accommodation Expenditure</h4>
        <table cellspacing="0">
            <tr>
                <th>Type</th>
                <td>{{ $data['expense']->accommodation_type ?? 'Not Available' }}</td>
                <th>Structure of House</th>
                <td>{{ $data['expense']->house_structure ?? 'Not Available' }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $data['expense']->house_status ?? 'Not Available' }}</td>
                <th>No of Rooms</th>
                <td>{{ $data['expense']->num_rooms ?? 'Not Available' }}</td>
            </tr>
            <tr>
                <th>Size of home in (Sq.ft) (Sq. ft= length x width)</th>
                <td>{{ $data['expense']->home_size ?? 'Not Available' }}</td>
                <th>Covered Area (Sq.ft=length x width)</th>
                <td>{{ $data['expense']->covered_area ?? 'Not Available' }}</td>
            </tr>
            <tr>
                <th>No. of Air Conditioners</th>
                <td>{{ $data['expense']->num_air_conditioners ?? 'Not Available' }}</td>
                <th>Number of Servants</th>
                <td>{{ $data['expense']->num_servants ?? 'Not Available' }}</td>
            </tr>
            <tr>
                <th>Monthly Rent Paid</th>
                <td colspan="5">{{ $data['expense']->monthly_rent ?? 'Not Available' }}</td>

            </tr>
            <tr>
                <th>Address</th>
                <td colspan="5">{{ $data['expense']->address ?? 'Not Available' }}</td>

            </tr>
            <tr>
                <th>Any other house/ flat owned by the parents/ Guardian ( if yes please specify with
                    location and size)
                </th>
                <td colspan="5">Necessitatibus sit</td>
            </tr>
        </table>

    </div>

    <div style="page-break-after: always;"></div>

    <!-- Monthly Family Expenditure -->
    <div class="table_section">
        <h4 class="table_head" style="margin-bottom: 1px;">Monthly Family Expenditure</h4>
        <table cellspacing="0">
            <thead class="table_head">
                <tr>
                    <th>DETAIL</th>
                    <th>PER MONTH AMOUNT</th>
                    <th>DETAIL</th>
                    <th>PER MONTH AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Average Telephone bill of last Six months</td>
                    <td>{{ $data['expense']->average_telephone_bill_six_months ?? 'Not Available' }}</td>
                    <td>Average Electricity bill of last Six months</td>
                    <td>{{ $data['expense']->average_electricity_bill_six_months ?? 'Not Available' }}</td>
                </tr>
                <tr>
                    <td>Average Gas bill of last Six months</td>
                    <td>{{ $data['expense']->average_gas_bill_six_months ?? 'Not Available' }}</td>
                    <td>Average water bill of last Six months</td>
                    <td>{{ $data['expense']->average_water_bill_six_months ?? 'Not Available' }}</td>
                </tr>
                <tr>
                    <td>Average monthly mobile bill</td>
                    <td>{{ $data['expense']->average_mobile_bill_six_months ?? 'Not Available' }}</td>
                    <td>Average family educational Expenditure other than Applicant</td>
                    <td>{{ $data['expense']->average_educational_expenditure_siblings ?? 'Not Available' }}</td>
                </tr>
                <tr>
                    <td>Applicant Educational Expenditure</td>
                    <td>{{ $data['expense']->average_educational_expenditure_applicant ?? 'Not Available' }}</td>
                    <td>Average family Expenditure on kitchen food</td>
                    <td>{{ $data['expense']->average_kitchen_expenditure ?? 'Not Available' }}</td>
                </tr>
                <tr>
                    <td>Average family medical Expenditure</td>
                    <td>{{ $data['expense']->average_medical_expenditure ?? 'Not Available' }}</td>
                    <td>Accommodation Expenditure in case of rent</td>
                    <td>{{ $data['expense']->accommodation_expenditure_case_rent ?? 'Not Available' }}</td>
                </tr>
                <tr>
                    <td>Average family Misc. Expenditure</td>
                    <td colspan="5">{{ $data['expense']->average_family_misc_expenditure ?? 'Not Available' }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" style="text-align: center;">Total Monthly Expenditure
                    <td colspan="2" style="text-align: center;">
                        {{ $data['expense']->total_monthly_expenditure ?? 'Not Available' }}</td>
                    </th>
                </tr>
            </tfoot>

        </table>

    </div>



    <!-- Monthly Educational Expenditure -->
    <div class="table_section">
        <!-- <h4 class="table_head">Monthly Educational Expenditure</h4> -->
        <table cellspacing="0">
            <thead class="table_head">
                <tr>
                    <th>DETAIL</th>
                    <th>PER MONTH AMOUNT</th>
                </tr>
            </thead>
            <tr>
                <td>Net Reusable income (Total monthly income- Total monthly expenditure.)</td>
                <td>{{ $data['expense']->total_monthly_income ?? 'Not Available' }}</td>

            </tr>
            <tr>
                <td colspan="6">If the monthly income is negative kindly explain the reasons for the
                    gap, and the arrangements through which the differential gap is met by the family.
                </td>
            </tr>

        </table>
    </div>

    <!-- Assets -->
    <div class="table_section">
        <h4 class="table_head">Assets</h4>
        <table cellspacing="0">


            <tr>
                <th>Does the family own any Transport?</th>
                <td>{{ $data['expense']->family_own_transport ?? 'Not Available' }}</td>
                <th>Does the family won any cattle?</th>
                <td>{{ $data['expense']->family_own_cattle ?? 'Not Available' }}</td>
            </tr>


        </table>
    </div>


    <!-- Other Assets -->
    <div class="table_section">
        <h4 class="table_head" style="margin-bottom: 2px;">Other Assets</h4>
        <table cellspacing="0">
            <thead class="table_head">
                <tr>
                    <th>OTHER ASSETS</th>
                    <th>QUANTITY</th>
                    <th>CURRENT MARKET VALUE ( RS)</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data['scholarship_assets'] as $assets)
                    <tr>

                        <td>{{ $assets->type ?? 'Not Available' }}</td>
                        <td>{{ $assets->quantity ?? 'Not Available' }}</td>
                        <td>{{ $assets->current_market_value ?? 'Not Available' }}</td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <th>Other House</th>
                    <td>402</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <th>Agriculture land</th>
                    <td>402</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <th>Bank Balance</th>
                    <td>402</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <th>Stocks/ Prize Bond</th>
                    <td>402</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <th>Any other Asset</th>
                    <td>402</td>
                    <td>Yes</td>
                </tr> --}}

            </tbody>


        </table>



    </div>

    <!-- Other Assets -->
    <div class="table_section">
        <table cellspacing="0">
            <tbody>
                <tr>
                    <th>Detail of Assets on lease (Please Specify)</th>
                    <td> {{ $data['expense']->detail_assets_lease ?? 'Not Available' }}</td>
                    <th>The admission / first semester charges paid?</th>
                    <th> {{ $data['expense']->admission_first_semester_charges ?? 'Not Available' }}</td>
                </tr>
                <tr>
                    <td colspan="5">Have you ever been awarded any other scholarship before? If yes
                        please share the</td>
                </tr>
                <tr>
                    <th>Statement of Purpose (attach separate sheet if required)</th>
                    <td colspan="4"> {{ $data['expense']->statement_purpose ?? 'Not Available' }}
                    </td>

                </tr>
                <tr>
                    <th>How did you know about KPEF merit and Needs- based Scholarships Program?</th>
                    <td colspan="4">
                        {{ $data['expense']->KPEF_merit_Needsbased_scholarships_program ?? 'Not Available' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>





    <div style="page-break-after: always;"></div>

    <!-- Application form -->
    <div class="table_section">
        <h4 class="table_head" style="margin-bottom: 1px;">Application form</h4>
        <table cellspacing="0">
            <thead class="table_head">
                <tr>
                    <th>SUPPORTING DOCUMENTS</th>
                    <th>UPLOAD FILE</th>
                    <th>SUPPORTING DOCUMENTS</th>
                    <th>UPLOAD FILE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Copy of Applicant CNIC/B.FORM</td>
                    <td>
                        {{ $mediaArray['applicant_nic'] && $mediaArray['applicant_nic']->isNotEmpty() ? 'Yes' : 'No' }}

                    </td>
                    <td>Copy of CNIC(Father, Mother/Guardian)</td>
                    <td>
                        {{-- {{ $mediaArray['p_nic']->count() > 0 ? 'Yes' : 'No' }} --}}
                        {{ $mediaArray['p_nic'] && $mediaArray['p_nic']->isNotEmpty() ? 'Yes' : 'No' }}

                    </td>
                </tr>
                <tr>
                    <td>Salary Slip/Income Certificate (Father/Guardian, Mother)</td>
                    <td>
                        {{ $mediaArray['income_slip'] && $mediaArray['income_slip']->isNotEmpty() ? 'Yes' : 'No' }}

                        {{-- {{ $mediaArray['income_slip']->count() > 0 ? 'Yes' : 'No' }} --}}
                    </td>
                    <td>Copies of last six-month utility bills (Electricity Gas, Telephone, water) (if
                        applicable)</td>
                    <td>
                        {{ $mediaArray['bills'] && $mediaArray['bills']->isNotEmpty() ? 'Yes' : 'No' }}

                        {{-- {{ $mediaArray['bills']->count() > 0 ? 'Yes' : 'No' }} --}}
                    </td>
                </tr>
                <tr>
                    <td>Copy of Rent Agreement in case of Rented House</td>
                    <td>
                        {{ $mediaArray['agreement_rent'] && $mediaArray['agreement_rent']->isNotEmpty() ? 'Yes' : 'No' }}

                        {{-- {{ $mediaArray['agreement_rent']->count() > 0 ? 'Yes' : 'No' }} --}}
                    </td>
                    <td>Copies of Last Fee Receipts of Applicant and Siblings (if applicable )</td>
                    <td>
                        {{ $mediaArray['last_fee'] && $mediaArray['last_fee']->isNotEmpty() ? 'Yes' : 'No' }}

                        {{-- {{ $mediaArray['last_fee']->count() > 0 ? 'Yes' : 'No' }} --}}
                    </td>
                </tr>
                <tr>
                    <td>Copies of Medical Bills/expenditure related documents (if applicable )</td>
                    <td>
                        {{ $mediaArray['medical_bills'] && $mediaArray['medical_bills']->isNotEmpty() ? 'Yes' : 'No' }}

                        {{-- {{ $mediaArray['medical_bills']->count() > 0 ? 'Yes' : 'No' }} --}}
                    </td>
                    <td>01 Passport size Photograph of Applicant</td>
                    <td>
                        {{ $mediaArray['applicant_img'] && $mediaArray['applicant_img']->isNotEmpty() ? 'Yes' : 'No' }}

                        {{-- {{ $mediaArray['applicant_img']->count() > 0 ? 'Yes' : 'No' }} --}}
                    </td>
                </tr>

            </tbody>

        </table>

    </div>



    <!-- Application form -->
    <div class="table_section">
        <h4 class="table_head">Undertaking</h4>
        <table cellspacing="0">
            <tr>
                <td> The information given in this application is true to the best of my knowledge and I
                    understand any incorrect information will result in the cancellation of this
                    application. If any information given in this application is found incorrect or
                    false, after grant of financial assistance. The institute will stop further
                    assistance and the student will have to refund all payment received and or penalty
                    equal to total scholarship amount.</td>
            </tr>
            <tr>
                <td>KPEF and Institution reserve the right to use information given in this form for
                    verification and other purposes.</td>
            </tr>
        </table>

    </div>

    <!-- Application form -->
    <div class="table_section">
        <table cellspacing="0">
            <tr>
                <th>Date</th>
                <td> {{ $data['scholarship_documents']->father_guardian_signature ?? 'Not Available' }}
                </td>
                <th>Date</th>
                <td> {{ $data['scholarship_documents']->applicant_signature ?? 'Not Available' }}
                </td>
            </tr>

        </table>

    </div>


    <!-- Application form -->
    <div class="table_section2">
        <table cellspacing="0">
            <tr>
                <th style="padding: 20px 5px">Father/ Guardian Signature </th>
                <td>________________________________</td>
                <th>Applicant Signature</th>
                <td>________________________________</td>
            </tr>

        </table>

    </div>

    <!-- Application form -->
    <div class="table_section">
        <h4 class="table_head">For Official Use</h4>
        <table cellspacing="0">
            <tr>
                <th>Application Form Complete with supporting documents </th>
                <td></td>
                <th>Application Case Review Date</th>
                <td></td>
            </tr>

            <tr>
                <th>The notices furnished to the applicant for furnishing of required documentation
                </th>
                <td></td>
                <th> Signature and official stamp of the head of the institute Date</th>
                <td></td>
            </tr>

        </table>

    </div>

    <!-- Main td div ./ -->
    </td>
    </tr>
    </tbody>
    <tfoot>
        <tr>
            <td>
                <div class="table_foot_div"></div>
            </td>
        </tr>
    </tfoot>
    </table>


    <section>
        <div class="row">
            <h5> Passport size Photograph of Applicant
            </h5>
            {{ $data['scholarship_documents']->getMedia('applicant_img')->first() }}<br>

            <h5>Copy of Applicant CNIC/B.FORM</h5>
            {{ $data['scholarship_documents']->getMedia('applicant_nic')->first() }}<br>

            <h5>Copy of CNIC(Father, Mother/Guardian)
            </h5>
            {{ $data['scholarship_documents']->getMedia('p_nic')->first() }}<br>


            <h5>Salary Slip/Income Certificate (Father/Guardian, Mother)
            </h5>
            {{ $data['scholarship_documents']->getMedia('income_slip')->first() }}<br>


            <h5>Copies of last six-month utility bills (Electricity Gas, Telephone, water) (if applicable)
            </h5>
            {{ $data['scholarship_documents']->getMedia('bills')->first() }}<br>


            <h5>
                Copy of Rent Agreement in case of Rented House

            </h5>
            {{ $data['scholarship_documents']->getMedia('agreement_rent')->first() }}<br>



            <h5>Copies of Last Fee Receipts of Applicant and Siblings (if applicable )
            </h5>
            {{ $data['scholarship_documents']->getMedia('last_fee')->first() }} <br>


            <h5>Copies of Medical Bills/expenditure related documents (if applicable )
            </h5>
            {{ $data['scholarship_documents']->getMedia('medical_bills')->first() }}<br>

        </div>
    </section>


</body>

</html>
