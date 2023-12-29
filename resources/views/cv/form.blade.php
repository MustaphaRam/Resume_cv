@extends('layouts.app')
@vite(['public/style/style.css', 'resources/js/app.js'])
@section('content')
    <div id="app" class="">
        <script> 
            const cv = @json($cv);
        </script>
    </div>
@endsection
