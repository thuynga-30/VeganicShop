<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>You requested a password reset. Click the link below to reset your password:</p>
    <a href="{{ route('reset', $token) }}">Reset Password</a>
    <p>If you did not request a password reset, please ignore this email.</p>
    <p>Thank you!</p>
</body>
</html>
