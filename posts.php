<?php
    require_once("design/header.php");
    require_once("design/nav.php");
    $data = file_get_contents("https://jsonplaceholder.typicode.com/posts");
    $file = file_put_contents("data/posts.json",$data);
    $posts = json_decode($data,true); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>My Posts</title>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 align-center">
            <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">UserId</th>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                foreach ($posts as $post):

                ?>
                <th><?php echo $post['userId']; ?></th>
                <td><?php echo $post['id']; ?></td>
                <td><?php echo $post['title']; ?></td>
                <td><?php echo $post['body']; ?></td>
            </tr>
                <?php 
                endforeach;
                ?>
            </tbody>
            </table>
            </div>
        </div>
    </div>

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    require_once("design/footer.php");
?>

