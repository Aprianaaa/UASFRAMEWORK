<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1f2937, #1e40af);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            width: 380px;
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
            background: #2563eb;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background: #1e40af;
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
    <h2>Register</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>
    </form>

    <div class="link">
        Sudah punya akun? <a href="/login">Login</a>
    </div>
</div>

</body>
</html>
