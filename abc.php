<div class="box">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">ADD USER</button>
        </div>
        <table class="table table-hover table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Updation</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $query = "SELECT * FROM `users`";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Query failed: ".mysqli_error($connection));
            }

            else {
                while($row = mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['First_name']; ?></td>
                        <td><?php echo $row['Last_name']; ?></td>
                        <td><?php echo $row['Age']; ?></td>
                        <td><a href=" update.php?id=<?php echo $row['Id']; ?>" class="btn btn-success">Update</a></td>
                        <td><a href="delete.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                    <?php
                }
            }

            ?>

            </tbody>
        </table>


        <?php

        if (isset($_GET['delete_msg'])) {
        echo "<h6>".$GET['delete_msg']."</h6>";
        }

        ?>

    <form action="insert_data.php" method="post">
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" class="form-control" name="f_name">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" class="form-control" name="l_name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" data-bs-dismiss="modal" name="add_user" value="ADD">
                </div>
            </div>
        </div>
    </form>