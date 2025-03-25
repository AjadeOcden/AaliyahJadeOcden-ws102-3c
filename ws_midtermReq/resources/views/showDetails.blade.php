<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
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
            transition: background 0.3s, transform 0.2s;
        }
        .sidebar a:hover {
            background: #3282B8;
            transform: scale(1.05);
        }
        .logout {
            width: 90%;
            margin-bottom: 20px;
        }
        .container {
            margin-left: 270px;
            padding: 30px;
            width: calc(100% - 270px);
            background: white;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .details-container {
            max-width: 500px;
            width: 100%;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .details-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .details-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .details-value {
            padding: 10px;
            background: #e9ecef;
            border-radius: 5px;
            display: block;
        }
        .btn-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        .edit-btn {
            background: #007bff;
            color: white;
        }
        .edit-btn:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
        .delete-btn {
            background: #dc3545;
            color: white;
        }
        .delete-btn:hover {
            background: #b02a37;
            transform: scale(1.05);
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
        <h2>User Details</h2>

        <div class="details-container">
            <div class="details-group">
                <span class="details-label">First Name:</span>
                <span class="details-value">{{ $user[0]->fname }}</span>
            </div>
            <div class="details-group">
                <span class="details-label">Last Name:</span>
                <span class="details-value">{{ $user[0]->lname }}</span>
            </div>
            <div class="details-group">
                <span class="details-label">Role:</span>
                <span class="details-value">{{ $user[0]->role}}</span>
            </div>
            <div class="details-group">
                <span class="details-label">Email:</span>
                <span class="details-value">{{ $user[0]->email }}</span>
            </div>
            <div class="btn-container">
                <a href="/edit/{{ $user[0]->id }}" class="btn edit-btn">Edit</a>
                <a href="/delete/{{ $user[0]->id }}" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </div>
        </div>
    </div>
</body>
</html>
