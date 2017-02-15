<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Product;

class FindController extends Controller
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

    public function issue($keyword,$limit)
    {
        $countTopic = 0;
        $countSwatch = 0;
        $countEvent = 0;
        $array = [];
        $issues = Issue::where('title','like','%'.$keyword.'%')->with('relateTopics','relateSwatch','relateEvents')->get();
        foreach ($issues as $issue) {
            $countTopic = collect($issue->relateTopics)->count();
            $countSwatch = collect($issue->relateSwatch)->count();
            $countEvent = collect($issue->relateEvents)->count();
            $array[] = [
                'id' => $issue->id,
                'title' => $issue->title,
                'count' => $countTopic+$countSwatch+$countEvent
            ];
        }

        $sorted = collect($array)->sortByDesc('count')->values()->take($limit);
        return;
    }

    public function product($keyword,$limit)
    {
        $countBlock = 0;
        $countSwatch = 0;
        $array = [];
        $products = Product::with('blocks','swatch')->get();
        foreach ($products as $product) {
            $countBlock = collect($product->blocks)->count();
            $countSwatch = collect($product->swatch)->count();
            $array[] = [
                'id' => $product->id,
                'title' => $product->title,
                'count' => $countBlock+$countSwatch
            ];
        }
        $sorted = collect($array)->sortByDesc('count')->values()->take($limit);
        return;
    }
}
