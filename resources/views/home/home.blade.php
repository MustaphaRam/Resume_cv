@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="d-inline">Your have {{ count($cvs) }} cv</h2>
                        <div class="d-inline gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('create')}}" class="btn btn-primary btn-sm me-md-2" tabindex="-1" role="button" aria-disabled="true">Create new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($cvs as $item)
                        <div class="content border rounded p-3 m-2">
                            <span><a onclick="return confirm('Are you sure you want to delete this CV?')" href="cv/delete/{{$item->id}}"  class="btn-close float-end"></a></span>
                            <div class="up">
                                <a href="cv/detail/{{$item->id}}" class="btn btn-default">
                                    <div class="row">
                                        <span>{{ $item->title }}</span><br>
                                    </div>
                                </a>
                            </div>
                            <div class="p-3">
                                <span class="float-start">{{ date("d-m-Y", strtotime($item->created_at)) }}</span>
                                <span class="float-end"><a href="cv/download/{{$item->id}}" target="_blank">Download<a/></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
