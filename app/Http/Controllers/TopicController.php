<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $topics = Topic::with('user')->get();
        //dd($topics);
        foreach ($topics as $topic) {
            echo 'title : '.$topic->title.'<br>';
            echo 'type : '.$topic->topic_type.'<br>';
            echo 'by : '.$topic->user->username.'<br>';
            echo 'day : '.$topic->published_on.'<br>';
            echo 'love count : '.$topic->love_count.'<br>';
            echo 'comment count : '.$topic->comment_count.'<br>';
            echo '<br>';
        }
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

    public function listing($type = false, $date = false)
    {
        $topics = Topic::with('user');   
        
        if ($type && $type != 'all')
            $topics->Type($type);
        
        if ($date)
            $topics->DatePublish($date);
        
        $topics = $topics->paginate(1);
        echo json_encode($topics);
        
        return;
    }
}
