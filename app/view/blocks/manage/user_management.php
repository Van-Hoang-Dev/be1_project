<div class="container">
    <h2 class="my-5 title-center">User management</h2>
    <table class="table table-hover mt-5">
        <thead style="text-align: center;">
            <th>Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Postcode zip</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            // var_dump($users);
            foreach ($users as $user) :
            ?>
                <tr>
                <td><?php echo $user["id"] ?></td>
                    <td><?php echo $user["firstname"] ?></td>
                    <td><?php echo $user["lastname"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td><?php echo $user["phone"] ?></td>
                    <td><?php echo $user["address"] ?></td>
                    <td><?php echo $user["postcode_zip"] ?></td>
                    <td>
                        <form action="destroy.php" method="post" onsubmit="return confirm('Are you sure delete?')">
                            <button type="submit" class="btn btn-outline-danger" name="user_id" value="<?php echo $user["id"] ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
