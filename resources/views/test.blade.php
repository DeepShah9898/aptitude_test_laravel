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

    .card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        padding: 40px; /* Increased padding for larger form */
        width: 100%;
        max-width: 600px; /* Increased max width */
        position: relative;
        z-index: 1;
    }

    .card h2 {
        font-size: 2rem; /* Increased font size */
        font-weight: 600;
        color: #444;
        margin-bottom: 20px; /* Adjusted margin */
        text-align: center;
    }

    .card p {
        font-size: 1.1rem; /* Increased font size */
        color: #666;
        text-align: center;
        margin-bottom: 30px; /* Adjusted margin */
    }

    .form-check {
        margin-bottom: 15px; /* Adjusted margin */
    }

    .form-check-input {
        margin-right: 15px; /* Adjusted spacing */
    }

    .btn {
        display: block;
        width: 100%;
        padding: 10px; /* Increased padding */
        font-size: 1rem; /* Increased font size */
        font-weight: bold;
        color: #fff;
        background-color: #4a90e2;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
        background-color: #357abd;
        transform: scale(1.02);
        color: #fff;
    }

    /* Image Positioning */
    .decorative-image {
        position: absolute;
        bottom:10px;
        right: 20px;
        width: 150px; /* Adjust size for the larger form */
        height: auto;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .card {
            max-width: 90%;
            padding: 30px; /* Adjusted padding */
        }

        .card h2 {
            font-size: 1.8rem;
        }

        .card p {
            font-size: 1rem;
        }

        .btn {
            font-size: 1rem;
            padding: 12px;
        }

        .decorative-image {
            width: 130px;
        }
    }

    @media (max-width: 500px) {
        .card {
            padding: 20px;
        }

        .card h2 {
            font-size: 1.5rem;
        }

        .card p {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 1rem;
            padding: 10px;
        }

        .decorative-image {
            width: 100px;
        }
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('test.next') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ $studentId }}">
                <input type="hidden" name="question_id" value="{{ $question['id'] }}">
                <div class="mb-4">
                    <p style="font-size: 1.2rem; font-weight: bold; color: #555;">
                        Question {{ $currentIndex + 1 }}: {{ $question['question'] }}
                    </p>
                    @foreach($question['options'] as $option)
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name="answer" 
                            value="{{ $option }}" 
                            id="option_{{ $loop->index }}" 
                            required>
                        <label class="form-check-label" for="option_{{ $loop->index }}">
                            {{ $option }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn">Next</button>
            </form>
        </div>
        <img 
            src="{{ asset('images/logo.jpg') }}" 
            alt="Decorative Image" 
            class="decorative-image">
    </div>
</div>
@endsection
