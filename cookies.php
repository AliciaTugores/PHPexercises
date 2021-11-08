<?php
if(isset($_COOKIE['contador'])){
    setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60);
    $message = 'Número de visitas en este sitio web: '.++$_COOKIE['contador'];
}
else{
    setcookie('contador', 1, time()+ 365 * 24 * 60 * 60);
    $message = 'Bienvenido a esta página web, es la primera vez que nos visitas';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php echo $message; ?>
</body>
</html>