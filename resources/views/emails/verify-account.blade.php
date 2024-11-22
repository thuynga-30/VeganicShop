<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Tài Khoản</title>
</head>
<body>
    <h1>Xin chào, {{ $account->name }}</h1>
    <p>Vui lòng xác nhận tài khoản của bạn bằng cách nhấp vào liên kết dưới đây:</p>
    <a href="{{ route('verify',$account->email) }}">Xác Nhận Tài Khoản</a>
    <p>Cảm ơn bạn đã đăng ký!</p>
</body>
</html>
