@extends('layouts.admin')

@section('title', 'Career Applications')
@section('page-title', 'Career Applications')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Career Applications</h3>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Experience</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Resume</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                    <tr>
                        <td>{{ ($applications->currentPage() - 1) * $applications->perPage() + $loop->iteration }}</td>
                        <td>{{ $app->created_at->format('d M Y') }}</td>
                        <td><strong>{{ $app->name }}</strong></td>
                        <td><span class="badge badge-info">{{ ucfirst($app->position_applied) }}</span></td>
                        <td>{{ $app->experience }} Years</td>
                        <td>{{ $app->email }}</td>
                        <td>{{ $app->mobile }}</td>
                        <td>
                            @if($app->resume_path)
                            <a href="{{ asset('storage/' . $app->resume_path) }}" target="_blank" class="badge badge-success">
                                <i class="fas fa-file-download"></i> Download
                            </a>
                            @else
                            <span class="badge badge-gray">No File</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <form action="{{ route('admin.careers.destroy', $app->id) }}" method="POST" class="delete-form">
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
            {{ $applications->links() }}
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
                text: "You won't be able to revert this!",
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
