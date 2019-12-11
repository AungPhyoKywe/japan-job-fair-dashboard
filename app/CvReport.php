<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CvReport extends Model
{
    protected $table = 'cv_report';


    public  static function getUsers (){

        $request=request();

        $records = DB::table('cv_report')->select('*')->orderBy('id', 'asc')->get()->toArray();

        return $records;

    }
}
