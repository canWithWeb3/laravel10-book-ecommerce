@extends("layouts.app")
@section("content")
    <section class="container my-5">
        <div class="card">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $book->image }}" alt="" class="img-fluid w-100">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h1 class="h2">{{ $book->name }}</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti quos vitae asperiores magni eum amet ipsam in, distinctio, aperiam molestiae nisi culpa, accusamus hic error voluptas. Perferendis odio fugiat nostrum omnis eligendi mollitia totam ab ducimus, atque nulla vero? Error.</p>
                        <button type="button" data-id="{{ $book->id }}" class="addToCart btn btn-success">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(document).ready(function(){
            $(".addToCart").click(function(){
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
