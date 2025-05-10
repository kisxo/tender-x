<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Tenderx";
    require "components/head.php";
    ?>
</head>

<body>
    <!-- Navbar -->
    <?php require "components/navbar.php"; ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-50 to-white py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center ">
                <div class="space-y-8">
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tight">
                        Expert Tender Management
                        <br>
                        At Your <span class="text-blue-500">Fingertips</span>
                    </h1>
                    <p class="text-xl text-gray-600">
                        A modern platform that connects organizations with qualified bidders,
                        making the tender process transparent, efficient, and hassle-free.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 ">
                        <Button class="bg-pink-600 text-white font-bold rounded-sm">
                            <a href="/register" class="flex gap-2 justify-center items-center p-3 lg:px-6">
                                <span>Get Started</span>
                                <svg viewBox="0 0 256 256" class="w-5 h-5">
                                    <rect fill="none" />
                                    <line x1="40" y1="128" x2="216" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                                    <polyline points="144 56 216 128 144 200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                                </svg>
                            </a>
                        </Button>
                        <Button class="border border-gray-400 font-bold rounded-sm">
                            <a href="/login" class="flex gap-2 justify-center items-center p-3 lg:px-8">
                                <span>Login</span>
                            </a>
                        </Button>
                    </div>
                </div>
                <div class="w-1/2 lg:w-full mx-auto">
                    <img
                        src="assets/images/home/hero.png"
                        alt="Tender Management" />
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Key Features</h2>
                <p class="mt-4 text-xl text-gray-600">
                    Everything you need to manage your tenders effectively
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                    <div class="w-16 h-16 p-4 bg-blue-100 rounded-full bg-tender-100 flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-sky-600" viewBox="0 0 256 256">
                            <rect fill="none" />
                            <rect x="32" y="60" width="192" height="144" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <path d="M168,204V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40V204" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Tender Creation</h3>
                    <p class="mt-2 text-gray-600">
                        Create detailed tenders with customizable fields, document uploads, and bidding requirements.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                    <div class="w-16 h-16 p-4 bg-blue-100 rounded-full bg-tender-100 flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-sky-600" viewBox="0 0 256 256">
                            <rect fill="none" />
                            <polyline points="76.68 72.63 128 56 179.32 72.63" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <path d="M38.37,62.42,12.85,113.48a8,8,0,0,0,3.57,10.73L44,138,76.68,72.63,49.11,58.85A8,8,0,0,0,38.37,62.42Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <path d="M212,138l27.58-13.79a8,8,0,0,0,3.57-10.73L217.63,62.42a8,8,0,0,0-10.74-3.57L179.32,72.63Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <path d="M177.36,72H144L98.34,116.29a8,8,0,0,0,1.38,12.42C117.23,139.9,141,139.13,160,120l36,34,16-16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <polyline points="196 154 158 192 96 176 44 138" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <polyline points="106.93 216 80.33 209.13 56 191.36" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Bid Management</h3>
                    <p class="mt-2 text-gray-600">
                        Receive and review bids with detailed proposals, compare options, and select winners.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                    <div class="w-16 h-16 p-4 bg-blue-100 rounded-full bg-tender-100 flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-sky-600" viewBox="0 0 256 256">
                            <rect fill="none" />
                            <path d="M216,112V56a8,8,0,0,0-8-8H48a8,8,0,0,0-8,8v56c0,96,88,120,88,120S216,208,216,112Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <polyline points="88 136 112 160 168 104" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Secure Process</h3>
                    <p class="mt-2 text-gray-600">
                        Role-based permissions ensure that only authorized users can access sensitive information.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Section -->
    <?php require_once "components/footer.php" ?>
</body>

</html>