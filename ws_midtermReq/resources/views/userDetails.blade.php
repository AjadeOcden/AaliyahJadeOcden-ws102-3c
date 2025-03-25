<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #333;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .user-info {
            text-align: left;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .user-info p {
            margin: 8px 0;
            font-size: 16px;
            color: #333;
        }

        .label {
            font-weight: 600;
            color: #007BFF;
        }

        .edit-btn {
            display: inline-block;
            padding: 12px 20px;
            background: #007BFF;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0px 4px 8px rgba(0, 123, 255, 0.3);
        }

        .edit-btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0px 6px 12px rgba(0, 123, 255, 0.4);
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>User Details</h2>

        @isset($user)
        <div class="user-info">
            <p><span class="label">First Name:</span> {{ $user->fname }}</p>
            <p><span class="label">Last Name:</span> {{ $user->lname }}</p>
            <p><span class="label">Email:</span> {{ $user->email }}</p>
        </div>
        @else
            <p style="color: #888;">User details not available.</p>
        @endisset

        <a href="/userEdit/{{$user->id}}" class="edit-btn">Edit Profile</a>
        <a href="/logout" class="edit-btn">Logout</a>
    </div>

</body>
</html>
