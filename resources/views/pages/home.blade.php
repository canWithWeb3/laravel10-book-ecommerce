@extends("layouts.app")
@section("content")
    <main>
        <section class="position-relative">
            <img class="home-header-img" src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="">
            <div class="home-header-content">
                <h1 class="h1 mb-4">Upto 75% Off</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, suscipit assumenda <br> sapiente omnis natus impedit quo ullam. Nobis?</p>
                <a href="" class="btn btn-success">Shop Now</a>
            </div>
        </section>

        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-xl-3 col-6 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-truck h2 text-success me-3"></i>
                        <div>
                            <h5>Free Shipping</h5>
                            <p class="mb-0 text-secondary">Order Over $99</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-lock h2 text-success me-3"></i>
                        <div>
                            <h5>Secure Payment</h5>
                            <p class="mb-0 text-secondary">100 Secure Payment</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-rotate-left h2 text-success me-3"></i>
                        <div>
                            <h5>Easy Returns</h5>
                            <p class="mb-0 text-secondary">10 Days Returns</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-phone h2 text-success me-3"></i>
                        <div>
                            <h5>24/7 Support</h5>
                            <p class="mb-0 text-secondary">Call Us Anytime</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container my-5">
            <div class="section-title"><span>Featured Books</span></div>
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
        </section>

        <section class="home-subscribe mb-5">
            <div class="black"></div>
            <form class="content" method="POST">
                <h4 class="mb-3">Subscribe  For Latest Updates</h4>
                <input type="text" class="form-control mb-4" placeholder="Enter your email">
                <button class="btn btn-success">Subscribe</button>
            </form>
        </section>

        <section class="container text-center mb-5">
            <div class="section-title"><span>Client's Reviews</span></div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <img width="110" style="height:110px; object-fit:cover;" src="https://cdn.pixabay.com/photo/2017/01/03/09/18/woman-1948939_1280.jpg" class="img-fluid rounded-circle mb-3" alt="">
                            <h4 class="mb-3">John Deo</h4>
                            <p class="text-secondary">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, sapiente autem. Repellat exercitationem aliquid soluta maiores dolor rem!</p>
                            <div class="text-success">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <img width="110" style="height:110px; object-fit:cover;" src="https://cdn.pixabay.com/photo/2015/07/20/12/53/gehlert-852762_1280.jpg" class="img-fluid rounded-circle mb-3" alt="">
                            <h4 class="mb-3">John Deo</h4>
                            <p class="text-secondary">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, sapiente autem. Repellat exercitationem aliquid soluta maiores dolor rem!</p>
                            <div class="text-success">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <img width="110" style="height:110px; object-fit:cover;" src="https://cdn.pixabay.com/photo/2017/06/09/17/11/model-2387582_1280.jpg" class="img-fluid rounded-circle mb-3" alt="">
                            <h4 class="mb-3">John Deo</h4>
                            <p class="text-secondary">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, sapiente autem. Repellat exercitationem aliquid soluta maiores dolor rem!</p>
                            <div class="text-success">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mb-5">
            <div class="section-title"><span>Our Blogs</span></div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <img src="https://cdn.pixabay.com/photo/2014/09/05/18/32/old-books-436498_1280.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <h4 class="mb-2">Blog Title 1</h4>
                            <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="" class="btn btn-success">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <img src="https://cdn.pixabay.com/photo/2016/04/05/03/18/prayer-1308663_1280.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <h4 class="mb-2">Blog Title 2</h4>
                            <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="" class="btn btn-success">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <img src="https://cdn.pixabay.com/photo/2015/09/05/07/28/writing-923882_1280.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <h4 class="mb-2">Blog Title 3</h4>
                            <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="" class="btn btn-success">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
