@extends('layouts.admin')

@section('title', 'Add Category')
@section('page-title', 'Add New Standard & Section')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Standard (e.g., 10th)</label>
                        <input type="text" name="standard" class="form-control" placeholder="Enter Standard (e.g., 10th)" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Section (e.g., A)</label>
                        <input type="text" name="section" class="form-control" placeholder="A, B, C..." required>
                    </div>
                </div>
            </div>
            <div class="form-actions mt-4">
                <button type="submit" class="btn btn-primary">Save Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
