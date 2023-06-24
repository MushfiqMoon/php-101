<?php
include "./connection.php";

$id = $_GET['id'];


$sql = "SELECT * FROM `user` WHERE id=$id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$firstName = explode(" ", $name)[0];
$lastName = explode(" ", $name)[1];
$email = $row['email'];
$password = $row['password'];
$phone = $row['phone'];

if (isset($_POST['submit'])) {
    // echo $name;
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $fullName = $fName . ' ' . $lName;
    $pass = $_POST['password'];
    $mail = $_POST['email'];
    $phn = $_POST['phone'];

    // Hash the password
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sql = "UPDATE user SET name = '$fullName', password = '$pass', email = '$mail', phone = '$phn' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data inserted successfully.";
        header("location:/index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<?php include "./inc/header.php" ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                        <a type="button" href="../index.php" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></a>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" id="firstName"
                                    value="<?php echo $firstName ?>" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName"
                                    value="<?php echo $lastName ?>" aria-describedby="emailHelp">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    value="<?php echo $email ?>" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    value="<?php echo $password ?>" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPhone" name="phone"
                                    value="<?php echo $phone ?>" placeholder="Phone">
                                <label for="floatingPhone">Phone</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Update changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>