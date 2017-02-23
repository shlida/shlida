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
//infinit scroll loadmore
    public function index($type = false)
    {
        if(!$type) {
            $topics = Topic::with('user')->limit(5)->get();
            $type = 'all';
        } else {
            $topics = Topic::with('user')->Type($type)->limit(5)->get();
        }

        $data = [
            'topics' => $topics,
            'type' => $type
        ];
        
        return view('lists/topic',$data);
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
        $topics = Topic::with('user','blocks','issues','comments')->get()->find($id);
        return;
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
        try {
            $topics = Topic::with('user');   
        
            if ($type && $type != 'all')
                $topics->Type($type);
            
            if ($date)
                $topics->DatePublish($date);
            
            $topics = $topics->paginate(5);

            $response = [
                'status' => true,
                'data' => $topics
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
        
        return $response;
    }
}
