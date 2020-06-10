<?php
    require 'database.php';
    if(!empty($_GET['id'])){ // $_GET un super global pour récupérer lindex transmise par le lien .
        
        $id = checkInput($_GET['id']); 
    }

    $db = Database::connect();
    $statement = $db->prepare('SELECT product.id, product.name, product.description, product.price, product.img,
                    categories.name AS category FROM product LEFT JOIN categories ON product.category = categories.id
                    WHERE product.id = ?');
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

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
    <title>Burger Code</title>
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
        <div class="row">
            <div class="col-sm-6">
                <h1><strong>Voir un item</strong></h1>
                <br>
                <form>
                    <div class="form-group">
                        <label>Nom : </label><?php echo '  ' . $item['name'];?>
                    </div>
                    <div class="form-group">
                        <label>Description : </label><?php echo '  ' . $item['description'];?>
                    </div>
                    <div class="form-group">
                        <label>Prix : </label><?php echo '  ' . number_format((float)$item['price'], 2, '.', '') . ' €';?>
                    </div>
                    <div class="form-group">
                        <label>Catégorie : </label><?php echo '  ' . $item['category'];?>
                    </div>
                    <div class="form-group">
                        <label>Image : </label><?php echo '  ' . $item['img'];?>
                    </div>
                </form>
                <br> <br> <br>
                <div class="form-action">
                    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>
                        Retour</a>
                </div>
            </div>
            <div class="col-sm-6 site">
                <div class="card">
                    <img src="<?php echo '../images/' . $item['img'] ; ?>" alt="..." class=" card-img-top">

                    <div class="caption card-body">
                        <div class="price"><?php echo number_format((float)$item['price'], 2, '.', '') . ' €';?></div>
                        <h5><?php echo $item['name'];?></h5>
                        <p><?php echo $item['description'];?> </p>
                        <a href="#" class="btn btn-order" role="button"><span
                                class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
            

                    <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT product.id, product.name, product.description, product.price, product.img
                                                categories.name AS category FROM product LEFT JOIN categories ON product.category = categories.id
                                                ORDER BY product.id DESC');
                        while($item = $statement->fetch()){
                        echo '<tr>';
                            echo '<td>' . $item['name'] . '</td>';
                            echo '<td>' . $item['description'] . '</td>';
                            echo '<td>' . $item['price'] . '</td>';
                            echo '<td>' . $item['category'] . '</td>';
                            echo '<td width=350>';
                                echo '<a class="btn btn-default" href="view.php?id=' . $item['id'] . '"><span
                                        class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Voir</a>';
                                echo ' ';
                                echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"><span
                                        class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                                 echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '"><span
                                        class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                                echo '</td>';
                         echo '</tr>';
                        
                        }
                    
                    
                        Database::disconnect();
                    
                    ?>




                   
                
    
        