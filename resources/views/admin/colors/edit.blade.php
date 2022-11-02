@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Color
                        <a href="{{ url('admin/colors/') }}" class="btn btn-danger btn-sm  text-white float-end">
                            Back</a>
                    </h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    {{-- FORM  --}}
                    <form action="{{ url('admin/colors/' . $color->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Color Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $color->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="">Color Code</label>
                            <input type="text" name="code" class="form-control" value="{{ $color->code }}">
                        </div>

                        <div class="mb-3">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" {{ $color->status == '1' ? 'checked' : '' }}
                                style="width:50px; height: 50px;" />
                            Checked=Hidden,
                            Unchecked=Visible
                        </div>

                        <div class="mb-3 float-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
