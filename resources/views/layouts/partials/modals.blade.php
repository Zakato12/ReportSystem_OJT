@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast align-items-center text-success bg-withe border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex" data-bs-dismiss="toast">
                <div class="toast-body mt-3">
                    <div>
                        <h6 class="text-center" style="font-weight: 100;"><i class="fa fa-check ms-4 me-4" style="font-size: 15px;"></i>{{ session('success') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="modal fade modal-lg" id="changepassModal" tabindex="-1" aria-labelledby="cheangepass" aria-hidden="true" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="cheangepassModalLabel">Change Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Change Password Body --}}
                <div class="modal-body">
                    <form id="cheangepassForm" method="POST"  action="{{url('/dashboard')}}" aria-label="Add Ticket">
                        {{csrf_field()}}
                        <div class="mb-3">
                                <label for="currpassword" class="form-label">Current Password</label>
                                <input 
                                    type="password"
                                    class="form-control bg-white bg-opacity-50 text-dark @error('password') is-invalid @enderror"
                                    id="currpassword"
                                    name="currpassword"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your Current password"
                                />
                            </div>
                             <div class="mb-3">
                                <label for="newpassword" class="form-label">New Password</label>
                                <input 
                                    type="password"
                                    class="form-control bg-white bg-opacity-50 text-dark @error('newpassword') is-invalid @enderror"
                                    id="newpassword"
                                    name="newpassword"
                                    required
                                    placeholder="Enter your New password"
                                />
                            </div>
                             <div class="mb-3">
                                <label for="confimrpassword" class="form-label">Confirm Password</label>
                                <input 
                                    type="password"
                                    class="form-control bg-white bg-opacity-50 text-dark @error('confirmpassword') is-invalid @enderror"
                                    id="confirmpassword"
                                    name="confirmpassword"
                                    required
                                    placeholder="Confirm password"
                                />
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Open Add Modal
            document.getElementById('openchangepassModal').addEventListener('click', function() {
                var changepassword = new bootstrap.Modal(document.getElementById('changepassModal'));
                changepassword.show();
            });
    });
    </script>