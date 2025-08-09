{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif


<!-- Sweet Alert -->
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
{{-- page script --}}
@yield('page-script')
{{-- page script --}}

<script src="{{ asset('vendors/file-uploader/vue.js') }}"></script>
<script src="{{ asset('vendors/file-uploader/laravel-file-uploader.js')}}"></script>
<script>
    $(function() {
        if ($("#app").length > 0) {
            new Vue({
                el: '#app'
            })
        }
    });
</script>

@include('sweetalert::alert')
@stack('scripts')

<!-- <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->