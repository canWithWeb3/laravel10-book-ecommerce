@extends("layouts.app")
@section("content")
    <section class="container my-5">
        <div class="row">
            <div class="col-md-9">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:48px">Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                            @if($cart->book)
                                <tr>
                                    <td class="p-0">
                                        <a href="{{ url('/book-detail/'.$cart->book->id) }}">
                                            <img width="100%" src="{{ $cart->book->image }}" alt="">
                                        </a>
                                    </td>
                                    <td>{{ $cart->book->name }}</td>
                                    <td style="width:98px;">$ 48</td>
                                    <td style="width:48px;">{{ $cart->count }}</td>
                                    <td style="width:98px;">
                                        <button data-id="{{ $cart->id }}" class="deleteCart btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"></div>
        </div>
    </section>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(document).ready(function(){
            $(".deleteCart").click(function(){
                const id = $(this).data("id");
                const btn = $(".btn");
                btn.attr('disabled','disabled')
                $.ajax({
                    type:'POST',
                    url:"{{ route('addToCart') }}",
                    data:{id:id},
                    success:function(data){
                        btn.removeAttr('disabled')
                        console.log
                        if(data == "notAuth"){
                            toastr.error("Giriş yapmadınız.")
                        }else if(data == "yes"){
                            toastr.success("Sepetinize eklendi.")
                            const cartCount = parseInt($("#cartCount").text().trim())
                            $("#cartCount").text(cartCount+1)
                        }
                    }
                });

            });
        })
    </script>
@endsection
