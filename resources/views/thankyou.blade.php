@extends('layouts.app')

@section('content')
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

    .thank-you-card {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        text-align: center;
        padding: 40px 20px;
        max-width: 600px;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .thank-you-card .logo img {
        display: block;
        margin: 0 auto 30px;
        max-width: 150px; /* Increase the size of the logo */
        width: auto;
        height: auto;
    }

    .thank-you-card h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .thank-you-card p {
        font-size: 1rem;
        color: #333;
        margin-bottom: 20px;
    }

    .btn-home {
        display: inline-block;
        background-color: #4a90e2;
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-home:hover {
        background-color: #357abd;
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .thank-you-card {
            padding: 20px;
        }

        .thank-you-card h1 {
            font-size: 2rem;
        }

        .thank-you-card p {
            font-size: 1rem;
        }

        .thank-you-card .logo img {
            max-width: 120px; /* Adjust size for smaller screens */
        }
    }

    @media (max-width: 480px) {
        .thank-you-card {
            padding: 15px;
        }

        .thank-you-card h1 {
            font-size: 1.8rem;
        }

        .thank-you-card p {
            font-size: 0.9rem;
        }

        .thank-you-card .logo img {
            max-width: 100px; /* Adjust size for the smallest screens */
        }
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="thank-you-card">
        <div class="logo">
            <img src="/images/Logo.jpg" alt="Infobloom Tech Solution Logo" />
        </div>
        <h1>Thank You, {{ $student->name }}!</h1>
        <p>We appreciate your time and effort. Your responses have been recorded successfully.</p>
        <a href="{{ route('register') }}" class="btn-home">Go to Registration Page</a>
    </div>
</div>
@endsection
