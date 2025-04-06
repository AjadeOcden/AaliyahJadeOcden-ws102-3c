<h1>HOMEEEEEE</h1>

<a href="/books"> go to books</a>
<form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" value="logout">
</form>