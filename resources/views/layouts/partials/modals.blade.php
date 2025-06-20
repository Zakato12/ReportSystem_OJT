{{-- <div class="container">
    <!-- Button to Open Modal -->
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-white p-5">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                    Login
                </button>
            </div>
        </div>
    </div>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login to Your Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" action="{{route('auth.login')}}" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group position-relative">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                            <span class="position-absolute" id="togglePassword" style="right: 12px; top: 38px; cursor: pointer;">👁️</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
            });
            // Form submission handling
            const loginForm = document.getElementById('loginForm');
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Clear previous messages
                $('#messageModal').modal('hide');
                // Basic client-side validation
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                if (!email || !password) {
                    showMessage('Please fill in all fields', 'danger');
                    return;
                }
                if (!validateEmail(email)) {
                    showMessage('Please enter a valid email address', 'danger');
                    return;
                }
                // Simulate form submission (in a real app, this would be an AJAX call or regular form submission)
                showMessage('Login successful! Redirecting...', 'success');
                
                setTimeout(() => {
                    loginForm.submit();
                }, 1500);
            });

            function showMessage(message, type) {
                const modalMessageContent = document.getElementById('modalMessageContent');
                modalMessageContent.textContent = message;
                $('#messageModal').modal('show');
            }
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
            // Check for URL parameters to show error/success messages (simulating Laravel validation errors)
            const urlParams = new URLSearchParams(window.location.search);
            const errorParam = urlParams.get('error');
            const successParam = urlParams.get('success');
            if (errorParam) {
                showMessage(decodeURIComponent(errorParam), 'danger');
            }
            if (successParam) {
                showMessage(decodeURIComponent(successParam), 'success');
            }
        });
    </script> --}}