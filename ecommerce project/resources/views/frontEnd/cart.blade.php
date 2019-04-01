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
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart_datas as $cart_data)

                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 col-md-2 hidden-xs ">
                                    <img src="http://placehold.it/100x100" alt="..." class="img-responsive" />
                                </div>
                                <div class="col-sm-10 col-md-10">
                                    <h4 class="nomargin">{{$cart_data->name}}</h4>
                                    <p>{{$cart_data->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{$cart_data->price}}</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="1">
                        </td>
                        <td data-th="Subtotal" class="text-center">{{$cart_data->price*$cart_data->quantity}}</td>

                        {{--
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data->stock_quantity}}" autocomplete="off"
                                    size="2"> @if($cart_data->quantity>1)
                                <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}"> - </a>                                @endif
                            </div>
                        </td> --}}

                        <td class="Action">
                            <form action="{{route('cart.destroy',$cart_data->id)}}" method="post">
                                @csrf {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <td><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                    <td>
                        <a class="btn btn-dark check_out" href="{{route('checkout.index')}}"><i class="d-inline mr-1 fas fa-shopping-basket"></i>CheckOut</a>
                    </td>
                    </tr>
                </tfoot>

            </table>


            @else
            <div class="text-center">
                <h3 class="py-3"><img src="{{asset('images/no-cart.png')}}" alt="No cart">No item found</h3>
                <a href="/" class="btn btn-outline-dark">Go shopping</a>
            </div>
            @endif
        </div>
    </div>
</section>
<!--/#cart_items-->
@endsection