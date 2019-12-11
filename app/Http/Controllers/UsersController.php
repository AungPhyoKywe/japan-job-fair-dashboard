<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return  view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries=Country::orderby('id','ASC')->pluck('name','id')->all();


        return  view('backend.users.create',['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|same:confirm-password|max:255',
            'country_id' => 'required',
            'mail_subject' => 'required',
            'mail_body' => 'required',
            'mail_password' => 'required',
        ]);

        try{

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);


            DB::beginTransaction();

            $user = User::create($input);

            DB::commit();
            if(isset($user->id) && $user->id != ""){

                return redirect()->route('users.index')->with('success','User created successfully');
            }else{
                return redirect()->route('users.index')->with('error','User created failed');
            }
        }
        catch(Exception $ex){
            DB::rollback();
            return redirect()->route('users.index')->with('error','User created failed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        $countries=Country::orderby('id','ASC')->pluck('name','id')->all();

        return  view('backend.users.edit',['users'=>$users,'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users =User::find($id);

        if (isset($users)){
            $users->delete();

            return  redirect()->route('users.index')->with('success','Scuccess fully deleted');
        }
        else
            {
                return  redirect()->route('users.index');
        }
    }

    public function report(Request $request){

        $users=DB::table('users')->select('users.id','users.name','users.email','countries.name as country_name')
            ->join('countries','users.country_id','=','countries.id');
        if ($request->has('name')){

            $users->where('users.name',$request->name);
        }
        if ($request->has('email')){

            $users->where('users.email',$request->email);
        }
        $users=$users->get();

        return Datatables::of($users)
            ->filter(function ($query) use ($request)
            {
                if ($request->has('name')) {
                    $query->where('users.name', 'like', "%{$request->get('name')}%");
                }

                if ($request->has('email')) {
                    $query->where('users.email', 'like', "%{$request->get('email')}%");
                }
            })
            ->make(true);
    }
}
