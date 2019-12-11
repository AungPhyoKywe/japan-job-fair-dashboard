<?php

namespace App\Http\Controllers;

use App\CvReport;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use File;
use Yajra\Datatables\Datatables;
use App\Exports\UsersExport;
use ZipArchive;


class CvReportController extends Controller
{
    public function index()

    {
        //$cv_report=CvReport::all();

        return view('backend.cv_report.cvreport');

    }

    public static function report()
    {
        $cv_report=CvReport::all();
        return Datatables::of($cv_report)->make(true);
    }

    public function search()

    {       $request=request();
        if ($request->action_type=='export') {
            return Excel::download(new UsersExport, 'users.xlsx');

        }
        elseif($request->action_type=='download'){
            $zip = new ZipArchive;

            $fileName = 'myNewFile.zip';


            if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
            {
                $files = File::files(public_path('upload'));

                foreach ($files as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }

                $zip->close();
            }

            return response()->download(public_path($fileName));

        }

    }
}
