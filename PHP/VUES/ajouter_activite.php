<?php
include '../CONFIG/config.php';
include '../CONFIG/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $capacite = $_POST['capacite'];
    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];
    $disponibilite = $_POST['disponibilite'];

    if (addActivity($nom, $description, $capacite, $dateDebut, $dateFin, $disponibilite)) {
        echo "Activité ajoutée avec succès!";
    } else {
        echo "Erreur lors de l'ajout de l'activité.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lien du Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lien des Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

    <title>Ajouter une Activité</title>
</head>
<body class="bg-gradient-to-b from-red-100 to-blue-500">
    <h2 class="text-3xl mb-[2rem] text-center font-bold dark:text-white">Ajouter une nouvelle Activité</h2>

    <form class="max-w-sm mx-auto mb-[2rem]" method="POST">
        <div class="mb-5">
            <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'activité</label>
            <input type="text" id="nom" name="nom" class="capitalize shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea type="text" id="description" name="description" class="normal-case shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required></textarea>
        </div>
        <div class="mb-5">
            <label for="capacite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacité</label>
            <input type="number" id="capacite" name="capacite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        <div class="mb-5">
            <label for="date_debut" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        <div class="mb-5">
            <label for="date_fin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>

        <label for="disponibilite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disponibilité</label>
        <select id="disponibilite" name="disponibilite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mb-[1rem] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="1">Disponible</option>
            <option value="0">Indisponible</option>
        </select>
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter l'activité</button>
    </form>
</body>
</html>
