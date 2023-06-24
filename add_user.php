<?php
include "./connection.php";


if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $name = $firstName . ' ' . $lastName;
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Hash the password
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO user (name, password, email, phone) VALUES ('$name', '$password', '$email', '$phone')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data inserted successfully.";
        header("location:/index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include "./inc/header.php"; ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form method="post" class="my-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input required type="text" class="form-control" name="firstName" id="firstName"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input required type="text" class="form-control" name="lastName" id="lastName"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input required type="email" class="form-control" id="floatingInput" name="email"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="password" class="form-control" id="floatingPassword" name="password"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" id="floatingPhone" name="phone"
                        placeholder="Phone">
                    <label for="floatingPhone">Phone</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="../index.php" class="btn btn-primary my-2">View All</a>
            </form>

        </div>
    </div>
</div>
<?php include "./inc/footer.php" ?>