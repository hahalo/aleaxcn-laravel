<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Province;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s = '';
        //获取所有域名
        $domains = Domain::fetchAll();
        $navs = Province::fetchTypeNameAll();
        return view('domain.domain',compact('domains','navs','s'));
    }

    /**
     * search domain
     */
    public function search(Request $request){
        $s = $request->s;
        $domains = Domain::allBySearch($request);
        $navs = Province::fetchTypeNameAll();
        return view('domain.domain',compact('domains','navs','s'));
    }

    /**
     *  search province
     */
    public function searchProvince(Request $request){
        $s = $request->s;
        $navs = Province::fetchTypeNameAll();
        $provinceCode = 0;
        foreach ($navs as $nav){
            if($s==$nav['namecn']){
                $provinceCode = $nav['provincecode'];
                break;
            }
        }
        $domains = Domain::allBySearchProvince($provinceCode);
        return view('domain.domain',compact('domains','navs','s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
