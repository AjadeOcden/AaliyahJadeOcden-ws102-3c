<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #0F4C75;
            color: white;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar .top {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sidebar .menu {
            width: 100%;
            flex-grow: 1;
        }
        .sidebar a {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            width: 90%;
            margin: 5px auto;
            border-radius: 5px;
            text-align: center;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background: #3282B8;
        }
        .logout {
            width: 90%;
            /* background: #dc3545; */
            margin-bottom: 20px;
        }
        .logout:hover {
            background: #3282B8;
        }
        .container {
            margin-left: 270px;
            padding: 30px;
            width: calc(100% - 270px);
            background: white;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        .search-box {
            padding: 8px;
            width: 300px;
            margin-right: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .search-sort-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .search-box, .sort-box {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 16px;
    }
    .search-btn {
        padding: 10px 15px;
        border: none;
        background: #007bff;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }
    .search-btn:hover {
        background: #0056b3;
    }
        input[type="submit"] {
            padding: 8px 15px;
            border: none;
            background: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background:rgb(0, 92, 179);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <div class="top">Admin Panel</div>
            <div class="menu">
                <a href="/registration">Add User</a>
                <a href="/viewList">Manage Users</a>
            </div>
        </div>
        <a href="/logout" class="logout">Logout</a>
    </div>
    <div class="container">
        <h2>Manage Users</h2>
        
        <div class="search-sort-container">
            <!-- Search Form -->
            <form action="/search" method="GET" style="display: flex; align-items: center;">
                <label>Search: </label>
                <input type="text" id="key" name="skey" class="search-box" placeholder="Search users..." value="{{ request('skey') ?? '' }}" oninput="this.form.submit()"> 
                <label>Sort by </label>
                <select name="key" class="sort-box" onchange="this.form.submit()">
                    <option value="users.fname" {{ request('key') == 'users.fname' ? 'selected' : '' }}>Firstname</option>
                    <option value="users.lname" {{ request('key') == 'users.lname' ? 'selected' : '' }}>Lastname</option>
                    <option value="roles.role" {{ request('key') == 'roles.role' ? 'selected' : '' }}>Role</option>
                    <option value="users.email" {{ request('key') == 'users.email' ? 'selected' : '' }}>Email</option>
                    <option value="users.id" {{ request('key') == 'users.id' ? 'selected' : '' }}>User ID</option>
                </select>

                <select name="sort" class="sort-box" onchange="this.form.submit()">
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </form>
        </div>
        @if(isset($users) && count($users) > 0)
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fname }}</td>
                <td>{{ $user->lname }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="edit/{{ $user->id }}" style="color: #28a745; text-decoration: none; font-weight: bold; margin-right: 5px;">Edit</a>
                    <a href="delete/{{ $user->id }}" style="color: #dc3545; text-decoration: none; font-weight: bold; margin-right: 5px;">Delete</a>
                    <a href="showDetails/{{ $user->id }}" style="color: #007bff; text-decoration: none; font-weight: bold;">View Details</a>
                </td>
            </tr>
            @endforeach
        </table>
        @else
            <p>No users found.</p>
        @endif
    </div>
</body>
</html>
