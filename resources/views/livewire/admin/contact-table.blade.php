
<div class="container mt-4">
    <div class="mb-3">
        <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search by name or email...">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->user->name }}</td>
                        <td>{{ $contact->user->email }}</td>
                        <td>{{ $contact->message }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Contact Found</td>
                    </tr>
                @endforelse
            </tbody>
           
        </table>
    </div>

</div>
