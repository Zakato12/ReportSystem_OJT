<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
    <title>Login| Ticketing System</title>
</head>
<body>
    <section>
    <main class="d-flex justify-content-center align-items-start min-vh-100">
        <div class="login-container">
            <h2>Log in</h2>
            <form method="POST" action="{{url('/login')}}" >
            {{csrf_field()}}
            <div class="mb-3">
                <label for="usename" class="form-label">Username</label>
                <input 
                        type="username"
                        class="form-control @error('username') is-invalid @enderror"
                        id="username"
                        name= "username"
                        value="{{old('username')}}"
                        required
                        autocomplete="username"
                        placeholder="Enter your username"
                        autofocus
                />
                
                @error('email')
                    <div class="error-message" role="alert">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        autofocus
                    />
                    @error('password')
                        <div class="error-message" role="alert">{{$message}}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </main>
    <style>
        body {
            background-color:rgb(105, 150, 195);
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin-top: 100px;
            background:rgb(255, 255, 255);
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
            padding: 2.5rem;
        }
        h1 {
            font-weight: 700;
            font-size: 2.5rem;
            color: #111827;
            margin-bottom: 1rem;
        }
        label {
            font-weight: 600;
            color: #374151;
        }
        .form-control:focus {
            box-shadow: 0 0 4px 2px rgba(59, 130, 246, 0.3);
            border-color: #3b82f6;
        }
        .btn-primary {
            background: #3b82f6;
            border: none;
            font-weight: 600;
            margin-top: .5rem;
            padding: 0.6rem 1.2rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
            width: 100%;
        }
    </style>
</section>
</body>
</html> 
    
