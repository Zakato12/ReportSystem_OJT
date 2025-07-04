<div class="container">
    {{-- Add Ticket --}}
    <div class="modal fade modal-md" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="adduserModalLabel">New User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Add Ticket Body --}}
                <div class="modal-body">
                     <form id="adduserForm" method="POST"  action="{{url('/adduser')}}" aria-label="Add User">
                        {{csrf_field()}}
                            
                                <div class="row">
                                    <div class="form-group ">
                                        <label class="required-field p-3 fw-semibold" for="user_fname">First Name</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="user_fname" 
                                            id="UserfName" 
                                            required 
                                            placeholder="User First Name">
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="form-group ">
                                        <label class="p-3  fw-semibold" for="user_mname">middle Name</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="user_mname" 
                                            id="UsermName" 
                                            required 
                                            placeholder="User Middle Name">
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="form-group ">
                                        <label class="required-field p-3 fw-semibold" for="user_lname">Last Name</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="user_lname" 
                                            id="UserlName" 
                                            required 
                                            placeholder="User Last Name">
                                    </div>
                                </div>
                            
                            
                                   <div class="row">
                                    <div class="form-group ">
                                        <label class="required-field p-3 fw-semibold" for="user_email">User Email</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="user_email" 
                                            id="UserEmail" 
                                            required 
                                            placeholder="Email">
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="form-group ">
                                        <label class="required-field p-3 fw-semibold " for="user_password">Password</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="user_password" 
                                            id="UserPassword" 
                                            required 
                                            placeholder="Password">
                                    </div>
                                </div>
                            
                            <div class="clearfix p-2">
                                <button type="button" class=" btn btn-mute float-end" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-primary float-sm-end" id="addSuccess">Add</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($users as $user)
        <div class="modal fade modal-lg" id="editUserModal{{ $user->user_id }}" aria-labelledby="editUserModal{{ $user->user_id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-text text-center" id="edituserModalTitle{{ $user->user_id }}">Edit user</h4>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- Add user Body --}}
                    <div class="modal-body">
                        <form id="adduserForm" method="POST" action="{{route('edituser', $user->user_id)}}">
                            {{csrf_field()}}
                                    @method('POST')
                                <div class="row">
                                    <div class="col-4">
                                            <div class="form-group position-relative">
                                                <label class="p-3 fw-semibold" for="datecreated{{ $user->user_id }}">User Name</label>
                                                <input type="text" class="form-control" name="user_fname" id="user_fname" value="{{$user->user_fname}}" required aria-label="User Name">
                                            </div>
                                    </div>
                                    <div class="col-4">
                                            <div class="form-group position-relative">
                                                <label class="p-3 fw-semibold" for="datecreated{{ $user->user_id }}">User Middle Name</label>
                                                <input type="text" class="form-control" name="user_mname" id="user_mname" value="{{$user->user_mname}}" required aria-label="User Mname">
                                            </div>
                                    </div>
                                     <div class="col-4">
                                            <div class="form-group position-relative">
                                                <label class="p-3 fw-semibold" for="datecreated{{ $user->user_id }}">User Last Name</label>
                                                <input type="text" class="form-control" name="user_lname" id="user_lname" value="{{$user->user_lname}}" required aria-label="user Lastname">
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                            <div class="form-group position-relative">
                                                <label class="p-3 fw-semibold" for="datecreated{{ $user->user_id }}">User Email</label>
                                                <input type="text" class="form-control" name="user_email" id="user_email" value="{{$user->user_email}}" required aria-label="User Email">
                                            </div>
                                    </div>
                                    <div class="col-6">
                                            <div class="form-group position-relative">
                                                <label class="p-3 fw-semibold" for="datecreated{{ $user->user_id }}">Date Created</label>
                                                <input type="text" class="form-control" name="created_at" id="created_at" value="{{$user->created_at}}" required aria-label="Date Created" disabled>
                                            </div>
                                    </div>
                                </div>
                                <div class="mt-4 text-end">
                                    <button class="btn btn-success ms-1" type="submit">Update</button>
                                    <a class="btn btn-secondary" href="{{ route('viewuser') }}">Back</a>

                                </div>
                        </form> 
                    </div>               
            </div>
        </div>
    </div>

@endforeach
<style>
.required-field::after {
    content: " *";
    color: #e74c3c;
}
</style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Open Modal 1
            document.getElementById('openaddUser').addEventListener('click', function() {
                var addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));
                addUserModal.show();
            });
        });
    </script>