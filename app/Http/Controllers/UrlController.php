<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

         $url = new Url;
        $url->url = $request->input('url');
        $url->shortenurl = 'google.com';
        $url->hits = '1';
        $url->save();exit;

    //return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(url $url)
    {
        //
    }
}
