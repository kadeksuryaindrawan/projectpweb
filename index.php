<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tailwind.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="shortcut icon" href="./assets/icon/icon.png">
    <title>ProdiKU - Masuk</title>
</head>
<body class="font-poppins bg-blue-500">
        <div class="items-center flex flex-col md:flex-row bg-white md:mx-20 md:my-20 mx-5 my-10 px-5 md:px-10 py-10 md:py-32" style="box-shadow: 0px 3px 40px #333;">
            <div class="flex-1">
                <img src="./assets/images/login.svg" alt="" class="w-full hidden md:block">
            </div>
            <div class="flex-1 text-center">
                <h2 class="text-blue-500 font-pbold text-3xl leading-normal">USER <br> LOGIN</h2>
                <h3 class="mt-2 text-md leading-7"> Selamat datang di website ProdiKU </h3>
                <div class="flex flex-col items-center m-auto mt-7 md:mt-20" style="max-width: 400px;">
                <form action="./process/login.process.php" method="POST">
                    <input name="email" type="email" class="bg-gray-200 w-full px-7 py-4 focus:outline-none rounded-full" placeholder="E-Mail" required>
                    <input name="password" type="password" class="bg-gray-200 my-7 w-full px-7 py-4 focus:outline-none rounded-full" placeholder="Password" required>
                    <input name="login" type="submit" class="w-full bg-blue-500 text-white tracking-wider px-7 py-4 focus:outline-none rounded-full cursor-pointer hover:bg-blue-700 duration-300 ease-in-out" value="MASUK">
                </form>
                </div>
            </div>
        </div>
</body>
</html>