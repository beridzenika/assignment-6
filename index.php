<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
    
    <?php
    
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'school_project';

    $connection = mysqli_connect($serverName, $userName, $password, $dbName);

    if(!$connection) {
        echo "connection faild";
        die();
    } 
    

    $name = isset($_POST['name']) && $_POST['name'] ? $_POST['name'] : null ;
    if ($name) {
        $insert_query = "INSERT INTO categories (name) VALUES('$name')";

        if (mysqli_query($connection, $insert_query)) {
            echo "Record created";
        } else {
            echo "error";
        }
    }


    $id = isset($_POST['id']) && $_POST['id'] ? $_POST['id'] : null ;
    if ($id) {
        $delete_query = "DELETE FROM categories WHERE id = " . $id;
    
        if (mysqli_query($connection, $delete_query)) {
            echo "Record created";
        } else {
            echo "error";
        }
    }


    $sql = "SELECT * FROM students";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);



    ?>



    <form action="" method="post">
        <label>name</label>
        <input type="text" name="name">

        <label>lastname</label>
        <input type="text"  name="lastname">

        <label>age</label>
        <input type="number"  name="age">

        <button>add</button>
    </form>

    <table id="customers">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>lastname</th>
            <th>age</th>
            <th></th>
        </tr>
        <tr> 
        <?php foreach ($rows as $value) { ?>
            <td><?= $value['id']?></td>
            <td><?= $value['name']?></td>
            <td><?= $value['lastname']?></td>
            <td><?= $value['age']?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                    <button>X</button>
                </form>    
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>