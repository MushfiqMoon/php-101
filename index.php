<?php include "./connection.php" ?>
<?php include "./inc/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/add_user.php" class="btn btn-primary my-2">Add New</a>
            <table class="table table-borderless table-striped my-4">
                <thead>
                    <tr class="border-bottom border-primary-subtle">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody >

                    <?php
                    $i = 1;
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn, $sql);


                    // Check if there are any rows returned
                    // ('$name', '$password', '$email', '$phone')
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Output the row data within the <tr> element
                            echo "<tr>
                            <th scope='row'>" . $i++ . "</th>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['phone'] . "</td>";
                            ?>
                            <td>
                                <a class="btn btn-primary" href='update.php?id=<?php echo $row['id']; ?>'>Update</a>
                                <a class="btn btn-danger" href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
                            </td>
                            <?php
                        }
                        echo "</tr>";
                    } else {
                        echo "<tr><td colspan='6'>No data found.</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include "./inc/footer.php" ?>