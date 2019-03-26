@extends('.layouts.app') 
@section('content')
<section id="cart_items">
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
        @endif {{-- if cart is empty --}} @if (App\Cart::count()>0)
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart_datas as $cart_data)

                    <tr>
                        <td class="cart_product">
                            {{-- @foreach($image_products as $image_product)
                            <a href=""><img src="{{url('products/small',$image_product->image)}}" alt="" style="width: 100px;"></a>                            @endforeach --}}
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cart_data->name}}</a></h4>
                            {{--
                            <p>{{$cart_data->product_code}} | {{$cart_data->size}}</p> --}}
                        </td>
                        <td class="cart_price">
                            <p>${{$cart_data->price}}</p>
                        </td>
                        <td class="product_quantity">
                            <p>{{$cart_data->stock}}</p>
                        </td>
                        {{--
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data->stock_quantity}}" autocomplete="off"
                                    size="2"> @if($cart_data->quantity>1)
                                <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}"> - </a>                                @endif
                            </div>
                        </td> --}}
                        <td class="cart_total">
                            <p class="cart_total_price">$ {{$cart_data->price*$cart_data->stock}}</p>
                        </td>
                        <td class="cart_delete">
                            <form action="{{route('cart.destroy',$cart_data->id)}}" method="post">
                                @csrf {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

            {{-- <a href="/" class="btn btn-dark my-2">Continue shopping</a> --}}

            <div class="checkout">
                <div class="card">
                    <div class="container py-5">
                        Tax(13%):

                    </div>
                </div>
                <form action="" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark">Proceed to checkout</button>
                </form>
            </div>
            @else
            <div class="text-center">
                <h3 class="py-3"><img src="{{asset('images/no-cart.png')}}" alt="No cart">No item found</h3>
                <a href="/" class="btn btn-outline-dark">Go shopping</a>
            </div>
            @endif {{--
            <form action="{{route('order')}}">
                <a href=""></a>
            </form> --}}
        </div>
    </div>
</section>
<!--/#cart_items-->
@endsection