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

    <form action="/register" method="post" class="login-form mt-[40px] mx-auto w-4/5 max-w-md p-5">

        <div class="text-center mb-[40px] text-xl font-bold">
            <h1 class="mx-auto">Register Now</h1>
        </div>

        <!-- Show Errors -->
        <?php if(!empty($errors)) :?>
            <div class="bg-gray-50 p-3 text-red-400 rounded-sm mb-6">
                <?= implode("<br/>", $errors) ?>
            </div>
        <?php endif; ?>

        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email address</label>
            <input type="email" id="email" name="email" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter email address" required/>
        </div> 

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Full Name</label>
            <input type="text" id="name" name="name" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter your name" required/>
        </div> 

        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" name="password" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter your password" required/>
        </div> 

        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm w-full py-2.5 text-center mb-2 ">Register</button>

        <div class="text-center text-xs text-gray-600 my-4">
           <span>Already have an account? </span>
           <a href="/login" class="text-blue-500">Login</a>
        </div>

    </form>
</body>

</html>