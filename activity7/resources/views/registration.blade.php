<h1>Personal Information</h1>

    @if(session("success"))
    <p style="color:green"> {{session("success")}}</p>
    @endif
    

    <!-- @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <p style="color:red"> {{ $error}}</p>
        @endforeach
    </ul>
    @endif -->

<form action="{{route('reg')}}" method="post">
    @csrf
    <table>
        <tr>
            <td><label> First Name:</label></td>
            <td><input type="text" name="fname" value="{{ old('fname')}}"></td>
            @error('fname')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td><label> Last Name:</label></td>
            <td><input type="text" name="lname" value="{{ old('lname')}}"></td>
            @error('lname')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td><label> Sex:</label></td>
            <td>
            <input type="radio" name="sex" value="male" > Male
            <input type="radio" name="sex" value="female" > Female
            @error('sex')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        <tr>
            <td><label for="mobileNo"> Mobile Number:</label></td>
            <td><input type="text" name="mobileNo" value="{{ old('mobileNo')}}" placeholder="0998-xxx-xxx / 0999-xxx-xxx / 0920-xxx-xxx"></td>
            @error('mobileNo')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td><label for="telNo"> Tel No:</label></td>
            <td><input type="text" name="telNo" value="{{ old('telNo')}}"></td>
            @error('telNo')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td><label for="bday"> Birth Date:</label></td>
            <td><input type="date" name="bday" value="{{ old('bday')}}"></td>
            @error('bday')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td><label for="addr"> Address:</label></td>
            <td><input type="text" name="addr" value="{{ old('addr')}}"></td>
            @error('addr')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td><label for="email"> Email:</label></td>
            <td><input type="email" name="email" value="{{ old('email')}}"></td>
            @error('email')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td><label for="website"> Website:</label></td>
            <td><input type="url" name="website" value="{{ old('website')}}"></td>
            @error('website')
            <td><span style="color:red">{{$message}}</span></td>
            @enderror
        </tr>
        <tr>
            <td>
                <input type="submit">
            </td>
        </tr>
    </table>

</form>