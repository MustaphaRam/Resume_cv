@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-inline">Your Cv</h2>
                    <div class="d-inline gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('create')}}" class="btn btn-primary btn-sm me-md-2" tabindex="-1" role="button" aria-disabled="true">Add cv</a>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($cvs as $item)
                        <div class="content border rounded p-3 m-2">
                            <span><button type="button" class="btn-close float-end"></button></span>
                            <div class="up">
                                <a href="{{url('cv/contact')}}" class="btn btn-default">
                                    <div class="row">
                                        <span>{{ $item->title }}</span><br>
                                    </div>
                                </a>
                            </div>
                            <div class="p-3">
                                <span class="float-start">{{ date("d-m-Y", strtotime($item->created_at)) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
