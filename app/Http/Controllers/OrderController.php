<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
     /**
     * Create a new order instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $order = new Order;
        $request->validate([
            'order_number' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'menu_item_id' => 'required|exists:menu_items,id',
            'net_price' => 'required|numeric',
        ]);
        $order->fill($request->input())->save();
        $order->save();
        return response()->json([
            'message' => "Successfully created order!"
        ], 200);
    }

     /**
     * Create a bulk order instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function bulk(Request $request)
    {
        foreach($request["order"] as $key => $row) {
            $this->create(new Request($row));
        }
        return response()->json([
            'message' => "Successfully placed order!",
        ], 200);
    }

    /**
     * Fetches orders
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function orders(Request $request)
    {
        if(count($request->all()) > 0) {
            $order = Order::with([
                "menuItem.menuType",
                "user"
            ])
            ->orderBy('order_number', 'DESC')
            ->paginate(intval($request->per_page));
        } else {
            $order = Order::with([
                "menuItem.menuType",
                "user"
            ])
            ->orderBy('order_number', 'DESC')
            ->get();
        }
        return response()->json([
            'message' => "Successfully fetched orders",
            'meta' => $order
        ], 200);
    }
    /**
     * Fetches order
     *
     * @param  [string] page
     * @param  [string] per_page
     * @return [string] message
     */
    public function order(Request $request, $data)
    {
        if(count($request->all()) > 0) {
            $order = Order::with([
                "menuItem.menuType",
                "user"
            ])
            ->where('user_id', $data)
            ->orderBy('order_number', 'DESC')
            ->paginate(intval($request->per_page));
        } else {
            $order = Order::with([
                "menuItem.menuType",
                "user"
            ])
            ->where('user_id', $data)
            ->orderBy('order_number', 'DESC')
            ->get();
        }
        return response()->json([
            'message' => "Successfully fetched orders",
            'meta' => $order
        ], 200);
    }
}
