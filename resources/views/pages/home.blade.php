@extends("layouts.app")
@section("content")
    <section class="position-relative">
        <img class="home-header-img" src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="">
        <div class="home-header-content">
            <h1 class="h1 mb-4">Upto 75% Off</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, suscipit assumenda <br> sapiente omnis natus impedit quo ullam. Nobis?</p>
            <a href="" class="btn btn-success">Shop Now</a>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-3">
                    <a href="{{ url('/book-detail/'.$book->id) }}">
                        <div class="card">
                            <img height="370" src="{{ $book->image }}" alt="" class="card-img-top object-fit-cover">
                            <div class="card-body">
                                <h1 class="h5 mb-3">{{ $book->name }}</h1>
                                @foreach($book->categories as $bookCategory)
                                        @php $category =  App\Models\Category::find($bookCategory->category_id) @endphp
                                        <p>{{ $category->name }}</p>
                                @endforeach
                                <button id="addToCart" class="btn btn-success">Add to Cart</button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
