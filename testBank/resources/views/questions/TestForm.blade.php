<h2>Generate Quiz</h2>
<form action="{{ route('generateTest', ['sub_code' => $subject->sub_code]) }}" method="GET">
    @csrf

    <label for="">School Year: </label>
    <input type="text" name="sy" required>
    <br>
    <label for="">Semester: </label>
    <select name="sem" required>
        <option value="1st Semester">1st Semester</option>
        <option value="2nd Semester">2nd Semester</option>
    </select><br>

    <label for="num_items">Number of Items:</label>
    <input type="number" name="num_items" min="1" required><br><br>

    <label for="term">Select Term:</label>
    <select name="term" required>
        <option value="">-- Choose Term --</option>
        <option value="Midterm">Midterm</option>
        <option value="Final">Final</option>
    </select><br><br>

    <input type="hidden" name="sub_code" value="{{ $subject->sub_code }}">

    <button type="submit">Generate</button>
</form>
