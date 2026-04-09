@extends('layouts.admin')

@section('title', 'Feedback Management')
@section('page-title', 'Feedback Management')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Parents Feedback</h3>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Photo</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Rating</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ ($feedbacks->currentPage() - 1) * $feedbacks->perPage() + $loop->iteration }}</td>
                        <td>
                            @if($feedback->photo_path)
                                <img src="{{ Str::startsWith($feedback->photo_path, 'uploads/') ? asset($feedback->photo_path) : asset('storage/' . $feedback->photo_path) }}" alt="Photo" style="width: 40px; height: 40px; border-radius: 8px; object-fit: cover; border: 1px solid #ddd;">
                            @else
                                <div style="width: 40px; height: 40px; border-radius: 8px; background: #f1f5f9; display: grid; place-items: center; font-size: 18px; color: #cbd5e1; border: 1px solid #ddd;">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $feedback->created_at->format('d M Y') }}</td>
                        <td><strong>{{ $feedback->name }}</strong><br><small>{{ $feedback->email }}</small></td>
                        <td>{{ $feedback->mobile }}</td>
                        <td>
                            @for($i=1; $i<=5; $i++)
                                <i class="fa{{ $i <= $feedback->rating ? 's' : 'r' }} fa-star" style="color: #FFD700; font-size: 12px;"></i>
                            @endfor
                        </td>
                        <td title="{{ $feedback->message }}">{{ Str::limit($feedback->message, 50) }}</td>
                        <td>
                            @if($feedback->admin_response)
                                <span class="badge badge-success">Responded</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ route('admin.feedback.show', $feedback->id) }}" class="btn btn-primary btn-sm" title="View & Reply">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($feedbacks->isEmpty())
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 20px; color: var(--text-muted);">No feedback records found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $feedbacks->links() }}
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
