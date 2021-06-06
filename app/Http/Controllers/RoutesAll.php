<?php

namespace App\Http\Controllers;

use App\Models\Routes;
use App\Models\Transaction;
use Illuminate\Http\Request;

class RoutesAll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Routes::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $value = Routes::find($id);
        $value2 = Transaction::find($id);
        // dd($value);
        return response()->json([
            'data' => [
                'salesman' =>[
                    'route_id' => $value['id'],
                    'route_name' => $value['route_name'],
                    'route_no' => $value['route_no'],
                    'salesman_summary' => [
                        'total_amount' => $value2['total_amount'],
                        'total_hour' => []
                    ]
                ]
            ]
        ]);
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
}
