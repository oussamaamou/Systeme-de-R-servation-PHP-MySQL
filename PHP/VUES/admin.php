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
        echo "";
    } else {
        echo "";
    }
}

if (isset($_GET['delete_id'])) {
    $membreId = $_GET['delete_id'];
    if (deleteClient($membreId)) {
        echo "";
    } else {
        echo "";
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
<body class="bg-gradient-to-b from-red-100 to-blue-500">
    <header>
        <nav class="border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a class="flex items-center">
                    <img src="/ASSETS/IMGS/Logo Gym Reservation.png" class="mr-3 mt-[-3rem] w-[15rem]" alt="Logo du Site Web" />
                </a>
                <div class="flex items-center lg:order-2 mt-[-4rem]">
                    <a href="/PHP/VUES/admin.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    <a href="/PHP/VUES/register.php" class="text-white bg-blue-900 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1 mt-[-4rem]" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="/INTERFACE/index.php" class="block py-2 pr-4 pl-3 text-gray-900 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Home</a>
                        </li>
                        <li>
                            <a href="afficher_activite.php" class="block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Activités</a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/oussama-amou-b71151337/" target="_blank" class="block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <button type="button" class="text-white bg-blue-900 ml-[80rem] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="ajouter_activite.php">Ajouter une Activite</a></button>
        <h2 class="text-3xl mt-[2rem] mb-[2rem] text-center font-bold dark:text-white">Gestion des Clients</h2>

        <h3 class="text-xl mt-[2rem] mb-[2rem] text-center font-bold text-white">Ajouter un nouveau Client</h3>

        <form class="max-w-sm mx-auto" method="POST">
            <div class="mb-5">
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                <input type="text" id="nom" name="nom" class="capitalize shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div>
            <div class="mb-5">
                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
                <input type="text" id="prenom" name="prenom" class="capitalize shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div>
            <div class="mb-5">
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                <input type="text" id="telephone" name="telephone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
            </div>
            <button type="submit" name="add_member" class="text-white bg-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter le Client</button>
        </form>

        <h3 class="text-xl mt-[4rem] mb-[3.5rem] text-center font-bold text-white">Liste des Clients</h2>

        <table class="ml-[28rem] mb-[4rem] bg-white rounded-lg">

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

    </main>
    

    
</body>
</html>
