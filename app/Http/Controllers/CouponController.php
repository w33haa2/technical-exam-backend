<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    /**
     * Create a new coupon instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $coupon = new Coupon;
        $request->validate([
            'code' => 'required|unique:coupons|string',
        ]);
        $coupon->fill($request->input())->save();
        $coupon->save();
        return response()->json([
            'message' => "Successfully created coupon!"
        ], 200);
    }

    /**
     * Update a coupon instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, $data)
    {
        $coupon = Coupon::find($data);
        if(!Coupon::find($data)) {
            return response()->json([
                'message' => "No coupon was found!"
            ], 404);
        }
        if($coupon->code != $request->code) {
            $request->validate([
                'code' => 'required|unique:coupons|string',
            ]);
        }
        $coupon->fill($request->input())->save();
        $coupon->save();
        return response()->json([
            'message' => "Successfully updated coupon!"
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
        if(!Coupon::find($data)) {
            return response()->json([
                'message' => "No coupon was found!"
            ], 404);
        }
        $id = Coupon::find( $data );
        $id->delete();
        return response()->json([
            'message' => "Successfully deleted coupon!"
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
            $coupon = Coupon::paginate(intval($request->per_page));
        } else {
            $coupon = Coupon::all();
        }
        return response()->json([
            'message' => "Successfully fetched coupon",
            'meta' => $menuType
        ], 200);
    }
}
