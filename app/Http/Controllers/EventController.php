<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($type = 'all', $sort = false)
    {
        if($sort) {
            $events = Event::with('places');

            if($type != 'all')
                $events->Type($type);

            $events = $events->Sort($sort)->limit(20)->get();
        } else {
            $now = Event::with('places');
            $upcoming = Event::with('places');
            $end = Event::with('places');

            if($type != 'all') {
                $now->Type($type);
                $upcoming->Type($type);
                $end->Type($type);
            }

            $now = collect($now->Sort('now')->get());
            $upcoming = collect($upcoming->Sort('upcoming')->get());
            $end = collect($end->Sort('end')->limit(20)->get());

            $events = $now->merge($upcoming)->merge($end);
        }

        $data = [
            'events' => $events,
            'type' => $type,
            'sort' => $sort
        ];
        
        return view('events/list',$data);
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
        $events = Event::with('places','issues','comments')->get()->find($id);
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

    public function listing($type = 'all', $sort = false)
    {
        try {
            $events = Event::with('places');   
            
            if ($type != 'all')
                $events->Type($type);
            
            if($sort) {
                $events->Sort($sort);
            } else {
                $events->Sort('end');
            }
           
            $events = $events->paginate(20);
        
            $response = [
                'status' => true,
                'data' => $events,
                'total' => $events->total()
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