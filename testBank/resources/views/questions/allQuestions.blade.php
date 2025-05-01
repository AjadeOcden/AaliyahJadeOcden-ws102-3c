<h2>Subject: {{ $subject->sub_name }} ({{ $subject->sub_code }})</h2>
<p><strong>Total Questions:</strong> {{ count($questions) }}</p>
<a href="/question/{{ $subject->sub_name }}/{{ $subject->sub_code }}">add question</a> |
<a href="{{ route('testForm', ['sub_code' => $subject->sub_code]) }}">generate test</a>



<form method="GET" action="{{ route('sort') }}">
    <input type="hidden" name="sub_code" value="{{ $subject->sub_code }}">

    <select name="sort_by">
        <option value="">-- Filter by Term --</option>
        <option value="Midterm" {{ request('sort_by') == 'Midterm' ? 'selected' : '' }}>Midterm</option>
        <option value="Final" {{ request('sort_by') == 'Final' ? 'selected' : '' }}>Final</option>
    </select>

    <select name="order">
        <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
    </select>

    <button type="submit">Apply</button>
</form>

@if($questions->isEmpty())
    <p>No questions available.</p>
@else
    @foreach ($questions as $q)
        <div>
            <strong>{{ $q->question }}</strong><br>
            <ul>
                @foreach ($q->options as $opt)
                    <li>{{ $opt }}</li>
                @endforeach
            </ul>
            <p><strong>Answer:</strong> {{ $q->correct_answer }}</p>
        </div>

        <!-- Edit Link -->
        <a href="/editQuestion/{{ $q->id }}">Edit</a>

        <!-- Delete Form -->
        <form action="{{ route('deleteQuestion', ['id' => $q->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: none; border: none; color: red;">Delete</button>
        </form>
    @endforeach
@endif
