@extends('layouts.admin')

@section('title', 'Banners')
@section('page-title', 'Banners')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Homepage Banners</h3>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Banner</a>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Preview</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                    <tr>
                        <td>{{ $banner->sort_order }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $banner->image_path) }}" style="width: 100px; height: 50px; object-fit: cover; border-radius: 4px;">
                        </td>
                        <td>{{ $banner->title }}</td>
                        <td>{{ Str::limit($banner->subtitle, 30) }}</td>
                        <td>{{ $banner->button_link }}</td>
                        <td>
                            <span class="badge {{ $banner->is_active ? 'badge-success' : 'badge-gray' }}">
                                {{ $banner->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-outline btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $banners->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this banner!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endpush
