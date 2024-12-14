@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Edit Company</h1>
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

        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $company->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $company->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo (100x100 min)</label>
                <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
                @if ($company->logo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Current Logo" width="100">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="url" id="website" name="website" class="form-control"
                    value="{{ old('website', $company->website) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Company</button>
        </form>
    </div>
@endsection
