<script src="{{ asset('bower_components/hai-bower/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/hai-bower/js/plugins.js') }}"></script>
<script src="{{ asset('bower_components/hai-bower/js/init.js') }}"></script>
<script type="text/javascript">
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        ]); !!}
</script>
