
@extends('layout.app')

@section('title', 'Hackerone'.(isset($name)?' - '.$name:''))

@section('content')
   
<div class="container">
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <div class="row">
                        <div class="col-md-8">
                            <strong class=" text-danger">HackerOne Bug Bounty Programs</strong>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Offer rewards</th>
                    <th>Offer thanks</th>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                        <tr>
                            <td><a target="_blank" href="{{route('program', ['id'=>$program->id])}}">{{$program->id}}</a></td>
                            <td>{{$program->name}}</td>
                            <td>
                                <img src="{{($program->offers_rewards)?url('img/yes.png'):url('img/no.png')}}" width="25" height="25">
                            </td>
                            <td>
                                <img src="{{($program->offers_thanks)?url('img/yes.png'):url('img/no.png')}}" width="25" height="25">
                            </td>                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                {{ $programs->links() }}
            </div>
        </div>        
    </div>
</div>

@endsection
