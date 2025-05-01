<form action="{{route('logout')}}"  method="POST">
    @csrf
    <input type="submit" value="logout">
</form>
<br>
<form method="GET" action="{{ route('search') }}">
    <input type="text" name="search" placeholder="Search subject..." value="{{ request('search') }}">

    <select name="sort_by">
        <option value="sub_code" {{ request('sort_by') == 'sub_code' ? 'selected' : '' }}>Subject Code</option>
        <option value="sub_name" {{ request('sort_by') == 'sub_name' ? 'selected' : '' }}>Subject Name</option>
        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date Created</option>
    </select>

    <select name="order">
        <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
    </select>

    <button type="submit">Apply</button>
</form>

<br>
<a href="/subject">add subject</a>

<div>
    <table border = 1>
        <thead>
            <tr>
                <td>subject Code</td>
                <td>Subject Name</td>
                <td colspan="3"></td>
            </tr>
        </thead>
        <tbody>
            @if($subjects->isEmpty())
                <tr>
                    <td colspan="3">No subjects available</td>
                </tr>
            @else
                @foreach($subjects as $sub)
                    <tr>
                        <td>{{$sub->sub_code}}</td>
                        <td>{{$sub->sub_name}}</td>
                        <td><a href="/allQuestions/{{$sub->sub_code}}">view</a></td>
                        <td><a href="editForm/{{$sub->id}}">edit</a></td>
                        <td>
                            <form action="{{ route('deleteSub', $sub->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
</td>
                    </tr>
                
                @endforeach
            @endif
            
        </tbody>
    </table>
</div>