<!DOCTYPE html>
<html lang="en">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        id: <input type="text" name="id">   
        isim: <input type="text" name="name">   
        soyisim: <input type="text" name="sur">   
<br>
        <input type="submit" name="insert" value="insert">  
        <input type="submit" name="update" value="update">
        <input type="submit" name="delete" value="delete">
    </form>

    <?php 
    include 'config.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = htmlspecialchars($_POST["name"]);
                $surname = htmlspecialchars($_POST["sur"]);
                $postedId = htmlspecialchars($_POST["id"]);
            if(isset($_POST['insert'])) {
                $id = DB::insert(
                    'insert into tablo(isim, soyisim) values (?, ?)', array($name, $surname)
                );
                echo 'Yeni eklenen üyemizin IDsi'.$id;
            }
            if(isset($_POST['update'])) {
                $updated = DB::exec(
                    'update tablo set isim = ?, soyisim = ? where id = ?', array($name, $surname, $postedId)
                );
                echo $updated.'. üye düzenlendi';
            }
            if(isset($_POST['delete'])) {
                $deleted = DB::exec('delete from tablo where id = ?', array($postedId));
 
                echo $deleted. '. üye silindi.';
            }
        }
    ?>
</body>
</html>