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
        $cv_report=CvReport::where('apply_for',$request->applyfor);
        $cv_report->where('gender',$request->gender);
        $cv_report->where('japanese_skill',$request->jpskill);
        $cv_report->where('approve',$request->approve);
        $cv_report->get();


        return view('report',['cv_report'=>$cv_report]);
    }
}
