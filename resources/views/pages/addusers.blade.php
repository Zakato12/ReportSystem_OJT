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