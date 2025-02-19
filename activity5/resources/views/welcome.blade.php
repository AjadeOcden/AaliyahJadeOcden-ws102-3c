<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocden_Activity 5</title>
</head>
<body>

    <!-- so here ginamit ko yung modulo para madetermine id even or add siya -->
    <p>Value1:
    @if($num1 % 2 == 0)
     <!-- so if even siya iooutput siya yung number as orange -->
      <span style="color: orange">{{ $num1 }}</span>
    @elseif($num1 % 2 == 1)
   <!-- else id odd siya magiging color blue  -->
       <span style="color: blue">{{ $num1 }}</span>
    @endif  
    </p>
    

<!-- same logic lang ang ginawa ko sa num1 dito sa num2 -->
    <p>Value2: 
    @if($num2 % 2 == 0)
       <span style="color: orange">{{ $num2 }}</span>
    @elseif($num2 % 2 == 1)
       <span style="color: blue">{{ $num2 }}</span>
    @endif
    </p>
    
<!-- ito is to output yung operation galing sa url -->
    <p>Operation: {{ $op }}</p>


<!-- dito naman is yung pag output ng result -->
    <p style="color: green; display: inline">Result (Displayed in Green):</p>
    @if($op == "add")
       <!-- if add yung operation, it will display the result sa loob ng container, gumamit na ako ng inline css -->
        <div style="background-color: green; padding: 5px 10px; color: white; display: inline-block; margin-left: 10px; border: 2px solid black">
            <p style="color: white; margin: 0;">{{ $num1 + $num2 }}</p>
            <!-- sa pag output na ako nag compute -->
        </div>

    @elseif($op == "subtract")
    <!-- same logic lang yung ginamit ko pinalitan ko lang ng operation -->
        <div style="background-color: green; padding: 5px 10px; color: white; display: inline-block; margin-left: 10px; border: 2px solid black">
            <p style="color: white; margin: 0;">{{ $num1 - $num2 }}</p>
        </div>

    @elseif($op == "multiply")
    <!-- this is para sa multiply -->
        <div style="background-color: green; padding: 5px 10px; color: white; display: inline-block; margin-left: 10px; border: 2px solid black">
            <p style="color: white; margin: 0;">{{ $num1 * $num2 }}</p>
        </div>

    @elseif($op == "divide")
    <!-- this is para sa divide -->
        @if($num1 == 0 || $num2 == 0)
        <!-- if is of the 2 numbers ay 0 mag ddisplay yung error, so nilagay ko nalang siya inside ng red container para mas kita -->
        <div style="background-color: red; padding: 5px 10px; color: white; display: inline-block; margin-left: 10px; border: 2px solid black">
            <p style="color: white; margin: 0;">Error: numbers can't be divided</p>
        </div>
        @else
        <!-- if kaya naman i divide, same logic lang sa previous operator ang ginamit ko -->
        <div style="background-color: green; padding: 5px 10px; color: white; display: inline-block; margin-left: 10px; border: 2px solid black">
            <p style="color: white; margin: 0;">{{ $num1 / $num2 }}</p>
        </div>
        @endif
    @else
    <div style="background-color: red; padding: 5px 10px; color: white; display: inline-block; margin-left: 10px; border: 2px solid black">
            <p style="color: white; margin: 0;">Error: invalid operator</p>
        </div>
    @endif
    
</body>
</html>
