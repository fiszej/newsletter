<?php
include 'bootstrap.php';


if ($_POST['submit'] && !empty($_POST['email'])) {
    $email = new Email();
    $email->address = $_POST['email'];
    $email->name = $_POST['name'];
    
    $newsletter = new Newsletter($email);
    $newsletter->addNewAdressToList();

}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Newsletter</title>
</head>
<body>

<div class="box">
   
    <form action="/" method="POST">
    <h4>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
        </svg>
        Newsletter
    </h4>
    <hr>
    <div class="mb-3">
        <label class="form-label">Your Name</label>
        <input type="text" name="name" class="form-control" autocomplete="off">
    </div>
    <label class="form-label">Email address</label>
        <input type="text" name="email" class="form-control" autocomplete="off">
        <p class="text-danger">
            <?= $newsletter->errors['valid'] ?? ''?>
            <?= $newsletter->errors['exists'] ?? ''?>
        </p>
    <input type="submit" name="submit" class="btn btn-primary" value="Subscribe">
    <p class="text-success"><?= $newsletter->errors['success'] ?? ''?></p>
    Back to <a href="/">home.</a>
    </form>
    </div>
</body>
</html>