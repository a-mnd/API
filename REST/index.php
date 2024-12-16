<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100vh;
        }

        .container {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 8px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            width: 500px;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <main class="container">
        <?php
        include_once "conexao.php";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION)) {
            require_once "jwt.php";
            echo "<h1>API SENAC Test</h1>";
            $wrap = wordwrap($API_KEY, 50, "<br />\n", true);
            echo '<p>Sua API_KEY = ' . $wrap . '</p>';
            echo '
<ul>
<li><a href="get.php">GET</a></li>
<li><a href="gets.php">GET JWT</a></li>
<li><a href="post.php">POST</a></li>
<li><a href="put.php">PUT</a></li>
<li><a href="del.php">DELETE</a></li>
<li><a href="logout.php">SAIR</a></li>
</ul>';
        } else {
            header("location: login.php");
        }
        ?>
    </main>
</body>

</html>