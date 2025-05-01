<!DOCTYPE html>
<html>
<head>
    <title>Generated Quiz - {{ $subject->sub_name }}</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 14px;
            margin: 40px;
            line-height: 1.6;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        .header-info {
            margin-bottom: 20px;
        }

        .header-info p {
            margin: 4px 0;
        }

        ol {
            padding-left: 20px;
        }

        li {
            margin-bottom: 20px;
        }

        .option {
            display: block;
            margin-left: 20px;
        }
        body {
      font-family: Arial, sans-serif;
    }
    .header {
      text-align: center;
    }
    .logo-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 10px 50px;
    }
    .logo {
      width: 80px;
      height: auto;
    }
    .info {
      margin-left: 50px;
      margin-top: 20px;
    }
    </style>
</head>
<body>

<div class="logo-row">
    <img src="PSU-Logo.png" alt="PSU Logo" class="logo">
    <img src="PSU-Logo.png" alt="PSU Logo" class="logo">
  </div>

  <div class="header">
    <h4>Republic of the Philippines</h4>
    <h2>Pangasinan State University</h2>
    <h3>{{ $subject->sub_code }}: {{ $subject->sub_name }}</h3>
    @if($term == "Midterm")
    <h4>MIDTERM EXAMINATION</h4>
    @elseif($term == "Final")
    <h4>FINAL EXAMINATION</h4>
    @endif
    <p>{{ $semester }} S.Y. {{ $sy }}</p>
  </div>

 
    <div class="header-info">
        <p>NAME:__________________________________ </p>
        <p>COURSE AND SECTION:____________________ </p>
        <p>DATE:_____________ </p>

    </div>
    <p>I. Multiple Choice</p>
    <p>Choose the best and answer and write the letter before the number</p>
    <ol style="list-style: none; padding-left: 0;">
    @foreach($questions as $index => $question)
        <li style="margin-bottom: 10px;">
            <div>
                <span style="display: inline-block; width: 30; border-bottom: 1px solid #000; margin-right: 5px;"></span>
                {{ $index + 1 }}. {{ $question->question }}
            </div>

            @if(is_array($question->options) && count($question->options) === 4)
                <ul style="list-style-type: none; padding-left: 50px;">
                    @foreach($question->options as $key => $option)
                        <li>{{ chr(65 + $key) }}. {{ $option }}</li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ol>

</body>
</html>
