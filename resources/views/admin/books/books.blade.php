@extends("layouts.admin")
@section("content")
    @include("includes.delete-modal")

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h4">Books</h1>
        <a href="{{ url("/admin/books/create") }}" class="btn btn-success"><i class="fas fa-plus"></i> Create</a>
    </div>

    <hr>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="th-image">Image</th>
                <th>Name</th>
                <th class="th-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td class="p-0"><img src="{{ $book->image }}" class="td-image"></td>
                    <td>{{ $book->name }}</td>
                    <td>
                        <a href="{{ url("/admin/books/" . $book->id . "/edit") }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Update</a>
                        <button type="button"
                            data-url="{{ "/admin/books/$book->id" }}"
                            class="delete-btn btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section("scripts")
    <script src="{{ asset("js/delete-modal.js") }}"></script>
@endsection
