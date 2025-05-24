<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neon Cute Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Pacifico&display=swap');

        body {
            background: linear-gradient(135deg, #000000, #1a1a1a);
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        h3 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: #0ff;
            text-shadow: 0 0 10px #0ff, 0 0 30px #00f;
            animation: pulse 2s infinite alternate;
        }

        form {
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            padding: 30px 40px;
            border-radius: 20px;
            border: 2px solid #0ff;
            box-shadow: 0 0 20px #0ff;
            animation: neon-border 3s linear infinite;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 1rem;
            color: #ff8;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 10px;
            background-color: #111;
            color: #0ff;
            box-shadow: inset 0 0 10px #0ff;
            font-size: 1rem;
        }

        button {
            margin-top: 25px;
            padding: 12px 30px;
            background: linear-gradient(45deg, #ff1493, #ff8c00, #ff1493);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            box-shadow: 0 0 15px #ff69b4, 0 0 30px #ff1493;
            cursor: pointer;
            animation: fire-flicker 0.3s infinite alternate;
            position: relative;
            font-family: 'Pacifico', cursive;
            font-size: 1.1rem;
        }

        button:hover {
            animation: bounce 0.6s;
            background: linear-gradient(45deg, #ff6ec4, #7873f5);
            box-shadow: 0 0 20px #fff, 0 0 40px #ff6ec4, 0 0 60px #7873f5;
        }

        button:hover::after {
            content: "💖 You're doing great! 💖";
            position: absolute;
            top: -45px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ff69b4;
            padding: 8px 15px;
            border-radius: 15px;
            color: #000;
            font-size: 0.8rem;
            box-shadow: 0 0 10px #fff;
            animation: floaty 1.2s ease-in-out infinite;
            white-space: nowrap;
        }

        p {
            color: red;
            font-weight: bold;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        @keyframes pulse {
            0% { text-shadow: 0 0 10px #0ff; }
            100% { text-shadow: 0 0 30px #00f, 0 0 60px #0ff; }
        }

        @keyframes neon-border {
            0% { box-shadow: 0 0 10px #0ff; }
            50% { box-shadow: 0 0 30px #0ff, 0 0 60px #00f; }
            100% { box-shadow: 0 0 10px #0ff; }
        }

        @keyframes fire-flicker {
            0% { box-shadow: 0 0 10px #f00, 0 0 20px #ff0; }
            100% { box-shadow: 0 0 5px #f00, 0 0 15px #f80; }
        }

        @keyframes bounce {
            0% { transform: scale(1); }
            30% { transform: scale(1.1); }
            50% { transform: scale(0.95); }
            100% { transform: scale(1); }
        }

        @keyframes floaty {
            0% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(-5px); }
            100% { transform: translateX(-50%) translateY(0); }
        }
    </style>
</head>
<body>
    <h3>✨ Member's Login ✨</h3>
    <p>{{ session()->get('status') }}</p>
    <form action="/login" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <button type="submit">Login</button>
    </form>
</body>
</html>
