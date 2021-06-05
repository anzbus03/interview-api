<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'first_name' => 'required',
        ]);
        return Profile::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $value = Profile::find($id);
        // dd($value);
        return response()->json([
            'data' => [
                'id' => $value['id'],
                'name' => $value['first_name'],
                'fullname' => $value['first_name'] . ' ' . $value['last_name'],
                'first_name' => $value['first_name'],
                'second_name' => $value['last_name'],
            ]
        ]);
                // return Profile::find($id);
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
        $Profile = Profile::find($id);
        $Profile->update($request->all());
        return $Profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Profile::destroy($id);
    }
    /**
     * Search for name.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Profile::where('first_name', 'like', '%' . $name . '%')->get();
    }
}
