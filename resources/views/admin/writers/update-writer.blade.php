@extends("layouts.admin")
@section("content")
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h4">Update Writer</h1>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <form action="{{ url("/admin/writers/" . $writer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                {{-- image --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error("image") is-invalid @enderror">
                    @error("image")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error("name") is-invalid @enderror"
                        value="{{ old("name", $writer->name) }}">
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
