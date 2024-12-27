<?php
include '../CONFIG/config.php';
include '../CONFIG/functions.php';


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
    
    <title>Accueil - Salle de Sport</title>
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
                            <a href="afficher_activite.php" class="block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Activités</a>
                        </li>
                        <li>
                            <a href="" class="block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Réservations</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <main>
        <!-- Form de reservation -->
        
        <div id="frmrsrv" class="hidden fixed top-[6rem] left-[34rem] w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <i id="xmark1" class="fa-solid fa-xmark text-2xl mt-[1rem] ml-[26rem] hover:cursor-pointer" style="color: #1b1c1d;"></i>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h2 class="text-2xl mb-[2rem] text-center font-bold dark:text-white">Réserver l'activité: </h2>

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
                        <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                    </div>
                    <div class="mb-5">
                        <label for="date_reservation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de réservation</label>
                        <input type="datetime-local" id="date_reservation" name="date_reservation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                    </div>
                    
                    <button type="submit" class="text-white bg-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Réserver Maintenant</button>
                </form>
            </div>
        </div>
        
        <!-- //////////////////////////////////////////////////////// -->
         
        <h2 class="text-3xl mb-[2rem] mt-[3rem] text-center font-bold dark:text-white">Activités Disponibles</h2>
        <ul class="pl-[30%]">
                <li class="mb-[3rem]"> 
                    <div class="w-[40rem] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg" src="/Systeme%20de%20Reservation%20PHP%20&%20MySQL/ASSETS/IMGS/gym-picture.jpeg" alt="Image de Publicite" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"></h5>
                            </a>
                            <p class="mb-3 font-medium text-gray-700 dark:text-gray-400"></p>
                            <p class="mb-3 font-bold text-gray-700 dark:text-gray-400">Date de Debut: </p>
                            <p class="mb-3 font-bold text-gray-700 dark:text-gray-400">Date de Fin: </p>
                            <p class="mb-3 font-bold text-gray-700 dark:text-gray-400">Capacité: </p>
                            
                        </div>
                        <a id="frmbttn" class="inline-flex mt-[1rem] mb-[1rem] ml-[33rem] items-center px-3 py-3 text-base font-medium text-center text-white bg-blue-900 rounded-lg hover:bg-blue-800" href="reserver_activite.php?id=<?php echo $activity['ID']; ?>">Réserver</a>
                    </div>
                </li>
        </ul>
    </main>

    

    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
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
        document.getElementById("frmbttn").addEventListener('click', function(){
            document.getElementById("frmrsrv").classList.remove('hidden');
        });
        document.getElementById("xmark1").addEventListener('click', function(){
            document.getElementById("frmrsrv").classList.add('hidden');
        });
    </script>
</body>
</html>
