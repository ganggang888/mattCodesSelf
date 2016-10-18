<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
class IndexController extends Controller
{
    protected $array = array(
        array(
            'name'=>'设置',
            'icon'=>'',
            'url'=>'',
            'son'=>array(
                array(
                    'name'=>'信息',
                    'icon'=>'',
                    'url'=>'',
                    'son'=>array(
                        array('name'=>'','icon'=>'','url'=>''),
                    ),
                ),
            ),
        ),
        array(
            'name'=>'设置',
            'icon'=>'',
            'url'=>'',
            'son'=>array(
                array(
                    'name'=>'信息',
                    'icon'=>'',
                    'url'=>'',
                    'son'=>array(
                        array('name'=>'','icon'=>'','url'=>''),
                    ),
                ),
            ),
        ),
    );
    public function __construct()
    {
        return view()->share('nav',$this->array);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        session_start();
        $_SESSION['roleid'] = 1;
        $menu = new Menu;
        $row = $menu->AllInfo();
        return view('Admin.Index.index')->with('array',$row);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
