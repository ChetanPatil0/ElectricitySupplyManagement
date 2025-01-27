<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_no = $_POST['c_no']; //consumer no
    $mobile_no = $_POST['mobile_no'];
    $usertype = 'LT';
    $password = $_POST['password'];

    $checkCno = "SELECT `ConsumerNO` FROM `userregistration` WHERE ConsumerNO= $c_no;";
    
    if (mysqli_num_rows(mysqli_query($conn, $checkCno))>0) {
        echo "<script>
          alert('Consumer NO already register');
        </script>";
        // echo "Consumer NO already register";
    } 
    else {
        $sql = "INSERT INTO userregistration VALUES ('', '$c_no', '$mobile_no', '$usertype', '', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                           alert('Data Successfully Inserted');  
                 </script>";  
                 header ("Location: login.php?status=success");    // echo "Consumer No Not already register";
        } else {
            echo "Data Not Inserted: " . mysqli_error($conn);
            
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>UserRegistration</title>
</head>

<body class="bg-gray-800">

    <header class="w-[100%] bg-gradient-to-r from-pink-500 to-orange-500 py-3">
        <nav class="w-[80%] m-auto flex justify-around items-center">
            <h1 class="text-3xl font-semibold">ESM</h1>
            <ul class="w-[40%] flex justify-around text-lg font-semibold">
                <li>Home</li>
                <li>New Connection</li>
                <li>PayBill</li>
                <li>ContactUs</li>
            </ul>
            <div class="text-2xl "><a href="login.php">Login</a></div>
        </nav>
    </header>
    <div class="" id="errorblock">
        <h1 id="errorMsg"></h1>
    </div>
    <main class="w-[100%]">
        <section class="w-[50vh] m-auto  rounded mt-10 border-2 border-red-700">
            <h1 class="text-3xl mt-2 font-bold text-red-500 text-center">USER REGISTRATON</h1>
            <form onsubmit="return RegistrationValidation()" action="" method="post"
                class="grid px-[7vh] py-5 text-gray-200">
                <label class="font-semibold text-md">Consumer No<span class="text-red-500">*</span></label>
                <input type="text" id="c_no" name="c_no"
                    class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2">

                <label class="font-semibold text-md mt-2">Mobile No<span class="text-red-500">*</span></label>
                <input type="tel" id="mobile_no" name="mobile_no"
                    class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2">

                <label class="font-semibold text-md mt-2">Password<span class="text-red-500">*</span></label>
                <input type="password" id="password"
                    class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2">

                <label class="font-semibold text-md mt-2">Confirm Password<span class="text-red-500">*</span></label>
                <input type="password" id="Confirm_password" name="password"
                    class="text-xl py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2">

                <div class="flex justify-around">
                    <button type="reset"
                        class="mt-5 px-5 bg-red-500 text-lg font-semibold text-gray-200 text-md border-2 border-red-500 rounded hover:bg-gray-800 hover:text-red-500">Clear</button>
                    <button type="submit"
                        class="mt-5 px-3 bg-green-600 text-lg font-semibold text-gray-200 text-md border-2 border-green-600 rounded hover:bg-gray-800 hover:text-green-600">Submit</button>
                </div>
            </form>
            <p class="text-center text-gray-300 pb-2 font-serif">Already Register ? <a href="login.php"
                    class="text-sky-500">Click For Login</a></p>
        </section>
    </main>

    <script src="validation.js"></script>
</body>

</html>