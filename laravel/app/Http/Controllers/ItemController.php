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
        return view('items.create');
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
        $this->authorize('view', $item);
        return view('items.show', compact('item'));
    }

    public function edit($id){
        $item = Item::find($id);
        $this->authorize('update', $item);
        return view('items.edit',compact('item'));
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