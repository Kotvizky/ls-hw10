<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(6);
        $pagination = $products->links('gameLayout.pagenation-links');
        $data = [
            'products'      => $products,
            'categories'    => Category::get(),
            'pagination'    => $pagination,
            'ordersCount'   => $this->orderCount(),
        ];
        return view('main.main',$data);
    }

    public function categories($id)
    {
        $products = Product::where('category_id',$id)->orderBy('id','desc')->paginate(6);
        $pagination = $products->links('gameLayout.pagenation-links');
        $data = [
            'products'      => $products,
            'categories'    => Category::get(),
            'pagination'    => $pagination,
            'ordersCount'   => $this->orderCount(),
        ];
        return view('main.main',$data);
    }

    public function products($id)
    {
        try{
            $item = Product::with('category')->findOrFail($id);
        } catch (Exception $e){
            return abort(404);
        }

        $data = [
            'categories'=> Category::get(),
            'product'   => $item,
            'products'  => Product::orderBy('id','desc')->paginate(3),
            'ordersCount'   => $this->orderCount(),
            'purchase'     => [
                'attributes' => [
                    'method' => 'post',
                    'action' => '/orders/store',
                ],
            ]
        ];

        return view('main.product',$data);
    }

    public function orders()
    {
        $orders = Order::with('product')
            ->where('user_id',Auth::user()->id)
            ->orderBy('id','desc')
            ->paginate(4);
        $pagination = $orders->links('gameLayout.pagenation-links');

        $data = [
            'orders'        => $orders,
            'pagination'    => $pagination,
            'categories'    => Category::get(),
            'ordersCount'   => $this->orderCount(),
        ];

        return view('main.index-order',$data);
    }

    private function orderCount()
    {
        if (Auth::user() !== null) {
            return Order::where('user_id',Auth::user()->id)->count();
        } else {
            return 0;
        }
    }

}

