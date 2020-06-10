<!Doctype html>
<html>

<head>
    <title>Magazin Code</title>
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
            <h1><strong>Liste des items    </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
            <table class="table table-striped table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT product.id, product.name, product.description, product.price, product.img,
                                                categories.name AS category FROM product LEFT JOIN categories ON product.category = categories.id
                                                ORDER BY product.id DESC');
                        while($item = $statement->fetch()){
                        echo '<tr>';
                            echo '<td>' . $item['name'] . '</td>';
                            echo '<td>' . $item['description'] . '</td>';
                            echo '<td>' . number_format((float)$item['price'], 2, '.', '') . '</td>'; // on a utilisé la fonction number_format(la valeur, combien de chiffres apres la virgules, . ou , pour la matérialiser, le truc de séparation entre millier milions ): il a 4 argument
                            echo '<td>' . $item['category'] . '</td>';
                            echo '<td width=350>';
                                echo '<a class="btn btn-light" href="view.php?id=' . $item['id'] . '"><span
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




                   
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>