@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Create New Company</h1>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to List</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo (100x100 min)</label>
                <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="url" id="website" name="website" class="form-control" value="{{ old('website') }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Company</button>
        </form>
    </div>
@endsection
