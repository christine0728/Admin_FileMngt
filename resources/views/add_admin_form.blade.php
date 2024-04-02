<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Admin</title>
</head>
<body>
    <form action="{{ route('add_admin_acc') }}" method="post">
        @csrf
        Username: <input type="text" name="username">
        <br>Password: <input type="password" name="password">

        <br><br><input type="submit" value="Submit">
    </form>
</body>
</html>