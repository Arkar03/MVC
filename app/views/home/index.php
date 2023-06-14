<?php 
require_once APPROOT."/views/inc/header.php";
require_once APPROOT."/views/inc/nav.php";
?>
<body>
    <h1 class="text-primary">Hello World</h1>
    <?php flash('login_success') ?>
</body>
</html>
<?php print_r(getUserSession()) ?>
<?php require_once APPROOT."/views/inc/footer.php" ?>