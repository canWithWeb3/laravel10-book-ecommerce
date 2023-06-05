@extends("layouts.admin")
@section("content")
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h4">Categories</h1>
        <a href="{{ url("/admin/categories/create") }}" class="btn btn-success"><i class="fas fa-plus"></i> Create</a>
    </div>

    <hr>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Can</td>
                <td></td>
            </tr>
        </tbody>
    </table>
@endsection
