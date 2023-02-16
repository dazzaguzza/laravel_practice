<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;;
use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Item;

class TrackController extends Controller
{
    public function create($item_id){
        $item = ['item'=>Item::find($item_id),'ip'=> request()->ip()];

        return view('tracks.create',$item);
    }

    public function store(TrackRequest $request, $item_id){
        $item = Item::find($item_id);
        $item->tracks()->create([
            'type'=>$request->type,
            'quantity'=>$request->quantity,
        ]);

        if($request->type == "in"){
            $item->total += $request->quantity;
            $item->save();
        }else{
            $item->total -= $request->quantity;
            $item->save();
        }

        return redirect("/items/{$item->id }");
    }

    public function destroy($id){
        $track = Track::find($id);
        $item = $track->item;

        if($track->type == "in"){
            $item->total -= $track->quantity;
            $item->save();
        }else{
            $item->total += $track->quantity;
            $item->save();
        }

        $track->delete();

        return redirect("/items/{$item->id}");
    }
}