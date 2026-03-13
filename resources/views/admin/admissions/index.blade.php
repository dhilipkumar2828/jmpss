@extends('layouts.admin')

@section('title', 'Admissions')
@section('page-title', 'Admissions')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Admission Inquiries</h3>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Student Name</th>
                        <th>Parent Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admissions as $admission)
                    <tr>
                        <td>{{ ($admissions->currentPage() - 1) * $admissions->perPage() + $loop->iteration }}</td>
                        <td>{{ $admission->created_at->format('d M Y') }}</td>
                        <td><strong>{{ $admission->student_name }}</strong></td>
                        <td>{{ $admission->parent_name }}</td>
                        <td>{{ $admission->email }}</td>
                        <td>{{ $admission->mobile }}</td>
                        <td><span class="badge badge-info">{{ strtoupper($admission->grade_applying) }}</span></td>
                        <td>
                            <span class="badge {{ $admission->status == 'pending' ? 'badge-warning' : 'badge-success' }}">
                                {{ ucfirst($admission->status) }}
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ route('admin.admissions.show', $admission->id) }}" class="btn btn-outline btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.admissions.destroy', $admission->id) }}" method="POST" class="delete-form">
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
            {{ $admissions->links() }}
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
