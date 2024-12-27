<?php
require_once '../CONFIG/Database.php';
require './admin.php';
require_once 'auth_admin.php';

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['Role'] !== 'Admin') {
    header('Location: login.php');
    exit();
}

$db = new Database();
$userManager = new UserManager($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                try {
                    $userManager->addUser(
                        $_POST['nom'],
                        $_POST['prenom'],
                        $_POST['email'],
                        $_POST['telephone'],
                        $_POST['password'],
                        $_POST['username']
                    );
                    $_SESSION['message'] = "Utilisateur ajouté avec succès";
                } catch (Exception $e) {
                    $_SESSION['error'] = $e->getMessage();
                }
                break;
            case 'update':
                try {
                    $userManager->updateUser(
                        $_POST['id'],
                        $_POST['nom'],
                        $_POST['prenom'],
                        $_POST['email'],
                        $_POST['telephone']
                    );
                    $_SESSION['message'] = "Utilisateur mis à jour avec succès";
                } catch (Exception $e) {
                    $_SESSION['error'] = $e->getMessage();
                }
                break;
        }
    }
    header('Location: gestion.php');
    exit();
}

if (isset($_GET['delete'])) {
    try {
        $userManager->deleteUser($_GET['delete']);
        $_SESSION['message'] = "Utilisateur supprimé avec succès";
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: gestion.php');
    exit();
}

$users = $userManager->getAllUsers();
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
                    <img src="/Systeme%20de%20Reservation%20PHP%20&%20MySQL/ASSETS/IMGS/Logo Gym Reservation.png" class="mr-3 mt-[-3rem] w-[15rem]" alt="Logo du Site Web" />
                </a>
                <div class="flex items-center lg:order-2 mt-[-4rem]">
                    <a href="../VUES/login.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    <a href="../VUES/inscription.php" class="text-white bg-blue-900 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1 mt-[-4rem]" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="/Systeme%20de%20Reservation%20PHP%20&%20MySQL/INTERFACE/index.php" class="block py-2 pr-4 pl-3 text-gray-900 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Home</a>
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
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Créer votre compte
                        </h1>
                        <form class="space-y-4 md:space-y-6" method="POST">
                            <div>
                                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ahmed" required="">
                            </div>
                            <div>
                                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
                                <input type="text" name="prenom" id="prenom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jobry" required="">
                            </div>
                            <div>
                                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ahmed" required="">
                            </div>
                            <div>
                                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0758964231" required="">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="jobry@gmail.com" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <button type="submit" class="w-full text-white bg-red-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>


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
                <td class="px-6 py-4">
                    <a href="?edit_id=<?php echo $client['ID']; ?>" class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Modifier</a>
                    <a href="?delete_id=<?php echo $client['ID']; ?>" class="bg-red-500 text-white px-2 py-1 rounded" 
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</a>
                </td>
                <?php
                    // Ajoutez ce formulaire de modification qui apparaîtra si edit_id est présent
                    if (isset($_GET['edit_id'])) {
                    $client = $clientManager->getClientById($_GET['edit_id']);
                ?>
<div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
    <form method="POST" class="bg-white p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">Modifier le client</h3>
        <input type="hidden" name="update_id" value="<?php echo $client['ID']; ?>">
        
        <div class="mb-4">
            <label class="block mb-2">Nom</label>
            <input type="text" name="nom" value="<?php echo $client['Nom_client']; ?>" 
                   class="w-full p-2 border rounded">
        </div>
        
        <div class="mb-4">
            <label class="block mb-2">Prénom</label>
            <input type="text" name="prenom" value="<?php echo $client['Prenom_client']; ?>" 
                   class="w-full p-2 border rounded">
        </div>
        
        <div class="mb-4">
            <label class="block mb-2">Email</label>
            <input type="email" name="email" value="<?php echo $client['Email_client']; ?>" 
                   class="w-full p-2 border rounded">
        </div>
        
        <div class="mb-4">
            <label class="block mb-2">Téléphone</label>
            <input type="text" name="telephone" value="<?php echo $client['Telephone_client']; ?>" 
                   class="w-full p-2 border rounded">
        </div>
        
        <div class="flex justify-end gap-2">
            <a href="gestion.php" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
            </div>
            </form>
            </div>
            <?php } ?>
            </tr>

            <?php foreach ($users as $user) { ?>
                <tr>
                    <td class="px-6 py-4">
                        <?php echo htmlspecialchars($user['Nom_client']); ?>
                    </td>

                    <td class="px-6 py-4 bg-gray-50">
                        <?php echo htmlspecialchars($user['Prenom_client']); ?>
                    </td>

                    <td class="px-6 py-4">
                        <?php echo htmlspecialchars($user['Email_client']); ?>
                    </td>

                    <td class="px-6 py-4 bg-gray-50">
                        <?php echo htmlspecialchars($user['Telephone_client']); ?>
                    </td>

                    <td class="px-6 py-4 bg-red-500 text-white hover:bg-red-400">
                        <a href="gestion.php?delete_id=<?php echo $user['ID']; ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </main>
    

    
</body>
</html>
