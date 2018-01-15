
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
                            <strong class=" text-danger">HackerOne bug reports</strong>
                        </div>
                        <div class="col-md-4">
                            @if (isset($name))
                                <strong class=" text-muted">
                                @if (isset($show_program) && $show_program == true)
                                    Program: 
                                @elseif (isset($show_program) && $show_program == false)
                                    Reporter: 
                                @endif 
                                </strong>
                                <strong class=" text-danger">{{$name}}</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Reporter</th>
                    <th>Bounty</th>
                    <th>Program</th>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr>
                            <td><a target="_blank" href="{{route('report', ['id'=>$report->id])}}">{{$report->id}}</a></td>
                            <td>{{$report->title}}</td>
                            <td><a href="{{route('reporter',['name'=>$report->reporter])}}">{{$report->reporter}}</a></td>
                            <td>{{$report->bounty}}</td>
                            <td><a href="{{route('program', ['name'=>$report->bounty_program()])}}">{{$report->bounty_program}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                {{ $reports->links() }}
            </div>
        </div>        
    </div>
</div>

@endsection
