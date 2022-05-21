<?php
require_once 'users/users.php';
require_once 'partials/header.php';

$users = getUsers();
?>
<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create  new User</a>
    </p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Website</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
<tbody>
    <?php $index = 1; foreach($users as $user): ?>
        <tr>
            <th scope="row"><?php echo $index ?>
            <td>
                    <?php if (isset($user['extension'])): ?>
                        <img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt="">
                    <?php endif; ?>
            </td>
            <td><?php echo $user['name'];?></td>
            <td><?php echo $user['username'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['phone'];?></td>
            <td><a target="_blank" href="https://<?php echo $user['website'];?>"><?php echo $user['website'];?></a></td>
            <td>
                <a href="view.php?id=<?php echo $user['id']?>" class="btn btn-sm btn-outline-info">View</a>
                <a href="update.php?id=<?php echo $user['id']?>" class="btn b btn-sm btn-outline-secondary">Update</a>
                <form method="POST" style="display: inline-block" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
            <?php $index++ ?>
        </tr>
    <?php endforeach;?>
</tbody>
</table>
</div>
<?php include 'partials/footer.php'?>