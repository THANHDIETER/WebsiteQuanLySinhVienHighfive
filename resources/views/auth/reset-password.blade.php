<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h2>Đặt lại mật khẩu</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <label>Mật khẩu mới:</label>
        <input type="password" name="password" required><br>

        <label>Nhập lại mật khẩu:</label>
        <input type="password" name="password_confirmation" required><br>

        <button type="submit">Đặt lại mật khẩu</button>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
</body>
</html>
     