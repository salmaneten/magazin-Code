<!DOCTYPE html>
<html>
    <head>
        <title>Magazin Code</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/glyphicon.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
    <div class="container site">
        <h1 class="text-logo"><span class="glyphicon glyphicon-home"></span>Magazin Code<span
                class="glyphicon glyphicon-home"></span></h1>

        <?php
            require 'admin/database.php';
            echo '<nav> 
                    <ul class="nav nav-pills" role="tablist">';
            $db = Database::connect();
            $statement = $db->query('SELECT * FROM categories');
            $categories  = $statement->fetchAll();
            foreach($categories as $category)
            {
                if($category['id'] == '1' )
                    echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="#nvb' . $category['id'] . '"
                             data-toggle="tab">' . $category['name'] . '</a></li>';

                else
                    echo '<li class="nav-item" role="presentation"><a class="nav-link" href="#nvb' . $category['id'] . '"
                            data-toggle="tab">' . $category['name'] . '</a></li>';
            }
            echo '</ul>
            </nav>';
 
            echo '<div class="tab-content">';

            foreach($categories as $category)
            {
                if($category['id'] == '1' )
                    echo '<div id="nvb' . $category['id'] . '" class="tab-pane active">';
                else
                echo '<div id="nvb' . $category['id'] . '" class="tab-pane">';

                echo '<div class="row">';
                $statement = $db->prepare('SELECT * FROM product WHERE product.category = ?');
                $statement->execute(array($category['id']));
                while($item = $statement->fetch())
                {
                    echo ' <div class="col-sm-6 col-md-4">
                                <div class="card">
                                    <img src="images/' . $item['img'] . '" alt="..." class=" card-img-top">

                                    <div class="caption card-body">
                                        <div class="price">' . number_format((float)$item['price'], 2, '.', '') . ' €</div>
                                            <h5>'. $item['name']. '</h5>
                                            <p>'. $item['description'] .'</p>
                                            <a href="#" class="btn btn-order" role="button"><span
                                                    class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                        </div>
                                    </div>
                            </div>';
                }
                echo '</div>
                    </div>';

            }
            Database::disconnect();
            echo '</div>';

        ?> 

        </div>    
</body>
</html>