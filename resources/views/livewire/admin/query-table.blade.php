<div class="container mt-4">
    <div class="mb-3">
        <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search by name or email...">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Topic</th>
                    <th>Content</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($queries as $query)
                    <tr>
                        <td>{{ $query->user?->name ?? 'N/A' }}</td>
                        <td>{{ $query->user?->email ?? 'N/A' }}</td>
                        <td>{{ $query->topic }}</td> <!-- Replace with actual column if different -->
                        <td>{{ $query->content }}</td>
                        <td>{{ $query->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No queries found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
