
<h1>Edit Question</h1>
<form method="POST" action="{{ route('updateQuestion', $question->id) }}">
    @csrf
    @method('PUT')

    <label>Question:</label>
    <input type="text" name="question" value="{{ old('question', $question->question) }}"><br>

    <label>Option 1:</label>
    <input type="text" name="options[]" value="{{ old('options.0', json_decode($question->options)[0]) }}"><br>

    <label>Option 2:</label>
    <input type="text" name="options[]" value="{{ old('options.1', json_decode($question->options)[1]) }}"><br>

    <label>Option 3:</label>
    <input type="text" name="options[]" value="{{ old('options.2', json_decode($question->options)[2]) }}"><br>

    <label>Option 4:</label>
    <input type="text" name="options[]" value="{{ old('options.3', json_decode($question->options)[3]) }}"><br>

    <label>Correct Answer:</label>
    <select name="correct_answer" required>
        <option value="">Select Correct Answer</option>
        <option value="0" {{ old('correct_answer', $question->correct_answer) == 0 ? 'selected' : '' }}>Option 1</option>
        <option value="1" {{ old('correct_answer', $question->correct_answer) == 1 ? 'selected' : '' }}>Option 2</option>
        <option value="2" {{ old('correct_answer', $question->correct_answer) == 2 ? 'selected' : '' }}>Option 3</option>
        <option value="3" {{ old('correct_answer', $question->correct_answer) == 3 ? 'selected' : '' }}>Option 4</option>
    </select><br>

    <label>Term:</label>
    <input type="radio" name="term" value="Midterm" {{ old('term', $question->term) == 'Midterm' ? 'checked' : '' }}> Midterm
    <input type="radio" name="term" value="Final" {{ old('term', $question->term) == 'Final' ? 'checked' : '' }}> Final<br>

    <input type="hidden" name="sub_code" value="{{ $question->sub_code }}">

    <button type="submit">Update Question</button>
</form>
