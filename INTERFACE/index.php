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
                    <img src="../ASSETS/IMGS/Logo Gym Reservation.png" class="mr-3 mt-[-3rem] w-[15rem]" alt="Logo du Site Web" />
                </a>
                <div class="flex items-center lg:order-2 mt-[-4rem]">
                    <a href="../PHP/VUES/admin.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    <a href="../PHP/VUES/register.php" class="text-white bg-blue-900 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1 mt-[-4rem]" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-800 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Home</a>
                        </li>
                        <li>
                            <a href="../PHP/VUES/afficher_activite.php" class="block py-2 pr-4 pl-3 text-gray-800 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Activités</a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/oussama-amou-b71151337/" target="_blank" class="block py-2 pr-4 pl-3 text-gray-800 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="flex">
            
            <div class=" w-[30rem] h-[24.8rem] p-6 mt-[1.6rem] ml-[10rem] bg-transparant rounded-lg">

            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-black">Découvrez notre espace dédié à votre bien-être. Que vous soyez débutant ou sportif confirmé, notre salle est équipée des meilleurs équipements pour vous aider à atteindre vos objectifs. Ambiance motivante, coachs professionnels et installations modernes tout est réuni pour vous offrir une expérience unique et personnalisée</h5>
            </div>

            <div class="w-[50rem] rounded-lg p-6 overflow-visible">
            <img class="object-cover object-center w-full rounded-lg shadow-xl shadow-blue-gray-900/50" src="../ASSETS/IMGS/bg-2.jpeg" alt="Image du Salle de Sport"/>
            </div>
        </div>

        <div class="flex mb-[5rem]">

            <div class="w-[50rem] mt-[6rem] ml-[10rem] rounded-lg p-6 overflow-visible">
            <img class="object-cover object-center w-full rounded-lg shadow-xl shadow-blue-gray-900/50" src="../ASSETS/IMGS/bg-1.jpg" alt="Image du Salle de Sport"/>
            </div>

            <div class=" w-[30rem] mt-[8rem] h-[24.8rem] p-6 mt-[1.6rem] bg-transparant rounded-lg">

            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-white">Rejoignez nos cours collectifs dynamiques ! Que ce soit pour du yoga, de la zumba, du spinning ou du crossfit, nos cours sont conçus pour vous offrir un entraînement stimulant et adapté à votre niveau. Venez partager un moment de convivialité tout en vous dépassant. À chaque séance, vous renforcez votre corps et votre esprit</h5>
            </div>

        </div>
        
    </main>




    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="../ASSETS/IMGS/Logo Gym Reservation.png" class="w-[8rem]" alt="Flowbite Logo" />
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


</body>
</html>