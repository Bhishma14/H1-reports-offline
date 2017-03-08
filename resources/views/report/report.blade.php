
@extends('layout.app')

@section('title', 'HackerOne report #'.$report->id)

@section('content')

<div class="container">    
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <div class="row">
                        <span class="col-md-5 text-left"><strong>Title: </strong>{{$report->title}}</span>
                        <span class="col-md-7 text-right">
                            <span class="col-md-4"><strong>Reporter: </strong><a href="{{route('reporter',['name'=>$report->reporter])}}">{{$report->reporter}}</a></span>
                            <span class="col-md-4"><strong>Bounty: </strong>{{$report->bounty}}</span>
                            <span class="col-md-4"><strong>Program: </strong><a href="{{route('program', ['name'=>$report->bounty_program])}}">{{$report->bounty_program}}</a></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                {!! $report->info_html !!}
            </div>
        </div>
    </div>
</div>

@endsection