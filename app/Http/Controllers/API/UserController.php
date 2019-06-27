<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(20);
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
            'communication' => 'required|integer|max:10|min:0',
            'engineer' => 'required|integer|max:10|min:0',
            'time' => 'required|integer|max:10|min:0',
            'language' => 'required|integer|max:10|min:0',
        ]);

        if($request->photo){
            $name = time(). '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            
            \Image::make($request->photo)->save(public_path('img/').$name);
            $userPhoto = 'img/'.$name;
            //$request->merge(['photo' => $name]);
            
        } else{
            $userPhoto = 'img/default.jpg';
        }


        return User::create([
            'fullname' => $request['fullname'],
            'photo' => $userPhoto,
            'communication' => $request['communication'],
            'engineer_skills' => $request['engineer'],
            'time_management' => $request['time'],
            'languages' => $request['language'],
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
       if($search = \Request::get('q')){
        $users = User::where(function($query) use ($search) {
            $query->where('fullname', 'LIKE', "%$search%");})
                  ->paginate(20);
        
       } else{
        $users =  User::latest()->paginate(10);
       }
        return $users;
    }
}
