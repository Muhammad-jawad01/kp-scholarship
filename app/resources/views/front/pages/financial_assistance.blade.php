@extends('front/layouts/layout')

@section('title', 'Financial Assistance')
@section('content')
    <x-inner-page-header page='Financial Assistance' slug='financial-assistance' />
    <style>
        .toph2 {
            text-align: center;
            font-weight: bold;
            color: #125f69;
            font-size: 40px !important;
        }

        .subP {
            color: #125f69;
            font-family: Calibri, sans-serif;
            font-size: 11pt;
            text-align: center
        }

        .ptitle {
            color: #125f69;
            font-family: Calibri, sans-serif;
            text-align: center;
            font-size: 18px;
        }

        ol[type="I"] li::marker {
            font-weight: bold;
            list-style-type: upper-roman;

        }

        ol li {
            margin-top: 10px !important;
            margin-bottom: 10px !important;

        }
    </style>
    <section class=" mt-5">

        <div class="custom-container">
            <div class="section">
                <div class="container">

                    <div class="col-md-12 mb-4">
                        <h2 class="toph2"><span class="coloured">District Education Foundation Advisory Committee</span></h2>

                        {{-- <p class="subP"><u><span><span><strong>There shall be constituted in win each district a committee
                                            to be known as the District Education Foundation Advisory Committee of the
                                            District concerned, hereinafter referred to as
                                            “DEFAC”</strong></span></span></u></p> --}}

                        <p>&nbsp;</p>

                        <h2 class="ptitle"><strong><span>There shall be constituted in win each district a committee
                                    to be known as the District Education Foundation Advisory Committee of the
                                    District concerned, hereinafter referred to as
                                    “DEFAC”</span></strong></h2>
                        <p>&nbsp;</p>

                        <h5 class="ptitle"><strong><span>
                                    “DEFAC” shall consist of the following:</span></strong>
                        </h5>
                        <ol type="I">
                            <li>District Coordinator Officer of the District concerned <strong>Chairperson</strong>
                            </li>
                            <li>Executive District Officer (Education) of the District concerned <strong>
                                    Member/Secretary</strong>
                            </li>
                            <li>Nominee of the Chairman, preferably a prominent educationist <strong> Member</strong>
                            </li>
                            <li>A District based representative of Director Education Colleges, NWFP <strong>
                                    Member</strong>
                            </li>
                            <li>A representative of the private education sector to be nominated by District Nazim <strong>
                                    Member</strong>
                            </li>
                            <li>District Revenue Officer (concerned)<strong>
                                    Member</strong>
                            </li>
                            <li>EDO Works and Services (concerned)<strong>
                                    Member</strong>
                            </li>
                            <li>Representative of Foundation <strong>
                                    Member</strong>
                            </li>
                        </ol>
                        <ol type="I">

                            <h5 class="ptitle"><strong><span>
                                        Function of the District Education Foundation Advisory Committee shall be as
                                        under</span></strong>
                            </h5>

                            <li>
                                To inspect and monitor the project for ascertaining proper utilization of funds and submit a
                                report in respect thereof to the FEF recommending release or withholding of financial
                                assistance.
                            </li>
                            <li>
                                To verify any complaint made by the Managing Director regarding misuse of funds or default
                                on part of the loanee.
                            </li>
                            <li>
                                On receipt of application DEFAC shall cause to inspect the location of the proposed
                                institutions in order to ensure viability of the proposed project and its genuineness and
                                credibility including implementation capacity of the application and forward a report,
                                recommending the proposal or otherwise, to the Managing Director, who shall place the same
                                before the Board.
                            </li>
                            <li>
                                The Chairman of DEFAC shall be designated as “District Education Foundation Officer”
                                hereinafter referred to as “DEFO”
                            </li>
                        </ol>
                        <ol type="I">

                            <h5 class="ptitle"><strong><span>PART-III CONDITIONS FOR PROVISIONS OF LOAN AND LEASE OF
                                        LAND</span></strong>
                            </h5>

                            <li>
                                The Foundation may provide assistance in the shape of loan for the purpose of encouraging
                                individuals and non-government organizations for establishing and operation of Educational
                                Institutions on an agreed pattern basis in the province.

                            </li>
                            <li>
                                The assistance shall be provided to individuals and NGOs for all or any of the purposes
                                mentioned in section 13 of the Act.

                            </li>
                            <li>
                                In order to qualify for assistance, educational Institutions being run by individual or NGOs
                                shall have to be registered under the North West Frontier Province (Registeration of private
                                educational institutions) rules, and shall abide by the provisions of any law for the time
                                being in force, these rules and the instructions by the Board from time to time.

                            </li>
                            <li>
                                The Institutions shall be recognized by or affiliated or registered with the Directorate
                                of Education having jurisdiction to the institution, or Board of Intermediate and Secondary
                                Educaiton, Board of Technical Education or the University, as the case may be.
                            </li>
                            <li>
                                The individuals or the NGOs shall provide bank guarantee or shall mortgage adequate property
                                in favour of the Foundation under the relevant procedure.

                            </li>
                            <li>
                                The applicant shall have to submit a project proposal on the prescribed application form
                                alongwith a rough cost estimate of the construction component duly authenticated by a
                                technical expert.

                            </li>
                            <li>
                                The individuals or the NGOs shall maintain accounts of income in respect of their
                                institutions and while applying for loan and shall submit proof of the income and
                                expenditures duly audited by Chartered Accountant

                            </li>
                            <li>
                                <ul>
                                    <li>
                                        The Foundation may ordinarily sanction loan for different categories of institutions
                                        not exceeding Rs. 10 Million
                                    <li>
                                        The foundation may relax in special cases the maximum ceiling as specified above for
                                        areas where the cost of land/construction/services may be high e.g. in the urban
                                        areas etc.
                                    </li>

                                </ul>

                            </li>
                            <li>
                                The premises of the institution shall be hygienic, and consists of well ventilated
                                suitable class-rooms laboratories, workshops (if required for the instructional
                                program) and shall have suitable accommodation for students, office, etc.

                            </li>
                            <li>
                                The institution shall have adequate and suitable furniture and equipments.


                            </li>
                            <li>
                                The staff engaged in the institution shall be properly qualified as per standard
                                laid down by Government.

                            </li>
                            <li>
                                The administration, discipline and academic tone of the institution are satisfactory;
                                the instruction imparted is up to the standard as judged from the methods of teaching and
                                results and is also in accordance with the prescribed curricula.

                            </li>
                            <li>
                                The institution shall provide reasonable facilities for extra curricular and
                                recreational activities to the students.

                            </li>
                            <li>
                                Plot or land shall ordinarily be 12 Kanals for setting up the educational institution,
                                however in congested urban area where land is not available minimum three kanals is required
                                for establishment of educational institutions.

                            </li>
                            <li>The fees and funds levied and concessions allowed are reasonable.
                            </li>
                            <li> The institutions shall keep the following record and register:-

                                <ol type="a">
                                    <li>Admission and Withdawal Register.</li>
                                    <li> Attendance Register for Students and Teachers.
                                    </li>
                                    <li>Cash Book
                                    </li>
                                    <li>Acquittance Role.</li>
                                    <li>Log Book</li>

                                    <li>Stock Register</li>
                                    <li>Examination Register</li>
                                    <li>Statistical Register
                                    </li>
                                    <li>Correspondence Register</li>
                                    <li>Personal File of Staff
                                    </li>
                                    <li>Annual Schools Census Report</li>

                                    </ul>
                            </li>


                        </ol>

                        <h2 class="ptitle"><strong>Loan:</strong></h2>


                        <ol type="I">
                            <li>Loan shall be allowed to individuals and NGOs to meet partially the Expenditure
                                incurred on:
                                <ol type="a">
                                    <li>Construction or extension of building
                                    </li>
                                    <li> Purchase of Land for setting up the educational institution
                                    </li>
                                    <li> Purchase of equipment, machinery, furniture, books, laboratory materials and other
                                        educational materials.
                                    </li>
                                    <li> Any other project assigned or taken up by an individual and NGO for the fulfillment
                                        of
                                        any of the functions of the Foundation as enumerated in sub-clauses
                                        (e) to (g) of
                                        Section 13
                                        of the Act.</li>

                                </ol>
                            </li>
                            <li>Loan may also be advanced in kind for all or any of the purposes mentioned in sub rule
                            </li>
                            <li>
                                The Foundation after satisfying itself will sanction loan on the recommendation of
                                DEFAC.
                            </li>
                        </ol>


                        <h2 class="ptitle"><strong> The loan for the construction of building will be released in three
                                equal Installments as under:-:</strong></h2>


                        <ol type="I">
                            <li>
                                <ol type="a">
                                    <li>Ist installment on completion of plinth level
                                    </li>
                                    <li> 2nd installment On completion of building upto roof level
                                    </li>
                                    <li> 3rd installment On completion of the roof. </li>

                                </ol>
                            </li>
                            <li>Loan for other specified purposes may be released in lump sum.</li>
                            <li>
                                The loan shall be utilized for the purpose for which it is sanctioned and, in case, any
                                individual or NGO is found utilizing the amount of loan for a purpose other than the purpose
                                for which it was sanctioned, the unspent amount of loan shall be withdrawn, further advances
                                shall be stopped and the amount of loan already utilized shall be recovered in the manner
                                provided for in the agreement, if any, executed under section 14.1 or as arrears of land
                                revenue section 14.3 of the Act, as the case may be.
                            </li>
                        </ol>
                        <h2 class="ptitle"><strong> PROCEDURE FOR APPLICATION FOR AWARD OF LOAN</strong></h2>


                        <ol type="I">
                            <li>An application for the sanction of loan shall be made to the Managing Director through the
                                DEFAC in the prescribed form.</li>
                            <li> No application under sub-rule (1) shall be entertained unless it is supported by the
                                documents required within the meanings of sub rules (1) to (4) or rule 5 and the following
                                documents:-
                                <ol type="a">
                                    <li>Proof of ownership or lease of land (if available)
                                    </li>
                                    <li>Class-wise enrollment of the institution.
                                    </li>
                                    <li> Rates of fee charged.
                                    </li>
                                    <li> Details of Staff with their qualifications and enrollments.
                                    </li>
                                    <li> List of management committee or managers(s) or list of trustees.
                                    </li>
                                    <li>Details of the existing or proposed facilities of the institution like building,
                                        furniture, equipment, library etc.
                                    </li>
                                    <li>Statement of accounts of the institution, duly audited as the Foundation may
                                        require</li>
                                    <li>
                                        Any other document/information required by the Foundation.
                                    </li>


                                </ol>
                            </li>

                        </ol>
                        <h2 class="ptitle"><strong> DEFO</strong></h2>


                        <ol type="I">

                            <li>On recipient of application under rule 10, the DEFO shall cause to inspect the institution
                                or
                                location of the proposed institution, as the case may be, in order to ensure the viability
                                including the implementation capability of the applicant and forward his report,
                                recommending
                                the proposal or otherwise to Managing Director</li>
                            <li> The Managing Director shall consider the recommendations of the DEFO and pass such orders
                                as it deem appropriate.</li>
                            <li>
                                Formal orders of sanction of loan, shall be issued by the Managing Director and he/she shall
                                issue a cross cheque in the name of the individual or the NGO, as the case may be.
                            </li>
                            <li>

                                In case of loan for construction of building, the disbursement of subsequent installments
                                under rule 8 will be made after a certificate is issued by the DEFO and verified by the
                                Foundation to the effect that the borrower has.
                                <ol type="a">
                                    <li> Not deviated from the purpose for which the loan was sanctioned and is eligible for
                                        release of installment as envisaged by rule 8(1):
                                    </li>
                                    <li> Carried out the project according to the plan; and
                                    </li>
                                    <li> Not transferred the assets to any person, or cause damage or made allocation
                                        in the property, land or assets belonging to the institution.
                                    </li>
                                </ol>
                            </li>
                            <li>The DEFAC for the purpose of rule 9 shall have the power to inspect and monitor the project
                                to ascertain proper utilization of the funds and may submit a report in respect therefor to
                                MD FEF for recommending release or withholding of financial assistance.</li>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        //
    </script>
@endsection
