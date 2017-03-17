<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Place;
use Validator;

class EventController extends Controller
{
    private $limit = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // if($sort != 'all') {
        //     $events = Event::with('places');
        //     $events = $events->Sort($sort)->limit($this->limit)->get();
        // } else {
            $now = collect(Event::with('places')->Sort('now')->get());
            $upcoming = collect(Event::with('places')->Sort('upcoming')->get());
            $end = collect(Event::with('places')->Sort('end')->limit($this->limit)->get());
            $events = $now->merge($upcoming)->merge($end);
        // }

        $data = [
            'events' => $events
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
        return view('events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'image_url' => 'required|max:191',
            // 'image_url' => 'required|mimes:jpeg,jpg,png',
            'event_type' => 'required|in:SALE,SHOP OPENING,PRODUCT LAUNCH,MARKET,FAIR,OPEN HOUSE',
            'published'=> 'required|integer',
            'pinned' => 'required|integer',
            'added_by' => 'required|integer',
            'place_id' => 'required|integer' 
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect('event/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $events = new Event();
            $events->title = $data['title'];
            $events->description = $data['description'];
            $events->start_date = $data['start_date'];
            $events->end_date = $data['end_date'];
            $events->start_time = $data['start_time'];
            $events->end_time = $data['end_time'];
            $events->image_url = $data['image_url'];
            $events->event_type = $data['event_type'];
            $events->published = $data['published'];
            $events->pinned = $data['pinned'];
            $events->added_by = $data['added_by'];
            $events->save();
            $events->places()->attach([$data['place_id']]);

            return redirect('event/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = Event::with('places','issues','comments')->find($id);
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

    public function listing(Request $request,$sort)
    {
        try {
            $events = Event::with('places');
            if($sort != 'all') {
                $events = $events->Sort($sort); 
                if(count($request->input('type')) > 0) {
                    $events->Type($request->input('type'));
                }
            } else {
                $events = $events->Sort('end');
            }

            $events = $events->paginate($this->limit);

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

    public function dateListing($date)
    {
        try {
            $events = Event::with('places')->Date($date)->get();
            $date = Carbon::createFromFormat('Y-m-d', $date, 'Asia/Bangkok')->format('j F Y');

            $response = [
                'status' => true,
                'date' => $date,
                'data' => $events
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