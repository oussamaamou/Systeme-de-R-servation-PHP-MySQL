<?php 
    include '../CONFIG/config.php'; 
    include '../VUES/client.php';

    session_start();
    
    if(!isset($_SESSION['ID'])){
        header('location: login.php');
        exit();
    }


    $db = new DataBase();
    $conn = $db->getConnection();
    
    $client = new Client($conn);
    
    $reservations = $client->getAllClientReservations();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ID_Reservation = $_POST['reservation_ID'];
        $client->annulerreservation($ID_Reservation);

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
                    <img src="/Systeme%20de%20Reservation%20PHP%20&%20MySQL/ASSETS/IMGS/Logo Gym Reservation.png" class="mr-3 mt-[-3rem] w-[15rem]" alt="Logo du Site Web" />
                </a>
                <div class="flex items-center lg:order-2 mt-[-4rem]">     
                    <a href="../VUES/logout.php" class="text-white bg-blue-900 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Logout</a>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1 mt-[-4rem]" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 mr-[9rem] font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="gestion.php" class="block py-2 pr-4 pl-3 text-gray-900 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Gestion</a>
                        </li>
                        <li>
                            <a href="afficher_activite_admin.php" class="block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Activités</a>
                        </li>
                        <li>
                            <a href="manipuler_reservation.php" class="block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Réservations</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <form id="cancelReservationForm" method="POST" action="">
            <input type="hidden" name="reservation_ID" id="reservation_ID" value="">
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Client
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date de Consultation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="annltbl px-6 py-3">
                        Action
                    </th>
                    
                </tr>
            </thead>
            
            <tbody id="rsrvtioncard">
                <?php foreach ($reservations as $reservation): ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="ps-3">
                            <div class="text-base font-semibold"><?php echo htmlspecialchars($reservation['client_name']); ?></div>
                            <div class="font-normal text-gray-500"><?php echo htmlspecialchars($reservation['activity_name']); ?></div>
                        </div>  
                    </th>
                    <td class="px-6 py-4">
                        <?php echo htmlspecialchars($reservation['Date_reservation']); ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Confirmée
                        </div>
                    </td>
                    <td class="annltbl px-6 py-4">
                        <button onclick="getIdReservation(<?php echo $reservation['ID']; ?>)" class="font-medium text-red-600 hover:cursor-pointer">Annuler</button>
                    </td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
    </main>

    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 mt-[14rem]">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/Systeme%20de%20Reservation%20PHP%20&%20MySQL/ASSETS/IMGS/Logo Gym Reservation.png" class="w-[8rem]" alt="Flowbite Logo" />
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="https://oussamaamou.github.io/PortFolio-HTML-CSS-JS/" target="_blank" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="https://github.com/oussamaamou/Systeme-de-R-servation-PHP-MySQL" target="_blank" class="hover:underline me-4 md:me-6">Code Source</a>
                    </li>
                    <li>
                        <a href="https://www.youcode.ma/" target="_blank" class="hover:underline me-4 md:me-6">Formation</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/oussama-amou-b71151337/" target="_blank" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="" class="hover:underline">Fitness Center</a>. All Rights Reserved.</span>
        </div>
    </footer>

    <script>
        function getIdReservation(reservation_ID) {
        document.getElementById("reservation_ID").value = reservation_ID;
        document.getElementById("cancelReservationForm").submit();
        };
    </script>

</body>
</html>

