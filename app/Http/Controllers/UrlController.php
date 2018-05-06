<?php

namespace App\Http\Controllers;
use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo 'Hello';exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       ##Get requested url here
       $shortendUrl = $_GET['shortendUrl'];
        if($shortendUrl!=''){
            ##Get requested url data from database
            $urlData = Url::where('shortenurl', 'LIKE', '%'.$shortendUrl.'%')->get();
            if(count($urlData)>0){
                $id = $urlData[0]['id'];
                $hits = $urlData[0]['hits'];
                $newHit = $hits+1;
                ##On hits update counter and increament by 1
                Url::where('id', $id)->update(['hits' => $newHit]);
                return redirect($urlData[0]['url']);
            }else{
                ##Redirect back with error message.
                $request->session()->flash("flash_notification.error", "No data found for url " .$shortendUrl);
                return Redirect::back();
            }

        }else{
            ##Redirect back with error message.
            $request->session()->flash("flash_notification.error", "Please enter url.");
            return Redirect::back();
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $url = trim($request->input('url'));
        /*First serach at table if ant record is found for requested url.
          If found then return the record from database table.
          It Also avoid data duplication at table
        */
        $urlData = Url::where('url', 'LIKE', '%'.$url.'%')->get();
        if(count($urlData)>0){
            echo $urlData[0]['shortenurl'];
        }else{
            ##Url shortening starts here
            $shortenurl = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 );
            $actual_link = 'http://'.$_SERVER['HTTP_HOST'].'/'.$shortenurl;
            $url = new Url;
            $url->url = $request->input('url');
            $url->shortenurl = $actual_link;//Generated url
            $url->hits  = 0;//Save by 0 hits
            $url->save();
            ##Send data to ajax call
            echo $actual_link = 'http://'.$_SERVER['HTTP_HOST'].'/'.$shortenurl;
        } 
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
