<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuType;

class MenuTypeController extends Controller
{
    /**
     * Create a new menu type instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $menuType = new MenuType;
        $request->validate([
            'name' => 'required|unique:menu_types|string',
        ]);
        $menuType->fill($request->input())->save();
        $menuType->save();
        return response()->json([
            'message' => "Successfully created menu types!"
        ], 200);
    }

    /**
     * Update a menu type instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $menuType = MenuType::find($data);
        if(!MenuType::find($data)) {
            return response()->json([
                'message' => "No menu type was found!"
            ], 404);
        }
        if($menuType->name != $request->name) {
            $request->validate([
                'name' => 'required|unique:menu_types|string',
            ]);
        }
        $menuType->fill($request->input())->save();
        $menuType->save();
        return response()->json([
            'message' => "Successfully updated menu type!"
        ], 200);
    }

    /**
     * Delete menu type
     *
     * @param  [string] id
     * @return [string] message
     */
    public function delete($data)
    {
        if(!MenuType::find($data)) {
            return response()->json([
                'message' => "No menu type was found!"
            ], 404);
        }
        $id = MenuType::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted menu type!"
        ], 200);
    }

    /**
     * Fetches menu types
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function menuTypes(Request $request)
    {
        if(count($request->all()) > 0) {
            $menuType = MenuType::paginate(intval($request->per_page));
        } else {
            $menuType = MenuType::all();
        }
        return response()->json([
            'message' => "Successfully fetched menu type",
            'meta' => $menuType
        ], 200);
    }
}
