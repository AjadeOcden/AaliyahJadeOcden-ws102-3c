<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 50px;
            font-size: 2.5rem;
            letter-spacing: 1px;
        }

        /* Add New Book Button Container */
        .button-container {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Add New Book Button */
        a {
            display: inline-block;
            padding: 12px 30px;
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        /* Book List Styles */
        ul {
            list-style-type: none;
            padding: 0;
            max-width: 800px;
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        li {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.1rem;
            transition: box-shadow 0.3s ease;
        }

        li:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        /* Book Information Styles */
        .book-info {
            flex-grow: 1;
        }

        .book-info span {
            display: block;
            margin-bottom: 8px;
            color: #7f8c8d;
        }

        /* Edit Button */
        a.edit {
            color:rgb(255, 255, 255);
            font-weight: 500;
            text-decoration: none;
            margin-right: 20px;
            transition: color 0.3s ease;
        }

        a.edit:hover {
            color: #1f5f89;
        }

        /* Delete Button */
        button {
            padding: 15px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c0392b;
        }

        /* Logout Button */
form.logout-form {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 1000;
}

form.logout-form input[type="submit"] {
    padding: 10px 25px;
    background-color: #e74c3c;
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-transform: uppercase;
}

form.logout-form input[type="submit"]:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}

form.logout-form input[type="submit"]:active {
    background-color: #bd3a29;
    transform: scale(1);
}

    </style>
</head>
<body>
        <form action="{{route('logout')}}" method="post" class="logout-form">
                @csrf
                <input type="submit" value="Logout">
            </form>

    <h1>All Books</h1>

    <!-- Center the Add New Book Button -->
    <div class="button-container">
        <a href="{{ route('books.create') }}">Add New Book</a>
    </div>

    <ul>
        @foreach ($books as $book)
            <li>
                <div class="book-info">
                    <strong>{{ $book->title }}</strong>
                    <span>by {{ $book->author }}</span>
                    <span>{{ $book->published_date }}</span>
                </div>

                <div class="actions">
                    <a href="{{ route('books.edit', $book->id) }}" class="edit">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

</body>
</html>
