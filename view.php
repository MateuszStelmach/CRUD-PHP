<?php
require __DIR__ .'/users/users.php';
require_once 'partials/header.php';
if(!isset($_GET['id'])){
    include 'partials/not_found.php';
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if(!$user){
    include 'partials/not_found.php';
    exit;
}
?>
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>View User: <b><?php echo $user['name']?></b></h3>
    </div>
    <div class="card-body">
            <a class="btn btn-secondary" href="update.php?id=<?php echo $user['id'] ?>">Update</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    <table class="table">
        <tbody>
            <tr>
                <th>Name:</th>
                <td><?php echo $user['name']?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th>Username:</th>
                <td><?php echo $user['username']?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th>Email:</th>
                <td><?php echo $user['email']?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th>Phone:</th>
                <td><?php echo $user['phone']?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th>Website:</th>
                <td><a target="_blank" href="https://<?php echo $user['website'];?>"><?php echo $user['website'];?></a></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<?php include 'partials/footer.php'?>