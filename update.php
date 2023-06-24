<?php
include "./connection.php";

$id = $_GET['id'];
echo ($id);

$sql = "SELECT * FROM `user` WHERE id=$id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$name =  $row['name'] ;
$firstName = explode(" ", $name)[0];
$lastName = explode(" ", $name)[1];
$email = $row['email'] ;
$password = $row['password'] ;
$phone = $row['phone'] ;


?>
<?php include "./inc/header.php" ?>
<div class="container">
<div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                        <a type="button" href="../index.php" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input required type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $firstName ?>"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input required type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $lastName ?>"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-floating mb-3">
                            <input required type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $email ?>"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input required type="password" class="form-control" id="floatingPassword" name="password" value="<?php echo $password ?>"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" id="floatingPhone" name="phone" value="<?php echo $phone ?>"
                                placeholder="Phone">
                            <label for="floatingPhone">Phone</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Update changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>