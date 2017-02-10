<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swatch;

class SwatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $swatches = Swatch::with('user','colors','products','comments')->paginate(1);
        //dd($swatches);
        foreach ($swatches as $swatch) {
            //dd($swatch);
            echo 'crated at : '.$swatch->created_at.'<br>';
            echo 'caption : '.$swatch->caption.'<br>';
            echo 'username : '.$swatch->user->username.'<br>';
            echo 'love : '.$swatch->love_count.'<br>';
            echo 'product<br>';
            foreach ($swatch->products as $product) {
                echo '&emsp;'.'<b>'.$product->brand->title.'</b> '.$product->title.'<br>';
            }
            echo 'color<br>';
            foreach ($swatch->colors as $color) {
                echo '&emsp;'.$color->color_code.'<br>';
            }
            $comment = ($swatch->comments->count() > 0) ? true : false ;
            if($comment){
                echo 'comment<br>';
                foreach ($swatch->comments as $comment) {
                    echo '&emsp; publish on : '.$comment->published_on.'<br>';
                    echo '&emsp; user : '.$comment->user->username.'<br>';
                    echo '&emsp; love : '.$comment->love_count.'<br>';
                    echo '&emsp; block<br>';
                    foreach ($comment->blocks as $block) {
                        echo '&emsp;&emsp; '.$block->content.'<br>';
                    }
                    $replies = ($comment->replies->count() > 0) ? true : false ;
                    if($replies){
                        echo '&emsp; replies<br>';
                        foreach ($comment->replies as $reply) {
                            echo '&emsp;&emsp; published_on : '.$reply->published_on.'<br>';
                            echo '&emsp;&emsp; user : '.$reply->user->username.'<br>';
                            echo '&emsp;&emsp; love : '.$reply->love_count.'<br>';
                            echo '&emsp;&emsp; block<br>';
                            foreach ($reply->blocks as $block) {
                                echo '&emsp;&emsp;&emsp; '.$block->content.'<br>';
                            }
                        }
                    }
                }
            }
            echo '<hr>';
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

    public function listing($type = false)
    {
        $swatches = Swatch::with('user','colors','products','comments')->paginate(1);

        if ($type && $type != 'all') {
            $topics->Type($type,$detail);
        }
        
        return;
    }
}
