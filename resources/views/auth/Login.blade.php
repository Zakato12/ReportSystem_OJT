<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
    <title>Login - Ticketing System</title>
</head>
<body>
    <section>
        <main class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="login-wrapper container">
                <div class="row g-0 rounded overflow-hidden shadow-lg bg-white bg-opacity-10 backdrop-blur">

                    <!-- Image -->
                    <div class="col-md-6 d-none d-md-block">
                        <img src="{{ asset('images/login-side.jpg') }}" alt="Login Illustration" class="img-fluid h-100 w-100 object-fit-cover">
                    </div>

                    <!-- Form -->
                    
                    <div class="col-md-6 col-12 p-5 text-white">
                        <h2 class="text-center mb-4">Log in</h2>

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input 
                                    type="text"
                                    class="form-control bg-white bg-opacity-50 text-dark @error('username') is-invalid @enderror"
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="Enter your username"
                                />
                                @error('username')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    type="password"
                                    class="form-control bg-white bg-opacity-50 text-dark @error('password') is-invalid @enderror"
                                    id="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                />
                                @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <style>
            body {
                background-image: url('/images/bg.webp');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                font-family: 'Poppins', sans-serif;
                margin: 0;
                padding: 0;
            }

            .login-wrapper {
                max-width: 960px;
            }

            .login-wrapper .row {
                border-radius: 1rem;
                overflow: hidden;
            }

            h2 {
                font-weight: 600;
                font-size: 2rem;
            }

            .form-control {
                padding: 0.5rem 1rem;
                font-size: 1rem;
                border-radius: 0.5rem;
                border: 1px solid #ccc;
                transition: border-color 0.3s, box-shadow 0.3s;
            }

            .form-control:focus {
                border-color: #3b82f6;
                box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
                outline: none;
            }

            .btn-primary {
                margin-top: 20px;
                background-color: #3b82f6;
                border: none;
                font-weight: 500;
                padding: 0.60rem;
                border-radius: 0.5rem;
                color: #fff;
                transition: background-color 0.3s ease;
                font-size: 1rem;
            }

            .btn-primary:hover,
            .btn-primary:focus {
                background-color: #2563eb;
            }

            .alert {
                font-size: 0.9rem;
                padding: 0.75rem 1rem;
                margin-bottom: 1.5rem;
                border-radius: 0.5rem;
                color: #721c24;
                background-color: #f8d7da;
                border: 1px solid #f5c6cb;
            }

            .error-message {
                font-size: 0.85rem;
                color: #dc3545;
                margin-top: 0.25rem;
            }

            .object-fit-cover {
                object-fit: cover;
                height: 100%;
            }
        </style>
    </section>
</body>
</html>
