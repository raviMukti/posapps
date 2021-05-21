<?php

namespace App\Http\Controllers;

use App\Models\Item;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * Display a list of item
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table("items")
                    ->leftJoin("categories", "items.category_id", "=", "categories.category_id")
                    ->select("items.*", "categories.category_name")
                    ->get();
        return view("theme.page.item.item-list")->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table("categories")->get();
        return view("theme.page.item.create-item")->with("categories", $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'itemName' => 'required|min:2',
            'itemSku' => 'required',
            'itemBarcode' => 'required',
            'category' => 'required',
            'itemPrice' => 'required'
        ]);

        $item = new Item();
        $item->item_name = $request->input("itemName");
        $item->description = $request->input("itemDescription");
        $item->sku = $request->input("itemSku");
        $item->barcode = $request->input("itemBarcode");
        $item->category_id = $request->input("category");
        $item->price = (int) $request->input("itemPrice");
        $item->item_image = $request->input("itemPicture");
        $request->input("itemPublish") == "on" ? $item->publish = true : $item->publish = false;
        $request->input("itemActive") == "on" ? $item->active = true : $item->active = false;
        $item->created_by = 1;
        $item->updated_by = 1;

        $item->save();

        return redirect('/web/posapps/item/list')->with('success', 'Success Added Item!!!');
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

    /**
     * Show Page For Bulk Insert Via CSV
     * @return Response
     */
    public function showBulk()
    {
        return view("theme.page.item.bulk-item");
    }


    /**
     * Show Download Page
     * @return Response
     */
    public function showDownload()
    {
        return view("theme.page.item.download-item");
    }

} // end of controller
