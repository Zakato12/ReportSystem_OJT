<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
    <title>Login | Laravel App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div clas= "d-flex justify-content-center">
    <div class="split-container">
        <!-- Image Side -->
        <div class="image-side">
            <div class="image-content">
                <h2>Welcome to Our Platform</h2>
                <p>Join thousands of satisfied users who trust our services for their daily needs. Simple, secure, and reliable.</p>
            </div>
        </div>

        <!-- Login Side -->
        <div class="login-side">
            <div class="login-container fade-in">
                <div class="login-header">
                    <h1>Login to Your Account</h1>
                    <p>Enter your credentials to access your dashboard</p>
                </div>

                <div class="login-form">
                    <!-- Error messages (for Laravel validation errors) -->
                    <div id="error-message" class="alert alert-error" style="display: none;"></div>
                    <div id="success-message" class="alert alert-success" style="display: none;"></div>

                    <form id="loginForm" action="/login" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                            <span class="password-toggle" id="togglePassword">👁️</span>
                        </div>

                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="/forgot-password" class="forgot-password">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>

                    <div class="login-footer">
                        Don't have an account? <a href="/register">Sign up</a>
                    </div>
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
            const errorMessage = document.getElementById('error-message');
            const successMessage = document.getElementById('success-message');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Clear previous messages
                errorMessage.style.display = 'none';
                successMessage.style.display = 'none';

                // Basic client-side validation
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                if (!email || !password) {
                    showError('Please fill in all fields');
                    return;
                }

                if (!validateEmail(email)) {
                    showError('Please enter a valid email address');
                    return;
                }

                // Simulate form submission (in a real app, this would be an AJAX call or regular form submission)
                // For demo purposes, we'll show a success message
                showSuccess('Login successful! Redirecting...');
                
                // In a real Laravel app, you would remove this setTimeout and let the form submit normally
                setTimeout(() => {
                    loginForm.submit();
                }, 1500);
            });

            function showError(message) {
                errorMessage.textContent = message;
                errorMessage.style.display = 'block';
            }

            function showSuccess(message) {
                successMessage.textContent = message;
                successMessage.style.display = 'block';
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
                showError(decodeURIComponent(errorParam));
            }

            if (successParam) {
                showSuccess(decodeURIComponent(successParam));
            }
        });
    </script>
</body>
</html>
