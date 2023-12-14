<?php
    require_once("design/header.php");
    require_once("design/nav.php");
?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Registration Form</h2>
            <?php 
                if(isset($_SESSION['errors'])):
                    foreach($_SESSION['errors'] as $error): ?> 
                        <div class="alert alert-danger text-center">
                            <?php echo $error; ?>
                        </div>
                <?php 
                    endforeach;
                    unset($_SESSION['errors']);
                    endif;
                ?>
 
            <form class="border p-4" action="handelers/handelregister.php" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once("design/footer.php");
?>

