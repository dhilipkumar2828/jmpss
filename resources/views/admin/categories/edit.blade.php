@extends('layouts.admin')

@section('title', 'Edit Category')
@section('page-title', 'Update Standard & Section')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Standard (e.g., 10th)</label>
                        <input type="text" name="standard" class="form-control" value="{{ $category->standard }}" placeholder="Enter Standard (e.g., 10th)" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Section (e.g., A)</label>
                        <input type="text" name="section" class="form-control" value="{{ $category->section }}" required>
                    </div>
                </div>
            </div>
            <div class="form-actions mt-4">
                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
