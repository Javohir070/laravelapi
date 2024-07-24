<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Stock;
use App\Models\UserAddress;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function index()
    {
        if(request()->has('status_id'))
        {
            // return $this->korinish(OrderResource::collection(
            //     auth()->user()->orders()->where("status_id", request("status_id"))->paginate(5)
            // ));
        }

        return $this->korinish(OrderResource::collection(auth()->user()->orders));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $sum = 0;
        // $products = Product::query()->limit(2)->get();
        $products = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);

        foreach($request['products'] as $requestProduct){
           $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
           $product->quantity = $requestProduct['quantity'];

           if(
            $product->stocks()->find($requestProduct['stock_id']) &&
            $product->stocks()->find($requestProduct['stock_id'])->quantity > $requestProduct['quantity']

           ){
            $productWithStock = $product->withStock($requestProduct['stock_id']);
            $productResource = new ProductResource($productWithStock);
            
            $sum += $productResource['price'];
            $products[] = $productResource->resolve();
           }else{
            //   $requestProduct["we_heve"] = $product->stocks()->find($requestProduct['stock_id'])->quantity; 
              $notFoundProducts[] = $requestProduct;
           }
        }
        if($notFoundProducts === [] && $products !== [] && $sum !== 0){

            $order = Order::create([
                'user_id'=> auth()->id(),
                'comment'=> $request->comment,
                'delivery_method_id'=> $request->delivery_method_id,
                'payment_type_id'=> $request->payment_type_id,
                'status_id' => in_array($request['payment_type_id'],[1,2])? 1 : 10,
                'sum'=> $sum,
                'address' => $address,
                'products' => $products,
            ]);
            if ($order) {
                foreach($products as $product){
                    $stock = Stock::find($product['inventory'][0]['id']);
                    $stock->quantity -= $product['order_quantity'];
                    $stock->save();
                }
            }
            return $this->response("saqlandi" ,$order);
        }else{
            return $this->error("bu buyirtmadan qolmagan",['yoq_bundan_productan' => $notFoundProducts,]);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
