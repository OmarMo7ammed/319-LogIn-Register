<?php
    require_once("design/header.php");
    require_once("design/nav.php");
?>

    <div class="container">
        <div class="row">
            <div class="col-m mx-auto my-5 border p-2 bg-danger">
                <h2 class="border my-3 p-2 bg-primary">Name : <?php echo $_SESSION['auth'][0]; ?> </h2>
                <h2 class="border my-3 p-2 bg-primary">Email : <?php echo $_SESSION['auth'][1]; ?></h2>
            </div>
        </div>
    </div>

<?php
    require_once("design/footer.php");
?>

