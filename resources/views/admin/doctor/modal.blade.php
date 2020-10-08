<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Doctor information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><img src="{{ asset('images') }}/{{ $user->image }}" class="table-user-thumb" alt="" width="200"></p>
                <p class="badge badge-pill badge-dark">Role: {{ $user->role->name }}</p>
                <p>Gender: {{ $user->gender }}</p>
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Address: {{ $user->address }}</p>
                <p>Phone number: {{ $user->phone_number }}</p>
                <p>Department: {{ $user->department }}</p>
                <p>Education: {{ $user->education }}</p>
                <p>About: {{ $user->description }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
