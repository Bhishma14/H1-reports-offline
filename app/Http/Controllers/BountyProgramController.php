<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BountyProgramController extends Controller
{
    //
    public function index() {
        $programs = \App\BountyProgram::paginate(10);
        return view('bounty_program.index', ['programs' => $programs, 'title'=>'HackerOne - Bug Bounty Programs']);
    }
        
    public function program($id) {
        $program = \App\BountyProgram::find($id);
        if ($program){
            return view('bounty_program.program', ['program'=>$program]);
        }
        return redirect ()->route('bounty_programs');
    }
    
}
