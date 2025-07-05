<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Tài Khoản</title>
</head>
<body>
    <h1>Xin chào, {{ $account->name }}</h1>
    <p>Tài khoản của bạn đã được đăng ký bởi quản trị viên!</p>
    <p>Tên đăng nhập: {{ $account->email }}</p>
    <p>Mật khẩu: {{ $account->password }}</p>
    <p>Vui lòng xác nhận tài khoản của bạn bằng cách nhấp vào liên kết dưới đây:</p>
    <a href="{{ route('verify',$account->email) }}">Xác Nhận Tài Khoản</a>
  
</body>
</html>
