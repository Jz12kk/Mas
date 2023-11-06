<?php
session_start();
require_once 'config.php';

// Checa se o usuario está logado
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $admin = $_SESSION['admin'];
    $image = $_SESSION['image'];
} else {
    $user_id = null;
    $username = null;
    $_SESSION['admin'] = null;
    $_SESSION['email'] = null;
    $_SESSION['image'] = null;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])) {
        if ($_POST["login"]<>"") {
            if ($_POST["senha"]<>"") {
                $nome = $_POST["login"];
                $senha = $_POST["senha"];
            }
            else {
                echo "Erro! Senha Não Inserida";
            } 
        }
        else {
            echo "Erro! Login Não Inserido";
        } 
    }
?>
<head>
<style>
        .formm {
            display: flex;
            flex-direction: row;
        }
        :root {
            --laranja: rgb(255, 136, 0)
        }

        article {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: white;
            box-shadow: black 0px 0px 25px 2px;
            text-align: center;
            min-width: 400px;
            width: 30%;
            border-radius: 20px;
            overflow: hidden;
            margin: 1em;
            padding: 0px 0 10px 0;
        }

        article .title {
            width: 100%;
            padding: 10px;
            font-size: 1.2em;
            font-family: Arial, Helvetica, sans-serif;
            background-color: var(--laranja);
            color: white;
        }

        article img {
            width: 100%;
        }

        article h3 {
            font-size: 1.2em;
            font-family: Arial, Helvetica, sans-serif;
            margin: .5em 0;
        }

        article ul {
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
            margin: 1em 0;
        }

        article ul li {
            text-decoration: none;
            list-style: none;
        }

        article p {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            width: 50%;
            flex-wrap: wrap;
            padding: 10px;
            border-radius: 20px;
        }

        article p span {
            border-radius: 7px;
            padding: 5px;
            background: var(--laranja);
            font-size: 1.2em;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin: .5em 0;
        }

        article a {
            width: 95%;
            font-size: 1.2em;
            padding: 10px;
            border-radius: 5px;
            background: var(--laranja);
            text-align: center;
            text-decoration: none;
            color: white;
        }

        article .side-inputs {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 3.5em;
            margin: .5em;
        }

        article input {
            display: flex;
            flex-direction: row;
            align-items: center;
            font-size: 1.6em;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: white;
        }

        .remove {
            background-color: red;
        }

        .mod {
            background-color: rgb(57, 243, 57);
        }
        .Adicionar {
            background-color: rgb(26, 125, 255);
        }
        form {

        }
    </style>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <nav>
        <div class="navbar-header">
            <img src="logosalles.png" width="76px" height="9%" onclick="toggleimage()" class="navbar-toggle">
            <button type="button" class="navbar-toggle" id="navbar-toggle2" onclick="toggleMenu()">
                <span class="menu-icon"></span>
                <span class="menu-icon"></span>
                <span class="menu-icon"></span>
            </button>
        </div>
        <ul class="navbar-menu" id="navbar-menu">
            <li><img src="logosalles.png" class="image-logo"></li>
            <li><a href="index.php" id="backgroundblack">Home</a></li>
            <li><a href="chat.php">Chat</a></li>
            <?php
            if ($user_id) { 
            echo '<li><a href="perfil.php?id='.$user_id.'">Perfil</a></li>';
            echo '<li><a href="logout.php">Sair</a></li>';
            }
            else {
                echo '<li><a href="#" onclick="login()">Logar</a></li>
                <li><a href="#" onclick="register()">Registrar</a></li>';
            }
            ?>
            <li><a href="contato.php">Contate-nos</a></li>
        </ul>
    </nav>

    <main>
        <form method="post">
        <h2>Login</h2> <br>
        <div class="field-group">
          <label for="login">Email:</label>
          <input type="email" name="login" id="login" size="255" autofocus required placeholder="example@mail.com" />
        </div>
        <div class="field-group">
          <label for="senha">Senha:</label>
          <input type="password" name="senha" id="senha" size="16" required placeholder="exemplo: e8S1sh!72" />
        </div>
        <button>Enviar</button>
        </form>
        </main>
        <script src="script.js"></script>
        </body>