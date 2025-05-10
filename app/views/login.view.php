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

    <form action="/login" method="post" class="login-form mt-[40px] mx-auto w-4/5 max-w-md p-5">

        <div class="text-center mb-[40px] text-xl font-bold">
            <h1 class="mx-auto">Login to Tenderx</h1>
        </div>
        
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email address</label>
            <input type="email" id="email" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter email address" required />
        </div> 

        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" class="bg-slate-50 border border-gray-200 text-gray-900 text-sm rounded-sm focus:border-blue-500 block w-full p-2.5 " placeholder="Enter your password" required />
        </div> 

        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm w-full py-2.5 text-center mb-2 ">Login</button>
        
        <div class="text-center text-xs text-gray-600 my-4">
           <span>Don't have an account? </span>
           <a href="/register" class="text-blue-500">Register</a>
           <!-- <a href="/forgot-password" class="text-blue-500">Forgot Password</a> -->
        </div>

    </form>
</body>

</html>