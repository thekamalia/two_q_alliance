@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Company</h1>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('companies.create') }}" class="btn btn-primary">Create New Company</a>
        </div>

        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($companies as $company)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                @if ($company->logo)
                                    <img src="{{ Storage::url($company->logo) }}" alt="Logo" width="50"
                                        height="50">
                                @else
                                    <span>No Logo</span>
                                @endif {{ $company->name }}
                            </td>
                            <td>{{ $company->email }}</td>
                            <td>
                                <a href="{{ $company->website }}" target="_blank">
                                    {{ $company->website }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{ route('companies.destroy', $company) }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No companies yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($company->logo)
                                    <img src="{{ Storage::url($company->logo) }}" alt="Logo" width="50"
                                        height="50">
                                @else
                                    <span>No Logo</span>
                                @endif {{ $company->name }}
                            </td>
                            <td>{{ $company->email }}</td>
                            <td>
                                <a href="{{ $company->website }}" target="_blank">
                                    {{ $company->website }}
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{ route('companies.destroy', $company) }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No companies yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table> --}}
        </div>
    </div>
@endsection
