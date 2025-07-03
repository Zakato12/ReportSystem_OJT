<div class="container">
    {{-- Add Ticket --}}
    <div class="modal fade modal-md" id="addaccountsModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="adduserModalLabel">Add Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Add Ticket Body --}}
                <div class="modal-body">
                     <form id="addaccountsForm" method="POST"  action="{{url('/addaccounts')}}">
                         {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group ">
                                        <label class="required-field p-3 fw-semibold" for="accountni">Account Name</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="account_name" 
                                            id="accountni" 
                                            required 
                                            placeholder="Account Name">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Open Modal 1
            document.getElementById('openaddAccount').addEventListener('click', function() {
                var addUserModal = new bootstrap.Modal(document.getElementById('addaccountsModal'));
                addUserModal.show();
            });
        });
    </script>