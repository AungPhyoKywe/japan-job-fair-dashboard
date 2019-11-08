<?php

use Illuminate\Database\Seeder;

class CvReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cv_report')->insert(['apply_for' => 'CAD Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'Carrer Seminar', 'name'=>'kyaw','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'Approve','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Female','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'IT Engineer', 'name'=>'Nishino','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Female','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Business:(JLPT N2)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'CAD Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Basic Conversation:(JLPT N4)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'IT Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'Approve','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'CAD Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'Carrer Seminar', 'name'=>'aung aung','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'Carrer Seminar', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'CAD Junior14', 'name'=>'mya mya','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'CAD Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'CAD Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'CAD Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Male','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
        DB::table('cv_report')->insert(['apply_for' => 'CAD Engineer', 'name'=>'apk','email' => Str::random(10).'@gmail.com', 'phone'=>'2343-098','approve'=>'UnApprove','batch'=>'9','DOB'=>'2019-09-09','gender'=>'Female','nationality'=>'myanmar','current_country'=>'myanmar','english_skill'=>'fluent','japanese_skill'=>'Daily Conversation:(JLPT N3)','cv'=>'hh.pdf']);
    }
}
