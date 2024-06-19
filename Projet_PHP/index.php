<?php
require 'database.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    if(!empty($email) || !empty($pwd)){
        require 'database.php';
        $statement=$pdo->prepare('SELECT * FROM stagiaires WHERE email=:email and pwd=:pwd');
        $statement->execute([
        ":email" => $email,
        ":pwd"=> $pwd 
    ]);
    $resultat = $statement->fetch(PDO::FETCH_ASSOC);
    if($resultat){ 
        $_SESSION['employe'] = $resultat ;
        header('location:menu.php');
    }

    }
    else{
            $_SESSION['error']  = 'remplir le formulaire';
        }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'authentification</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <form method="post" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" >
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    E-mail
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email" placeholder="Email">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="pwd" type="password" placeholder="password">
            </div>
            
            <div <?php if(isset($_SESSION['error'])) { echo $_SESSION['error'] ; } ?> >

                
            </div>

            
            <div class="flex items-center justify-between">
                <button class="bg-blue-400 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="ajouter">
                    Se connecter
                </button>
                
        </form> <br>
        <p class="text-center text-gray-500 text-xs">
            &copy;2024 Votre Société. Tous droits réservés.
        </p>
    </div>
</body>
</html>










