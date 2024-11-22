<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>
<body>
    <p>You have a new message from: {{  Auth::user()->name }}</p>
    <p>Email's address: {{ Auth::user()->email }}</p>
    <p>Phonenumber: {{ Auth::user()->phone }}</p>
    <p>Message:{{ $content }}</p>
</body>
</html>
