<?php 
require 'database.php';
$statement=$pdo->prepare('SELECT * FROM stagiaires');
$statement->execute([]);
$resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

    
<div class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Liste des Stagiaires</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID Stagiaires</th>
                        <th class="py-3 px-6 text-left">Nom</th>
                        <th class="py-3 px-6 text-left">Prénom</th>
                        <th class="py-3 px-6 text-left">CIN</th>
                        <th class="py-3 px-6 text-left">Âge</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">mot de passe</th>
                        <th class="py-3 px-6 text-left">Sexe</th>
                        <th class="py-3 px-6 text-left">Adresse</th>
                        <th class="py-3 px-6 text-left">Téléphone</th>
                        <th class="py-3 px-6 text-left">Option</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php foreach($resultat as $val){ ?>
                    <tr class="border-b bg-gray-100 border-gray-200 hover:bg-gray-100">
                     
                        <td class="py-3 text-lgtext-lg  px-6 text-left whitespace-nowrap"><?php echo $val['id_stagiaires'] ?></td>
                        <td class="py-3  px-6 text-left"><?php echo $val['nom'] ?></td>
                        <td class="py-3  px-6 text-left"><?php echo $val['prenom'] ?></td>
                        <td class="py-3  px-6 text-left"><?php echo $val['cin'] ?></td>
                        <td class="py-3  px-6 text-left"><?php echo $val['age'] ?></td>
                        <td class="py-3  px-6 text-left"><?php echo $val['email'] ?></td>
                        <td class="py-3  px-6 text-left"><?php echo $val['pwd'] ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $val['sexe'] ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $val['adress'] ?></td>
                        <td class="py-3  px-6 text-left"><?php echo $val['tele'] ?></td>
                        <td class="py-3  px-6 text-left">
                            <form action="supprimer.php" method="post">
                            <input type="hidden" name="id_stagiaires" value="<?php echo $val['id_stagiaires']?>">
                            <button onclick="confirmation(event)" class="bg-red-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="delete" >Supprimer</button>
                            </form>
                            <form action="modification.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $post['id_stagiaires']; ?>">
                                <input type="hidden" name="_method" value="update">
                                <input type="submit" class="bg-blue-500 hover:bg-red-300 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Modifier">
                            </form>
                        </td>
                        
                       
                       
                    </tr>
                    <?php }?>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
        function confirmation(event){
            if(!confirm('etes vous sur de supprimer')){
                event.preventDefault();
            }
        }
    </script>
</body>
</html>