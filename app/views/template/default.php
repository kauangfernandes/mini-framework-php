<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
        if(is_array($css) && count($css) > 0){
            foreach ($css as $fileName) {
                echo "<link rel='stylesheet' href='/css/{$fileName}.css'>";
            }
        }

        if(is_array($js) && count($js) > 0){
            foreach ($js as $fileName) {
                echo "<script src='/js/{$fileName}.js' defer></script>";
            }
        }
    ?>

    <link rel="shortcut icon" href="/storage/icon/" type="image/x-icon">
    
    <title><?php echo $title." | ".$nameApp?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container">
        <div class="row">
            <?php
                require_once "../app/views/pages/{$page}.php";
            ?>
        </div>
    </div>

    <?php require_once "footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>-->
</body>
</html>