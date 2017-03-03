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

    public function index($type = 'all',$date = false)
    {
        $topics = Topic::with('user');   
        
        if ($type != 'all')
            $topics->Type($type);
        
        if ($date)
            $topics->DatePublish($date);
        
        $topics = $topics->limit(20)->orderBy('published_on', 'desc')->get();

        $data = [
            'topics' => $topics,
            'type' => $type,
            'date' => $date
        ];

        return view('topics/list',$data);
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

    public function listing($type = 'all', $date = false)
    {
        try {
            $topics = Topic::with('user');   
        
            if ($type != 'all')
                $topics->Type($type);
            
            if ($date)
                $topics->DatePublish($date);
            
            $topics = $topics->orderBy('published_on', 'desc')->paginate(20);

            $response = [
                'status' => true,
                'data' => $topics,
                'total' => $topics->total()
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
