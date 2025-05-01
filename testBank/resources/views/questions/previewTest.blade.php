<!DOCTYPE html>
<html>
<head>
    <title>Preview Questions</title>
</head>
<body>
    <h1>Preview Random Questions</h1>
    <!-- Button to download PDF -->
    <a href="{{ url('/downloadTest/' . $sub_code) }}">
    <button>Download PDF</button>
    </a>

    <!-- PDF preview inside iframe -->
    <iframe src="{{ url('/previewTestPdf/' . $sub_code) }}" width="100%" height="600px"></iframe>



    <br><br>

    

</body>
</html>
