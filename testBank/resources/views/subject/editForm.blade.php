<h2>EDIT SUBJECT</h2>
<form method="POST" action="{{ route('updateSub', $subject->id) }}">
    @csrf
    @method('PUT')

    <label>Subject code</label>
    <input id="sub_code" type="text" name="sub_code" value="{{ old('sub_code', $subject->sub_code) }}" required autofocus>
    @error('sub_code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label>Subject Name</label>
    <input id="sub_name" type="text" name="sub_name" value="{{ old('sub_name', $subject->sub_name) }}" required>
    @error('sub_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <button type="submit">Update</button>
</form>
