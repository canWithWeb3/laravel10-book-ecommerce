@extends("layouts.app")
@section("content")
    <div class="container my-5">
        <div class="col-xl-5 col-lg-8 col-12 mx-auto">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="{{ url("/register") }}" method="POST">
                        @csrf
                        {{-- username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error("username") is-invalid @enderror"
                                value="{{ old("username") }}" required>
                            @error("username")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                        {{-- repassword --}}
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Repassword:</label>
                            <input type="password" name="repassword" id="repassword"
                                class="form-control" required>
                        </div>


                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
