<?php
include '../CONFIG/config.php';
include '../CONFIG/functions.php';

$activityId = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $dateReservation = $_POST['date_reservation'];

    if (addReservation($activityId, $nom, $prenom, $telephone, $dateReservation)) {
        echo "Réservation effectuée avec succès!";
    } else {
        echo "Erreur lors de la réservation.";
    }
}

$activityResult = $conn->query("SELECT * FROM activitesdata WHERE ID = $activityId");
$activity = $activityResult->fetch_assoc();
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

    <title>Réservation d'activité</title>
</head>
<body>
    <h2 class="text-3xl mb-[2rem] text-center font-bold dark:text-white">Réserver l'activité: <?php echo htmlspecialchars($activity['Nom_activite']); ?></h2>

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
            <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
            <input type="text" id="telephone" name="telephone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        <div class="mb-5">
            <label for="date_reservation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de réservation</label>
            <input type="datetime-local" id="date_reservation" name="date_reservation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Réserver Maintenant</button>
    </form>
</body>
</html>
