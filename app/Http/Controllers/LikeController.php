<?php

namespace App\Http\Controllers;

use App\Repositories\Models\Item;
use App\Repositories\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {

        $like = new Like;
        $like->item_id = $request->book_id;
        $like->user_id = Auth::user()->id;
        $like->save();


        return redirect()->route('item.showList',[$request->book_id]);
    }

    public function destroy(Request $request, $id) {
        $item=Item::findOrFail($id);

        $item->likes()->delete();

        return redirect()->route('item.showList',[$request->book_id]);
    }
}
