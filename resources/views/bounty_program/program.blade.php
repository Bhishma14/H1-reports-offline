
@extends('layout.app')
@section('title', 'HackerOne Bounty Program '.$program->handle )

@section('content')
<div class="container">    
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <div class="row">
                        <span class="col-md-5 text-left"><strong>Handle: </strong>{{$program->handle}}</span>
                        <span class="col-md-7 text-right">
                            <span class="col-md-4"><strong>Name: </strong>{{$program->name}}</span>
                            <span class="col-md-4"><strong>Offers bounty: </strong>{{($program->offers_bounty==1)?'Yes':'No'}}</span>
                            <span class="col-md-4"><strong>Offers thanks: </strong>{{($program->offers_thanks==1)?'Yes':'No'}}</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <pre>
                    {!! $program->stripped_policy !!}
                </pre>
            </div>
        </div>
    </div>
</div>
@endsection