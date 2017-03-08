<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(Request $request) {
        $reports = \App\Report::paginate(10);
        return view('report.index', ['reports' => $reports, 'title'=>'HackerOne - Reports']);
    }
    
    public function report($id) {
        $report = \App\Report::find($id);
        if ($report){
            return view('report.report', ['report'=>$report]);
        }
        return redirect ()->route('reports');
    }
    
    public function program($name) {
        $reports = \App\Report::where('bounty_program',$name)->paginate(8);
        return view('report.index', ['reports' => $reports, 'show_program'=>true, 'name'=>$name]);
    }
    
    public function reporter($name) {
        $reports = \App\Report::where('reporter',$name)->paginate(8);
        return view('report.index', ['reports' => $reports, 'show_program'=>false, 'name'=>$name]);
    }
    
    public function redirect(Request $request) {
        $url = $request->input('url');
        return ($url)?redirect($url) : redirect()->route('home');
    }
}
