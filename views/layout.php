<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter. It's Whats Happening!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php
    if ($this->request->getPath() === '/login') echo '<link rel="stylesheet" href="css/login.css">';
    ?>
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<?php echo $content; ?>
</body>
</html>