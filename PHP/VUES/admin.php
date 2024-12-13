<?php
include '../CONFIG/config.php';
include '../CONFIG/functions.php';

$membres = getAllClients();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_member'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    if (addClient($nom, $prenom, $email, $telephone)) {
        echo "Membre ajouté avec succès!";
    } else {
        echo "Erreur lors de l'ajout du membre.";
    }
}

if (isset($_GET['delete_id'])) {
    $membreId = $_GET['delete_id'];
    if (deleteClient($membreId)) {
        echo "Membre supprimé avec succès!";
    } else {
        echo "Erreur lors de la suppression du membre.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lien du Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lien des Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    
    <title>Administration</title>
</head>
<body>
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="ajouter_activite.php">Ajouter une Activite</a></button>
    <h2 class="text-3xl mt-[2rem] mb-[2rem] text-center font-bold dark:text-white">Gestion des Clients</h2>

    <h3 class="text-xl mt-[2rem] mb-[2rem] text-center font-bold dark:text-white">Ajouter un nouveau Client</h3>

    <form class="max-w-sm mx-auto" method="POST">
    <div class="mb-5">
        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
        <input type="text" id="nom" name="nom" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
    <div class="mb-5">
        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
        <input type="text" id="prenom" name="prenom" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
    <div class="mb-5">
        <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
        <input type="text" id="telephone" name="telephone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
    <button type="submit" name="add_member" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter le Client</button>
    </form>

    <h3 class="text-xl mt-[4rem] mb-[3.5rem] text-center font-bold dark:text-white">Liste des Clients</h2>

    <table class="ml-[25rem] mb-[4rem]">

        <tr>
            <th scope="col" class="px-9 py-3">
                Nom
            </th>
            <th scope="col" class="px-9 py-3 bg-gray-50">
                Prénom
            </th>
            <th scope="col" class="px-9 py-3">
                Email
            </th>
            <th scope="col" class="px-9 py-3 bg-gray-50">
                Téléphone
            </th>
            <th scope="col" class="px-9 py-3">
                Actions
            </th>
        </tr>

        <?php foreach ($membres as $membre) { ?>
            <tr>
                <td class="px-6 py-4">
                    <?php echo htmlspecialchars($membre['Nom_client']); ?>
                </td>

                <td class="px-6 py-4 bg-gray-50">
                    <?php echo htmlspecialchars($membre['Prenom_client']); ?>
                </td>

                <td class="px-6 py-4">
                    <?php echo htmlspecialchars($membre['Email_client']); ?>
                </td>

                <td class="px-6 py-4 bg-gray-50">
                    <?php echo htmlspecialchars($membre['Telephone_client']); ?>
                </td>

                <td class="px-6 py-4 bg-red-500 text-white hover:bg-red-400">
                    <a href="admin.php?delete_id=<?php echo $membre['ID']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    
</body>
</html>
