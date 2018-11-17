<?php

namespace App\Http\Controllers;

use App\Song\Singer;
use Illuminate\Http\Request;
use App\Song\AllSong;
use App\Song\Album;
use Illuminate\Support\Facades\DB;

class SingerController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function show(Singer $singer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function edit(Singer $singer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Singer $singer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Singer $singer)
    {
        //
    }

    public function search()
    {

        $search = \Request::get('q');
        if($search)
        {
        $singer = DB::table('singers')
                  ->where('singer_name','LIKE',"%$search%")
                  ->first();
        $id = $singer->id;         
     
        $all = DB::table('singers')
               ->select('singers.singer_name','singers.country','all_songs.song_name','all_songs.release_year','all_songs.duration','all_songs.album_id','albums.album_name','albums.id')
               ->rightJoin('all_songs','singers.id', '=', 'all_songs.singer_id')
               ->join('albums','all_songs.album_id', '=', 'albums.id')
               //->where('all_songs.release_year',2017)
               ->where('all_songs.singer_id',$id)
               ->paginate(50);
        }
        else
        {
        $all = DB::table('singers')
               ->select('singers.singer_name','singers.country','all_songs.song_name','all_songs.release_year','all_songs.duration','all_songs.album_id','albums.album_name','albums.id')
               ->rightJoin('all_songs','singers.id', '=', 'all_songs.singer_id')
               ->join('albums','all_songs.album_id', '=', 'albums.id')
               ->paginate(8);   
        }
        return $all;
    }
}
