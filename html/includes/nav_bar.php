
<div id="nav_bar">
    <a href="../views/messages.php">Messages</a>
    <a href="../views/profile.php">My profile</a>
    <?php if($_SESSION['role'] == 'admin'){ ?>
    <a href="../views/users.php">Manage users</a>
    <?php } ?>
</div>
