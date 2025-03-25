<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
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
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .submit-btn:hover {
            background: #0056b3;
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
        <h2>Edit User Details</h2>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <div class="form-container">
            <form action="/edit/{{ $user[0]->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="{{$user[0]->fname}}">
                    @error('fname') <p class="error">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="{{ $user[0]->lname}}">
                    @error('lname') <p class="error">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="roleId">Role</label>
                    <select name="roleId" id="roleId">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user[0]->email}}">
                    @error('email') <p class="error">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    @error('password') <p class="error">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="submit-btn">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
