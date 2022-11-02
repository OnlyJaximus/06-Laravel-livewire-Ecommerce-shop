@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Colors List
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm  text-white float-end">
                            Add Color</a>
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bprdered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Color Name</th>
                                <th>Color Color</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $item->id . '/edit') }}"
                                            class="btn btn-primary btn-sm">Edit</a>

                                        <a href="{{ url('admin/colors/' . $item->id . '/delete') }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
