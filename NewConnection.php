<?php
include 'connection.php';
function SucessMail($Name,$applicationId){
    $to_email = "recipient@example.com";
    $subject = "ESM New Connection Application";
    $body = "Hello,$Name Your Application Succesfully Sumbitted For New electric connection Request.\n Your Application ID is : $applicationId.\n Track Your Application Status Using Above Application ID\n\n Thank You!";
    
    $headers = "From: ESM@example.com\r\n";
    $headers .= "Reply-To: ESM@example.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    mail($to_email, $subject, $body, $headers);
       
}

if (isset($_POST['submit'])) {
    $aname = $_POST['aname'];
    $agender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $sstate = $_POST['sstate'];
    $sdistrict = $_POST['sdistrict'];
    $staluka = $_POST['staluka'];
    $svillage = $_POST['svillage'];
    $saddress = $_POST['saddress'];
    $spincode = $_POST['spincode'];
    $aadharno = $_POST['aadharno'];
    $connectionType = $_POST['connectionType'];
    $purpose = $_POST['purpose'];
    $premisesType = $_POST['premisesType'];
    $bstate = $_POST['bstate'];
    $bdistrict = $_POST['bdistrict'];
    $btaluka = $_POST['btaluka'];
    $bvillage = $_POST['bvillage'];
    $baddress = $_POST['baddress'];
    $bpincode = $_POST['bpincode'];

    $applicationId='ESM'.rand(1000000000,1999999999);
    $checkId ="SELECT * FROM `newconnectionapplication` WHERE ApplicationId =$applicationId";
    
    $result = mysqli_query($conn, $checkId);

    if ($result !== false && mysqli_num_rows($result) > 0) {
        echo "<script>alert('Please Submit Form Again');</script>";
    } else {
        // Insertion query
        $query = "INSERT INTO `newconnectionapplication`(`SrNO`, `ApplicationId`, `gender`, `occupation`, `mobileno`, `email`, `sstate`, `sdistrict`, `staluka`, `svillage`, `saddress`,
            `spincode`, `aadharno`, `connectionType`, `purpose`, `premises_Type`, `bstate`, `bdistrict`, `btaluka`, `bvillage`, `baddress`, `bpincode`, `name`
        ) 
        VALUES ('', '$applicationId', '$agender', '$occupation', '$mobileno', '$email', '$sstate', '$sdistrict', '$staluka', '$svillage', '$saddress',
            '$spincode', '$aadharno', '$connectionType', '$purpose', '$premisesType', '$bstate', '$bdistrict', '$btaluka', '$bvillage', '$baddress', '$bpincode', '$aname'
        )";

        if (mysqli_query($conn, $query)) {
            SucessMail($aname,$applicationId);
            echo "<script>alert('Application Successfully Submitted');</script>";
            echo "<script>alert('Your Application Id : $applicationId');</script>";
        } else {
            echo "<script>alert('Application Not Submitted, Please Fill Again');</script>";
            header("Location: NewConnection.php");
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
    <title>NewConnection</title>
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
            <div class="text-2xl "><i class="fa-solid fa-user"></i></div>
        </nav>
    </header>
    <main class="w-[100%]">
        <section class="max-w-[90vh] m-auto  rounded mt-10 border-2 border-red-700 ">
            <h1 class="text-3xl mt-2 font-bold text-red-500 text-center">NEW CONNECTION</h1>
            <form action="" method="post" class=" px-[2vh]  py-5 text-gray-200 grid">

                <div>
                    <h1 class="text-center bg-gray-600 py-1 text-lg">Applicant Details</h1>
                </div>
                <div class="flex flex-wrap gap-3 justify-around ">
                    <div class="w-[45%]">
                        <label class="font-semibold text-md">Full Name<span class="text-red-500">*</span></label><br>
                        <input type="text" id="aname" name="aname"
                            class="grid text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                            required>
                    </div>
                    <div class="w-[45%] flex justify-between">
                        <div class="w-[45%]">
                            <label class="font-semibold text-md">Gender<span class="text-red-500">*</span></label><br>
                            <select id="gender" name="gender"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="w-[45%]">
                            <label class="font-semibold text-md">Occupation<span
                                    class="text-red-500">*</span></label><br>
                            <select id="occupation" name="occupation"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Service">Service</option>
                                <option value="Bussiness">Bussiness</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-[45%] ">
                        <label class="font-semibold text-md">Mobile No<span class="text-red-500">*</span></label><br>
                        <input type="text" id="mobileno" name="mobileno"
                            class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                            required>
                    </div>
                    <div class="w-[45%]">
                        <label class="font-semibold text-md">Email<span class="text-red-500">*</span></label><br>
                        <input type="email" id="email" name="email"
                            class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                            required>
                    </div>
                    <p class="text-red-500">Address at which supply is required(Please enter complete details)</p>
                    <div class="flex justify-between w-[95%]">
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">State<span class="text-red-500">*</span></label><br>
                            <select id="sstate" name="sstate"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">District<span class="text-red-500">*</span></label><br>
                            <select id="sdistrict" name="sdistrict"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Nashik">Nashik</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">Taluka<span class="text-red-500">*</span></label><br>
                            <select id="staluka" name="staluka"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Nashik">Nashik</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">Village<span class="text-red-500">*</span></label><br>
                            <select id="svillage" name="svillage"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Nashik">Nashik</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-[45%]">
                        <label class="font-semibold text-md">Address/Plot No/Landmark<span
                                class="text-red-500">*</span></label><br>
                        <textarea name="saddress" id="saddress" rows="1"
                            class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                            required>
                            </textarea>
                    </div>
                    <div class="w-[45%] flex justify-between">
                        <div class="w-[35%]">
                            <label class="font-semibold text-md">Pin Code<span class="text-red-500">*</span></label><br>
                            <input type="text" id="spincode" name="spincode"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                        </div>

                        <div class="w-[60%]">
                            <label class="font-semibold text-md">Aadhar No<span class="text-red-500">*</span></label>
                            <input type="text" id="aadharno" name="aadharno"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <h1 class="text-center bg-gray-600 py-1 my-3 text-lg">Connection Details</h1>
                    </div>
                    <div class="flex justify-around gap-3 flex-wrap">
                        <div class="w-[30%]">
                            <label class="font-semibold text-md">Connection Type<span
                                    class="text-red-500">*</span></label><br>
                            <select id="state" name="connectionType"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Permanent">Permanent</option>
                                <option value="Temporary">Temporary</option>
                            </select>
                        </div>
                        <div class="w-[30%]">
                            <label class="font-semibold text-md">Purpose Of Connection<span
                                    class="text-red-500">*</span></label><br>
                            <select id="state" name="purpose"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Industrial">Industrial</option>
                                <option value="Commarcial">Commarcial</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="w-[30%]">
                            <label class="font-semibold text-md">Premises Type<span
                                    class="text-red-500">*</span></label><br>
                            <select id="state" name="premisesType"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]">
                                <option value="Owned">Owned</option>
                                <option value="Rented">Rented</option>
                                <option value="Lease">Lease</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <p class="text-red-500 w-[100%] text-center"><input type="checkbox" id="saddresscopy"
                                onclick="CopyAddress()"> Click Here If Billing Addres Same As Supply
                            Address</p>
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">State<span class="text-red-500">*</span></label><br>
                            <select id="bstate" name="bstate"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">District<span class="text-red-500">*</span></label><br>
                            <select id="bdistrict" name="bdistrict"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Nashik">Nashik</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">Taluka<span class="text-red-500">*</span></label><br>
                            <select id="btaluka" name="btaluka"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Nashik">Nashik</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                        <div class="w-[20%]">
                            <label class="font-semibold text-md">Village<span class="text-red-500">*</span></label><br>
                            <select id="bvillage" name="bvillage"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                                <option value="Nashik">Nashik</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>

                        <div class="w-[45%]">
                            <label class="font-semibold text-md">Address/Plot No/Landmark<span
                                    class="text-red-500">*</span></label><br>
                            <textarea name="baddress" id="baddress" rows="1"
                                class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                required>
                            </textarea>
                        </div>
                        <div class="w-[45%] flex justify-between">
                            <div class="w-[45%]">
                                <label class="font-semibold text-md">Pin Code<span
                                        class="text-red-500">*</span></label><br>
                                <input type="text" id="bpincode" name="bpincode"
                                    class="text-md py-1 bg-gray-800 focus:outline-none rounded border-2 border-gray-500 hover:border-gray-100 px-2 w-[100%]"
                                    required>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-around">
                        <button type="reset"
                            class="mt-5 px-5 bg-red-500 text-lg font-semibold text-gray-200 text-md border-2 border-red-500 rounded hover:bg-gray-800 hover:text-red-500">Clear</button>
                        <button type="submit" name="submit"
                            class="mt-5 px-3 bg-green-600 text-lg font-semibold text-gray-200 text-md border-2 border-green-600 rounded hover:bg-gray-800 hover:text-green-600">Submit</button>
                    </div>
            </form>
        </section>
    </main>

    <script>



        document.addEventListener('DOMContentLoaded', function () {

            //Supply
            S_State = document.getElementById("sstate");
            S_District = document.getElementById("sdistrict");
            S_Taluka = document.getElementById("staluka");
            S_Village = document.getElementById("svillage");
            S_Address = document.getElementById("saddress");
            S_Pincode = document.getElementById("spincode");
            //Billing
            B_State = document.getElementById("bstate");
            B_District = document.getElementById("bdistrict");
            B_Taluka = document.getElementById("btaluka");
            B_Village = document.getElementById("bvillage");
            B_Address = document.getElementById("baddress");
            B_Pincode = document.getElementById("bpincode");

            saddresscopy.addEventListener('change', function () {
                if (this.checked) {
                    B_State.value = S_State.value;
                    B_District.value = S_District.value;
                    B_Taluka.value = S_Taluka.value;
                    B_Village.value = S_Village.value;
                    B_Address.value = S_Address.value;
                    B_Pincode.value = S_Pincode.value;
                } else {
                    B_State.value = "";
                    B_District.value = "";
                    B_Taluka.value = "";
                    B_Village.value = "";
                    B_Address.value = "";
                    B_Pincode.value = "";
                }
            });
        });
    </script>
</body>

</html>