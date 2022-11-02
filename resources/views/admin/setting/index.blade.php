@extends('layouts.admin')

@section('title', 'Admin Setting')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif

            <form action="{{ url('/admin/settings') }}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="web">Website Name</label>
                                <input type="text" name="website_name" id="web" class="form-control"
                                    value="{{ $setting->website_name ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="web_url">Website URL</label>
                                <input type="text" name="website_url" id="web_url"
                                    value="{{ $setting->website_url ?? '' }}" class="form-control">
                            </div>

                            {{-- Ovo ne radi  --}}
                            <div class="col-md-12 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}"
                                    class="form-control" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keyword" class="form-control" rows="3">
                                    {{ $setting->meta_keyword ?? '' }} 
                                </textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">
                                    {{ $setting->meta_description ?? '' }}
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>


                {{-- Information --}}
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-3">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $setting->address ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone1">Phone 1*</label>
                                <input type="text" name="phone1" id="phone1" class="form-control"
                                    value="{{ $setting->phone1 ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone2">Phone No. 2</label>
                                <input type="text" name="phone2" id="phone2" class="form-control"
                                    value="{{ $setting->phone2 ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email1">Email Id 1</label>
                                <input type="text" name="email1" id="email1" class="form-control"
                                    value="{{ $setting->email1 ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email2">Email Id 2</label>
                                <input type="text" name="email2" id="email2" class="form-control"
                                    value="{{ $setting->email2 ?? '' }}">
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Social Media --}}
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-3">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebook">Facebook (Optional)</label>
                                <input type="text" name="facebook" id="facebook" class="form-control"
                                    value="{{ $setting->facebook ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="twitter">Twitter (Optional)</label>
                                <input type="text" name="twitter" id="twitter" class="form-control"
                                    value="{{ $setting->twitter ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="instagram">Instagram (Optional)</label>
                                <input type="text" name="instagram" id="instagram" class="form-control"
                                    value="{{ $setting->instagram ?? '' }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="youtube">Youtube (Optional)</label>
                                <input type="text" name="youtube" id="youtube" class="form-control"
                                    value="{{ $setting->youtube ?? '' }}">
                            </div>


                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>

        </div>
    </div>
@endsection
