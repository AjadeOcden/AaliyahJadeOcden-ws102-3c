<form action="/create" method = "post">
    @csrf
<table>
        <tr>
            <td><label> Enter Student Name:</label></td>
            <td><input type="text" name="stud_name"  required  style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; width: 100%;"></td>
            <td>
                <input type="submit" value="add student" style="display: inline-block; padding: 8px 12px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px;">
            </td>
            
        </tr>
</table>

</form>

