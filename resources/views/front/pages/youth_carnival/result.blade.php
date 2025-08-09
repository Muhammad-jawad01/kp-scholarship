@extends('front/layouts/layout')

@section('title', 'Youth Carnival')
@section('content')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<x-inner-page-header page='youth-carnival-result' slug='youth-carnival-result' />

<section class="contact-us">
    <div class="custom-container">

        {{-- second Form --}}
        <div class="row">
            <div class="col-sm-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1 p-4">
                <form action="{{url('getResult')}}" class="confitation">

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h4>Result of KP Youth Affairs Competitions </h4>
                        </div>


                        <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control" id="category_id" style="height:40px !important;">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select name="subcategory_id" class="form-control" id="subcategory_id">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                            <div class="form-group">
                                <label for="">Level</label>
                                <select name="level_or_stage_id" class="form-control" id="level_or_stage_id">
                                    <option value="">Select Level</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">

                            <div class="form-group">
                                <label for="">District <span>*</span></label>
                                <select name="district_id" class="form-control district_lists" id="district_id" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                            <div class="form-group e text-center">
                                <button class="btn-bg gradient-bg">View results</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

@endsection

@section('script')
{{-- Page js files --}}
<script src="{{ asset('step.js') }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#category_id").select2({
            placeholder: 'Select Category',
            ajax: {
                url: "{{route('getCompetitionCategory')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });

        $("#category_id").on("change", function(e) {
            var value = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{route("getSubCompetitionCategory")}}',
                data: {
                    'competition_category_id': value,
                },
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#subcategory_id')
                            .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.title));
                    });
                }
            });
        });

        $("#subcategory_id").on("change", function(e) {
            var value = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{route("getLevelCompetitionCategory")}}',
                data: {
                    'competition_sub_category_id': value,
                },
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#level_or_stage_id')
                            .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.title));
                    });
                }
            });
        });

        $(".district_lists").select2({
            placeholder: 'Select District',
            ajax: {
                url: "{{route('getDistrict')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });


    });
</script>

@endsection