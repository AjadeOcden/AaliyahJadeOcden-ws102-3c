<form action="/edit/<?php echo $users[0]->id; ?>" method ="post">

@csrf

<table>
        <tr>
            <td> <label for="">Student Name: </label></td>
            <td><input type="text" name="stud_name" value = '<?php echo $users[0]->name; ?>'  required  style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; width: 100%;"></td>
            <td>
            <input type="submit" value="update" style="display: inline-block; padding: 8px 12px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px;">
            </td>
            
        </tr>
</table>
   
 
    </form>