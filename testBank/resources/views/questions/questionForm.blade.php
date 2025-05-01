<h1>{{$sub_name}}</h1>
<h3>ADD Question</h3>
<form method="POST" action="{{ route('addQuestion') }}">
    @csrf
    <label>Question:</label>
    <input type="text" name="question"><br>

    <label>Option 1:</label>
    <input type="text" name="options[]"><br>
    <label>Option 2:</label>
    <input type="text" name="options[]"><br>
    <label>Option 3:</label>
    <input type="text" name="options[]"><br>
    <label>Option 4:</label>
    <input type="text" name="options[]"><br>

    <label>Correct Answer:</label>
    <select name="correct_answer" required>
        <option value="">Select Correct Answer</option>
        <option value="0">Option 1</option>
        <option value="1">Option 2</option>
        <option value="2">Option 3</option>
        <option value="3">Option 4</option>
    </select><br>

    <label>Term:</label>
    <input type="radio" name="term" value="Midterm" required> Midterm
    <input type="radio" name="term" value="Final" required> Final


    <input type="hidden" name="sub_code" value="{{ $sub_code }}">
    <br>
    <button type="submit">Add Question</button>
</form>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

