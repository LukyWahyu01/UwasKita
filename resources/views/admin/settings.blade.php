@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Settings</h1>
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="site_name">Site Name</label>
            <input type="text" name="site_name" id="site_name" class="form-control" value="{{ old('site_name', 'Your Site Name') }}">
        </div>

        <div class="form-group mb-3">
            <label for="site_email">Site Email</label>
            <input type="email" name="site_email" id="site_email" class="form-control" value="{{ old('site_email', 'example@site.com') }}">
        </div>

        <div class="form-group mb-3">
            <label for="maintenance_mode">Maintenance Mode</label>
            <select name="maintenance_mode" id="maintenance_mode" class="form-control">
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
