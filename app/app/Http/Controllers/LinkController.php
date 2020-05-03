<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return view('link');
    }


    public function shorten(Request $request)
    {
        $request->validate([
            'original_link' => 'required|url'
        ]);
        $random_token = \Str::random(8);
        $short_link = \URL::to('/') . '/' . $random_token;

        $link = new Link();
        $link->original_link = $request->original_link;
        $link->short_link = $short_link;
        $link->save();

        return redirect('/')->with('status', $short_link);
    }


    public function fetchlink($code)
    {
        $short_link = \URL::to('/') . '/' . $code;
        $link = Link::where('short_link', '=', $short_link)->firstOrFail();

        return redirect($link->original_link);
    }
}
