<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #00274d, #00509e);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Logo Styles */
        .logo {
            width: 150px;
            height: auto;
            margin: 0 auto 15px;
            display: block;
        }

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            max-width: 350px; /* Reduced width */
            width: 90%;
            padding: 25px 20px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Heading */
        .form-container h2 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #444444;
            margin-bottom: 10px;
        }

        .form-container p {
            font-size: 1rem;
            color: #666666;
            margin-bottom: 20px;
        }

        /* Form Styles */
        .registration-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Form Group */
        .form-group {
            text-align: left;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: bold;
            color: #555555;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 10px 15px;
            font-size: 0.95rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: border 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.3);
            outline: none;
        }

        /* Error Message */
        .error-message {
            color: #d9534f;
            background: #fce4e4;
            border: 1px solid #f5c2c2;
            padding: 10px;
            border-radius: 4px;
            font-size: 0.85rem;
            text-align: left;
        }

        /* Submit Button */
        .submit-button {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .submit-button:hover {
            background-color: #357abd;
            transform: scale(1.03);
        }

        .submit-button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .form-container {
                padding: 15px;
            }

            .form-container h2 {
                font-size: 1.4rem;
            }

            .form-container p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="/images/Logo.jpg" alt="Infobloom Tech Solution Logo" class="logo" />
        <h2>Join the Aptitude Challenge</h2>
        <p>Register now to test your skills and shine!</p>
        <form action="{{ route('register.store') }}" method="POST" class="registration-form">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Enter your full name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required
                />
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Enter your email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
                />
            </div>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                    type="text"
                    name="number"
                    id="number"
                    placeholder="Enter your phone number"
                    class="form-control"
                    value="{{ old('number') }}"
                    required
                />
            </div>
            @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <button type="submit" class="submit-button w-100 mt-3">
                Register Now
            </button>
        </form>
    </div>
</body>
</html>
