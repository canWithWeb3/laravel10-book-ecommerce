@extends("layouts.admin")
@section("content")
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h4">Create Category</h1>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error("name") is-invalid @enderror"
                        value="{{ old("name") }}">
                    @error("name")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
