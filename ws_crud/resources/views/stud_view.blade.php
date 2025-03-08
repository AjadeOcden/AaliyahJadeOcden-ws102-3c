<a href="/insert" style="display: inline-block; padding: 8px 12px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px;">ADD NEW</a>
<br><br>

<table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
    <tr style="background-color: #f2f2f2;">
        <td style="padding: 8px; font-weight: bold;">ID</td>
        <td style="padding: 8px; font-weight: bold;">Name</td>
        <td style="padding: 8px; font-weight: bold;">Action</td>
        <td style="padding: 8px; font-weight: bold;">Action</td>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $user->id }}</td>
        <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $user->name }}</td>
        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
            <a href="delete/{{ $user->id }}" style="color: red; text-decoration: none;">Delete</a>
        </td>
        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
            <a href="edit/{{ $user->id }}" style="color: blue; text-decoration: none;">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
