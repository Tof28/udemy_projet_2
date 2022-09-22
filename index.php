<?php
    //VERIFIER SI L'IMAGE A BIEN ETE RECUE
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $error = 1;

        //VERIFIER LA TAILLE DE L'IMAGE
        if($_FILES['image']['size'] <= 3000000) {

        //VERIFIER QU'IL S'AGIT BIEN D'UNE IMAGE    
            $informationsImage = pathinfo($_FILES['image']['name']);
            $error = 'step one';
            $extensionImage = $informationsImage['extensions'];
            $error = 'step two';
            $extensionsArray = array('jpg', 'jpeg', 'gif', 'png');
            $error = 'step three';
            $address = 'uploads/'.time().rand().rand().'.'.pathinfo($_FILES['image']['name'])['extension'];
            $error = 'step four';
            $file = $_FILES['image']['tmp_name'];

        //ENVOYER L'IMAGE VERS LE DOSSIER DE TELECHARGEMENT
            if(in_array($extensionImage, $extensionsArray)) {
                $error = 'step five';
                $spawn = move_uploaded_file($file , './uploads/fuck.jpeg');
                $error = 'step six';
                $intel = $address;
                $error = 0;
            }
        }  
    };
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hébergeur d'images gratuit</title>
</head>
<style type="text/css">
    html, body {margin: 0;}
    header { text-align: center;color : white; background-color: red;}
    article { margin-top: 50px; background: #f7f7f7; padding: 10px;}
    h1 { margin-top: 0;}
    button { margin-top: 10px; text-align: center;}
</style>
<body>
    <header>
        <h2>PHOTOSHOOT</h2>
    </header>
    <article>
        <h1>Hébergez une image</h1>
            <?php
                if(isset($error) && $error == 0) {
                    echo '<img src="'.$address.'" />';
                }
                else{
                    echo $error;
                }
                echo $address . '</br>';
                var_dump($_FILES);
                var_dump(pathinfo($_FILES['image']['name'])['extension']);
                var_dump(is_uploaded_file($_FILES['image']['tmp_name']));
                echo 'reponse is : </br>';
                var_dump($spawn);
                echo 'tmp name is : </br>';
                var_dump($file);
            ?>
        <form method="POST" enctype="multipart/form-data">
            <p>
                <input type="hidden"/>
                <input type="file" required name="image"/><br />
                <button type="submit">Héberger</button>
            </p>
    </article>
</body>
</html>