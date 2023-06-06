@extends("layouts.admin")
@section("content")
    @include("includes.delete-modal")

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h4">Publishers</h1>
        <a href="{{ url("/admin/publishers/create") }}" class="btn btn-success"><i class="fas fa-plus"></i> Create</a>
    </div>

    <hr>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th class="th-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td>{{ $publisher->name }}</td>
                    <td>
                        <a href="{{ url("/admin/publishers/" . $publisher->id . "/edit") }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Update</a>
                        <button type="button"
                            data-url="{{ "/admin/publishers/$publisher->id" }}"
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
