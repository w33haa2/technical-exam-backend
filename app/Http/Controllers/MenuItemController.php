<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItem;

class MenuItemController extends Controller
{
     /**
     * Create a new menu item instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $menuItem = new MenuItem;
        $request->validate([
            'name' => 'required|unique:menu_items|string',
            'menu_type_id' => 'required|exists:menu_types,id',
            'tax' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        $menuItem->fill($request->input())->save();
        $menuItem->save();
        return response()->json([
            'message' => "Successfully created menu item!"
        ], 200);
    }

    /**
     * Update a menu item instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $menuItem = MenuItem::find($data);
        if(!MenuItem::find($data)) {
            return response()->json([
                'message' => "No menu item was found!"
            ], 404);
        }
        if($menuItem->name != $request->name) {
            $request->validate([
                'name' => 'required|unique:menu_items|string',
                'menu_type_id' => 'required|exists:menu_types,id',
                'tax' => 'required|numeric',
                'price' => 'required|numeric',
            ]);
        } else {
            $request->validate([
                'menu_type_id' => 'required|exists:menu_types,id',
                'tax' => 'required|numeric',
                'price' => 'required|numeric',
            ]);
        }
        $menuItem->fill($request->input())->save();
        $menuItem->save();
        return response()->json([
            'message' => "Successfully updated menu item!"
        ], 200);
    }

    /**
     * Delete menu item
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!MenuItem::find($data)) {
            return response()->json([
                'message' => "No menu item was found!"
            ], 404);
        }
        $id = MenuItem::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted menu item!"
        ], 200);
    }

    /**
     * Fetches menu items
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function menuItems(Request $request)
    {
        if(count($request->all()) > 0) {
            $menuItem = MenuItem::with([
                "menuType"
            ])->paginate(intval($request->per_page));
        } else {
            $menuItem = MenuItem::with([
                "menuType"
            ])->get();
        }
        return response()->json([
            'message' => "Successfully fetched menu item",
            'meta' => $menuItem
        ], 200);
    }
}
