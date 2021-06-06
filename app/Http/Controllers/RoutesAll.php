<?php

namespace App\Http\Controllers;

use App\Models\Routes;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

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
        // $value2 = Transaction::find($id)->;
        // // dd($value);where('id', '<=', $correctedComparisons)->count();
        // $val::where('route_id', '==', $id)->count();
        // echo($val);
        $user = DB::table('transactions')->where('route_id', $id)->get();
        // echo($user);
        $route = Routes::find($id);
        // print_r($value);
        // die();
        // echo '<pre>';
        // print_r($value);
        foreach ((array)$user as $key => $valuet) {
            $arr = (array)$valuet;
            foreach ($arr as $key2 => $values) {
                $result = json_encode($arr[$key2], true);
                $array = (array)$result;
                // print_r($array);
                foreach ($array as $key => $value) {
                    $assoc  = json_decode($value, true);
                    // print_r($assoc['id']);
                    $res = response()->json([
                        'data' => [
                            'salesman' => [
                                'route_id' => $assoc['id'],
                                'route_name' => $route['route_name'],
                                'route_no' => $route['route_no'],
                                'salesman_summary' => [
                                    'total_amount' => $assoc['total_amount'],
                                    'total_hour' => []
                                ]
                            ]
                        ]
                    ]);
                    echo json_encode($res->original, true);
                }

            }
                // $res = response()->json([
                //     'data' => [
                //         'salesman' => [
                //             // 'route_id' => $key["id"],
                //             'route_name' => $route['route_name'],
                //             'route_no' => $route['route_no'],
                //             'salesman_summary' => [
                //                 // 'total_amount' => $key['total_amount'],
                //                 'total_hour' => []
                //             ]
                //         ]
                //     ]
                // ]);
                // return $res;
            }


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
