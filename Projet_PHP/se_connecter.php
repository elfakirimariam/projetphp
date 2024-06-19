<?php 
require "database.php";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter'])){
        $id_stagiaires=$_POST['id_stagiaires'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $cin=$_POST['cin'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $adress=$_POST['adress'];
        $sexe=$_POST['sexe'];
        $tele=$_POST['tele'];
        $pwd=$_POST['pwd'];
        


        if(!empty($id_stagiaires) || !empty($nom)|| !empty($prenom) || !empty($cin) || !empty($age) || !empty($email) || !empty($adress) || !empty($sexe) || !empty($tele) || !empty($pwd) ){
            $statment = $pdo->prepare('INSERT INTO stagiaires (id_stagiaires,nom,prenom,cin,age,email,adress,sexe,tele,pwd) VALUES (:id_stagiaires,:nom,:prenom,:cin,:age,:email,:adress,:sexe,:tele,:pwd)');
            $statment->execute([
                ':id_stagiaires'=>$id_stagiaires,
                ':nom'=>$nom,
                ':prenom'=>$prenom,
                ':cin'=>$cin,
                ':age'=>$age,
                ':email'=>$email,
                ':adress'=>$adress,
                ':sexe'=>$sexe,
                ':tele'=>$tele,
                ':pwd'=>$pwd

            ]);
            header('location:afficher.php');
            
        }
        
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Stagiaires</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <div class="flex items-center justify-center min-h-screen bg-gray-400">
    <div class="w-full max-w-lg">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_stagiaires">
                    ID Stagiaires
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id_stagiaires" type="text" placeholder="ID Stagiaires">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                    Nom
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nom" type="text" placeholder="Nom">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                    Prénom
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="prenom" type="text" placeholder="Prénom">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="cin">
                    CIN
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="cin" type="text" placeholder="CIN">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">
                    Âge
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="age" type="number" placeholder="Âge">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email" placeholder="Email">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="adresse">
                    Adresse
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="adress" type="text" placeholder="Adresse">
            </div>
           
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tele">
                Sexe
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="sexe" type="text" placeholder="Sexe">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tele">
                    Téléphone
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tele" type="text" placeholder="Téléphone">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tele">
                    Pwd
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="pwd" type="password" placeholder="password">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="ajouter">
                    Ajouter
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2024 Votre Société. Tous droits réservés.
        </p>
    </div>
    </div>
</body>
</html>