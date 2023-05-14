@extends('restaurant.main')
@section('main')



<div class="page-content">
<div class="container-fluid">

<!-- start page title -->

<div class="order-page">
    <section class="container product_data">

        @foreach ($products as $key => $item)
            <div class="Card">
                <div class="card-image"><img src="{{ asset( $item->product_image ) }}" class="card-image"></div>
                <div class="container-card-text">
                    <div>
                        <h6 class="card-text">Name: {{ $item->name }}</h6>
                        <h6 class="card-text">Size: {{ $item->size }}</h6>
                        <h6 class="card-text">price: {{ $item->price }} </h6>
                    </div>
                    <a role="button" class="addToCartBtn add-btn" data-id="{{ $item->id }}" data-product_qty="{{ $item->quantity }}" ><p>+</p></a>



                </div>
            </div>
        @endforeach

        <div class="selected-food-list">
            @if ($carts)
                @foreach ($carts as $key => $value)
                    <div class="selected-food-card">
                        <img src="{{ asset($value['product_image']) }}" class="card-image">
                        <div style="margin-top: .4rem; margin-left: .4rem;">
                            <h6 class="selected-food-card-text">Size: {{ $value->id }}</h6>
                            <h6 class="selected-food-card-text">Price: {{ $value['price'] }}</h6>
                            <h6 class="selected-food-card-text">Quantity: {{ $value['quantity'] }}</h6>
                        </div>
                        <a href="{{ route('delete.from.cart', $value->id) }}" class="remove-btn"><p>-</p></a>
                    </div>
                @endforeach
            @else
                <h1>No item in cart</h1>
            @endif

            <div class="selected-food-footer">

                <h3>Total: </h3>
                <a href="" class="order-btn"><p>Place Order</p></a>

            </div>
        </div>


    </section>

</div>

<!-- end page title -->


</div>
<!-- end row -->
</div>
<script type="text/javascript">
    $(document).ready(function() {


        $('.addToCartBtn').click(function (e) {
            // e.preventDefault();

            var product_id = $(this).data("id");
            var product_qty = $(this).data("product_qty");

            console.log(product_qty);
            console.log(product_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty
                },
                success: function (response) {
                    alert(response.status);
                }
            });
        });


    });
</script>



@endsection
