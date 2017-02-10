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

    public function index()
    {
        $events = Event::with('places')->get();
        //dd($events);
        foreach ($events as $event) {
            echo 'title : '.$event->title.'<br>';
            echo 'date : '.$event->start_date.' - '.$event->end_date.'<br>';
            echo 'place<br>';
            foreach ($event->places as $place) {
                echo '&emsp;'.$place->title.'<br>';
            }
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

    public function listing($type = false, $sort = false)
    {
        $events = Event::with('places');   
        
        if ($type && $type != 'all')
            $events->Type($type);
        
        if ($sort && $sort == 'latest')
            $events->SortByLates($sort);
        elseif ($sort && $sort == 'upcoming')
            $events->SortByUpcoming($sort);
        
        $events = $events->paginate(2);
        echo json_encode($events);
        
        return;
    }
}
