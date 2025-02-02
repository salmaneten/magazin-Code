<?php 
    require 'database.php';
    $nameError  =  $descriptionError =  $priceError =  $categoryError =  $imageError = $name = $description = $price =  $category = $image ="";
    if(!empty($_POST))
    {
        $name            = checkInput($_POST['name']);
        $description     = checkInput($_POST['description']);
        $price           = checkInput($_POST['price']);
        $category        = checkInput($_POST['category']);
        $image           = checkInput($_FILES['image']['name']); // Pour récupérer l'image on doit passer par le superglobal $_FILES[][] 
        $imagePath       = '../images/' . basename($image);
        $imageExtension  = pathinfo($imagePath, PATHINFO_EXTENSION);
        $isSuccess       = true;
        $isUploadSuccess = false;

        if(empty($name))
        {
            $nameError = 'Ce champ ne peut pas être vide!';
            $isSuccess = false;
        }
        if(empty($description))
        {
            $descriptionError = 'Ce champ ne peut pas être vide!';
            $isSuccess = false;
        }
        if(empty($price))
        {
            $priceError = 'Ce champ ne peut pas être vide!';
            $isSuccess = false;
        }
        if(empty($image))
        {
            $imageError = 'Ce champ ne peut pas être vide!';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif")
            {
                $imageError = "Les fichiers autorisés sont : .jpg, .jpeg, .gif, .png";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath))
            {
                $imageError = "Le fichier existe déjà";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000)
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";   // 1KB = 1000 bits
                $isUploadSuccess = false;
            }
            if($isUploadSuccess)
            {
                    if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))         // maintenant notre fichier est encore temporelle la fonction move_uploaded_file() va permettre de mettre l'image dans $imagePath et la checker avec le vrai path    
                {
                    $imageError = "Il y a eu une erreur lors de téléchargement";
                    $isUploadSuccess = false;
                }
            }
        }
        
        if($isSuccess && $isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO product (name, description, price, img, category) VALUES (:name, :descrition, :price, :img, :category)");
            $statement->execute(['name' => $name, 'description' => $description, 'price' => $price, 'img' => $image, 'category' => $category]);
            Database::disconnect();
            header("Location: index.php"); // Pour changer l'adresse et se mettre sur la page index.php
        }

    }


    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!Doctype html>
<html>

<head>
    <title>magazin Code</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/glyphicon.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1 class="text-logo"><span class="glyphicon glyphicon-home"></span>Magazin Code<span
            class="glyphicon glyphicon-home"></span></h1>
    <div class="container admin">


        <h1><strong>Ajouter un produit</strong></h1>
        <br>
        <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom : </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom"
                    value="<?php echo $name; ?>">
                <span class="help-inline"><?php echo $nameError;?></span>
            </div>
            <div class="form-group">
                <label for="description">Description : </label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description"
                    value="<?php echo $description; ?>">
                <span class="help-inline"><?php echo $descriptionError;?></span>
            </div>
            <div class="form-group">
                <label for="price">Prix : (en €) </label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix"
                    value="<?php echo $price; ?>">
                <span class="help-inline"><?php echo $priceError;?></span>
            </div>
            <div class="form-group">
                <label for="category">Catégorie : </label>
                <select class="form-control" name="category" id="category">
                    <?php 
                                $db = Database::connect();
                                foreach($db->query('SELECT * FROM categories') as $row)
                                {
                                    echo '<option value ="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                                Database::disconnect();
                            ?>
                </select>
                <span class="help-inline"><?php echo $categoryError;?></span>
            </div>
            <div class="form-group">
                <label for="image">Sélectionner une image :</label> <br>
                <input type="file" id="image" name="image"> <br>
                <span class="help-inline"><?php echo $imageError;?></span>
            </div>

            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>
                    Ajouter</button>
                <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>
                    Retour</a>

            </div>
        </form>

    </div>
</body>

</html>