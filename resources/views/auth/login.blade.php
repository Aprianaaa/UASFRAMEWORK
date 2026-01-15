<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1f2937, #111827);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            width: 360px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #1f2937;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background: #111827;
        }

        .link {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
        }

        .link a {
            color: #2563eb;
            text-decoration: none;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Login</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="text" name="login" placeholder="Username atau Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <div class="link">
        Belum punya akun? <a href="/register">Register</a>
    </div>
</div>
    @if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif

</body>
</html>
