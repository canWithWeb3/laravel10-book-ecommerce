@extends("layouts.admin")
@section("content")
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h4">Update Publisher</h1>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <form action="{{ url("/admin/publishers/" . $publisher->id) }}" method="POST">
                @csrf
                @method("PATCH")
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error("name") is-invalid @enderror"
                        value="{{ old("name", $publisher->name) }}">
                    @error("name")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
