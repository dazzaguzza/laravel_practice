<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = [
            'items' => Item::all(),
            'ip' => request()->ip()
        ];


        return view('items.index',$items);
    }

    public function create(){
        $this->authorize('create',Item::class);
        $ip = request()->ip();
        return view('items.create',compact('ip'));
    }

    public function store(ItemRequest $request){
    
        $this->authorize('create',Item::class);
        $name = $request->name;
        $total = $request->total;

        $item = Item::create([
            'name' => $name,
            'total' => $total
        ]);
        return redirect('/items');
    }

    public function show($id){
        $item = Item::find($id);
        $ip =request()->ip();
        $this->authorize('view', $item);
        return view('items.show', compact('item','ip'));
    }

    public function edit($id){
        $item = Item::find($id);
        $ip = request()->ip();

        $this->authorize('update', $item);
        return view('items.edit',compact('item','ip'));
    }

    public function update(ItemRequest $request, $id){
        $name = $request->name;
        $total = $request->total;

        $item = Item::find($id);

        $this->authorize('update', $item);
        $item->name = $name;
        $item->total = $total;
        $item->save();

        return redirect('/items');
    }

    public function destroy($id){
        $item = Item::find($id);
        $this->authorize('delete', $item);
        $item->delete();
        return redirect('/items');
    }
}