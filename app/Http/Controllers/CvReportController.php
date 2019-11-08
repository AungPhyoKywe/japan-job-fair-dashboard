<?php

namespace App\Http\Controllers;

use App\CvReport;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\UsersExport;


class CvReportController extends Controller
{
    public function index()

    {
        $cv_report=CvReport::all();

        return view('report',['cv_report'=>$cv_report]);

    }

    public static function report()
    {

        return Excel::download(new UsersExport(), 'disney.xlsx');
    }

    public function search(Request $request)

    {
        if ($request->applyfor == 'All')
        {
            $cv_report=CvReport::all();

            return view('report',['cv_report'=>$cv_report]);
        }
        $cv_report=CvReport::where('apply_for',$request->applyfor)
            ->where('gender',$request->gender)
            ->where('approve',$request->approve)
            ->where('japanese_skill',$request->jpskill)
            ->get();
        return view('report',['cv_report'=>$cv_report]);
    }
}
