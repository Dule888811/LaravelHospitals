<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<form action ="{{route('doktor.password',$user)}}" method="POST">

    {{csrf_field()}}
<div class="form-input">
    <label for="doctor_password">Enter your password:
    <input type="text" name="doctor_password" id="doctor_password"></label>
    <input type="submit"  value="Enter"><br/>
</div>
</form>
</body>
</html>