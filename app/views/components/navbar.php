<?php

$routes = [
    [
        'name' => 'Account',
        'url'  => '/accounts',
    ],
    [
        'name' => 'Support',
        'url'  => '/support',
    ],
    [
        'name' => 'Login',
        'url'  => '/login',
    ],
    [
        'name' => 'Register',
        'url'  => '/register',
    ]
];

?>

<nav class="p-4 lg:px-30 flex border-b border-gray-200 gap-2 items-center">
    <a href="/" class="logo font-bold me-auto text-2xl "> Tender<spa class="text-blue-500">Xpert</span></a>

    <div class="flex flex-col justify-center my-auto ">
        <div class="flex items-center justify-center px-1 pt-1">
            <div class="relative inline-block text-left dropdown">
                <button class="focus:outline-3 focus:outline-indigo-500">
                    <svg fill="currentColor" class="w-6 h-6 lg:w-9 lg:h-9 fill-gray-700" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </button>
                <div class="hidden dropdown-menu">
                    <div class="absolute right-0 w-50 origin-top-right border border-gray-200 bg-white rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="">

                            <?php foreach ($routes as $route): ?>
                                <a href="<?= $route['url'] ?>" class="hover:bg-indigo-500 hover:text-white rounded-md text-gray-700 flex justify-between w-full px-4 py-3 text-sm leading-5 text-left"  role="menuitem" ><?= $route['name'] ?></a>
                            <?php endforeach; ?>

                        </div>
                        <div class="py-1">
                            <a href="#" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* custom dropdown logic*/
            .dropdown:focus-within .dropdown-menu{
                /* @apply block; */
                display:block;
            }
        </style>
    </div>


</nav>