@extends("layouts.app")
@section("content")
    <div class="container my-5">
        <div class="col-xl-5 col-lg-8 col-12 mx-auto">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <div><strong>Admin girişi için:</strong></div>
                        <div><strong>Email:</strong> admin@gmail.com</div>
                        <div><strong>Email:</strong> admin1</div>
                    </div>
                    <form action="{{ url("/login") }}" method="POST">
                        @csrf
                        {{-- email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error("email") is-invalid @enderror"
                                value="{{ old("email") }}" required>
                            @error("email")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error("password") is-invalid @enderror"
                                value="{{ old("password") }}" required>
                            @error("password")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
