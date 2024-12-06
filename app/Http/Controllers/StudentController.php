<?php 

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show the aptitude test question-by-question
    public function showTest(Request $request)
    {
        $studentId = session('student_id');

        if (!$studentId) {
            return redirect()->route('register');
        }

        // Generate 25 questions if not already stored in the session
        if (!session()->has('questions')) {
            $questions = collect([
                // Quantitative Aptitude
                ['id' => 1, 'question' => "What is the next number in the series: 3, 6, 12, 24, ?", 'options' => ['30', '36', '48', '60'], 'correct_answer' => '48'],
                ['id' => 2, 'question' => "If the sum of two numbers is 20 and their product is 96, what are the numbers?", 'options' => ['8 and 12', '10 and 10', '4 and 16', '6 and 14'], 'correct_answer' => '8 and 12'],
                ['id' => 3, 'question' => "A train 150 meters long crosses a pole in 15 seconds. What is its speed?", 'options' => ['30 km/h', '36 km/h', '45 km/h', '54 km/h'], 'correct_answer' => '36 km/h'],
                ['id' => 4, 'question' => "The average of five numbers is 25. If one number is removed, the average becomes 24. What is the number removed?", 'options' => ['28', '30', '27', '35'], 'correct_answer' => '28'],
                ['id' => 5, 'question' => "A man walks 2 km in 15 minutes. What is his speed in km/h?", 'options' => ['6 km/h', '7 km/h', '8 km/h', '4 km/h'], 'correct_answer' => '8 km/h'],
                // Logical Reasoning
                ['id' => 6, 'question' => "Find the odd one out: 64, 81, 100, 121, 144, 169, 200.", 'options' => ['64', '121', '200', '169'], 'correct_answer' => '200'],
                ['id' => 7, 'question' => "If ‘TREE’ is coded as ‘USFF’, how is ‘WOOD’ coded?", 'options' => ['XPPE', 'XNPE', 'XOOE', 'VNNB'], 'correct_answer' => 'XPPE'],
                ['id' => 8, 'question' => "Which number replaces the question mark? 8, 27, ?, 125, 216", 'options' => ['36', '48', '64', '81'], 'correct_answer' => '64'],
                ['id' => 9, 'question' => "If ALL=12, BOX=39, what is BAT?", 'options' => ['31', '36', '33', '30'], 'correct_answer' => '33'],
                ['id' => 10, 'question' => "A is the father of B. C is A’s sister. D is C’s son. How is D related to B?", 'options' => ['Cousin', 'Uncle', 'Brother', 'Nephew'], 'correct_answer' => 'Nephew'],
                // IT Fundamentals
                ['id' => 11, 'question' => "What does RAM stand for?", 'options' => ['Read Access Memory', 'Random Access Memory', 'Real Access Memory', 'Rapid Access Memory'], 'correct_answer' => 'Random Access Memory'],
                ['id' => 12, 'question' => "What is the purpose of an IP address?", 'options' => ['To identify a device on a network', 'To connect to a website', 'To provide internet speed', 'To share files'], 'correct_answer' => 'To identify a device on a network'],
                ['id' => 13, 'question' => "Which of the following is NOT an operating system?", 'options' => ['Linux', 'Windows', 'Chrome', 'MS Excel'], 'correct_answer' => 'MS Excel'],
                ['id' => 14, 'question' => "What is the output of 5 + 2 * 3 in programming?", 'options' => ['21', '11', '17', '15'], 'correct_answer' => '11'],
                ['id' => 15, 'question' => "Which HTTP method is used to update data on a server?", 'options' => ['GET', 'POST', 'PUT', 'DELETE'], 'correct_answer' => 'PUT'],
                // Programming Concepts
                ['id' => 16, 'question' => "What is the full form of OOP?", 'options' => ['Objective Oriented Programming', 'Object-Oriented Programming', 'Oriented Objective Programming', 'Object Official Programming'], 'correct_answer' => 'Object-Oriented Programming'],
                ['id' => 17, 'question' => "Which data structure works on the principle of FIFO?", 'options' => ['Stack', 'Queue', 'Array', 'Tree'], 'correct_answer' => 'Queue'],
                ['id' => 18, 'question' => "What is the time complexity of QuickSort in the worst case?", 'options' => ['O(n)', 'O(n log n)', 'O(n^2)', 'O(log n)'], 'correct_answer' => 'O(n^2)'],
                ['id' => 19, 'question' => "What does let do in JavaScript?", 'options' => ['Declares a variable with block scope', 'Declares a constant', 'Declares a function', 'Declares a global variable'], 'correct_answer' => 'Declares a variable with block scope'],
                ['id' => 20, 'question' => "In React, which hook is used to fetch data?", 'options' => ['useState', 'useRef', 'useEffect', 'useMemo'], 'correct_answer' => 'useEffect'],
                // General IT Knowledge
                ['id' => 21, 'question' => "Which company created the C programming language?", 'options' => ['Google', 'AT&T Bell Labs', 'Microsoft', 'IBM'], 'correct_answer' => 'AT&T Bell Labs'],
                ['id' => 22, 'question' => "Which of these is an example of NoSQL databases?", 'options' => ['MySQL', 'MongoDB', 'Oracle', 'SQLite'], 'correct_answer' => 'MongoDB'],
                ['id' => 23, 'question' => "What does DNS stand for?", 'options' => ['Data Name Server', 'Domain Name System', 'Domain Number System', 'Data Network System'], 'correct_answer' => 'Domain Name System'],
                ['id' => 24, 'question' => "Which protocol is used to send emails?", 'options' => ['FTP', 'HTTP', 'SMTP', 'SNMP'], 'correct_answer' => 'SMTP'],
                ['id' => 25, 'question' => "What does the CSS property float do?", 'options' => ['Makes elements float in the center', 'Aligns elements to the left or right', 'Changes the opacity of elements', 'Positions elements absolutely'], 'correct_answer' => 'Aligns elements to the left or right'],
            ]);
        
            session(['questions' => $questions, 'current_index' => 0]);
        }
        
        // Get the current question
        $currentIndex = session('current_index');
        $questions = session('questions');

        if ($currentIndex >= $questions->count()) {
            return redirect()->route('test.submit'); // Redirect to submission if test is over
        }

        $question = $questions[$currentIndex];

        return view('test', compact('question', 'studentId', 'currentIndex'));
    }

    // Save answer and move to the next question
    public function nextQuestion(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'answer' => 'required|string',
            'question_id' => 'required|integer',
        ]);

        // Save the answer
        $answers = session('answers', []);
        $answers[$validated['question_id']] = $validated['answer'];
        session(['answers' => $answers]);

        // Move to the next question
        $currentIndex = session('current_index');
        session(['current_index' => $currentIndex + 1]);

        return redirect()->route('test.show');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'number' => 'required|numeric',
        ]);

        // Create a new student record
        $student = Student::create($validatedData);

        // Store the student's ID in the session
        session(['student_id' => $student->id]);

        // Redirect to the test page
        return redirect()->route('test.show');
    }

    // Submit the test and calculate the score
    public function submitTest()
    {
        $studentId = session('student_id');
        $answers = session('answers');
        $questions = session('questions');
    
        if (!$studentId || !$answers || !$questions) {
            return redirect()->route('register');
        }
    
        // Calculate the score by comparing the student's answers with the correct ones
        $score = 0;
    
        foreach ($answers as $questionId => $studentAnswer) {
            // Find the question by its ID
            $question = collect($questions)->firstWhere('id', $questionId);
    
            // Check if the question exists and compare the student's answer with the correct answer
            if ($question && isset($question['correct_answer']) && $studentAnswer === $question['correct_answer']) {
                $score++;
            }
        }
    
        // Update the student's score in the database
        $student = Student::find($studentId);
        $student->score = $score;
        $student->save();
    
        // Clear session data
        session()->forget(['student_id', 'questions', 'current_index', 'answers']);
    
        return view('thankyou', ['student' => $student]);
    }
    

    

    // Show the registration form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle student registration
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'number' => 'required|numeric',
        ]);

        $student = Student::create($validatedData);

        // Store the student's ID in session
        session(['student_id' => $student->id]);

        return redirect()->route('test.show');
    }
}
