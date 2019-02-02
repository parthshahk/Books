<?php
    include '../includes/config.php';
    include '../../includes/helpers.php';
    
    if(!isset($_SESSION['login'])){
        exit(0);
    }else{
        if($_SESSION['login'] != 1 && $_SESSION['login'] !=2){
            exit(0);
        }
    }
    
    if(isset($_REQUEST['action'])){
        $action = filterStringBasic($_REQUEST['action']);
    }else{
        exit("Action Not Found");
    }

    if($action == 'toggleStock'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }

        $item = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id");
        $item->execute(["id" => $id]); 
        $row = $item->fetch();
        if($row['Stock Status']){
            $s = $pdo->prepare("UPDATE items SET `Stock Status`=0 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }else{
            $s = $pdo->prepare("UPDATE items SET `Stock Status`=1 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }

    } elseif ($action == 'toggleHomepage'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }
        
        $item = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id");
        $item->execute(["id" => $id]); 
        $row = $item->fetch();
        if($row['Homepage']){
            $s = $pdo->prepare("UPDATE items SET `Homepage`=0 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }else{
            $s = $pdo->prepare("UPDATE items SET `Homepage`=1 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }

    } elseif ($action == 'toggleFeatured'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }
        
        $item = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id");
        $item->execute(["id" => $id]); 
        $row = $item->fetch();
        if($row['Featured']){
            $s = $pdo->prepare("UPDATE items SET `Featured`=0 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }else{
            $s = $pdo->prepare("UPDATE items SET `Featured`=1 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }

    }  elseif ($action == 'addProduct') {
        
        $fullName =         filterStringBasic($_POST['fullName']);
        $originalPrice =    filterStringBasic($_POST['originalPrice']);
        $sellingPrice =     filterStringBasic($_POST['sellingPrice']);
        $author =         filterStringBasic($_POST['author']);
        $branch =         filterStringBasic($_POST['branch']);
        $semester =         filterStringBasic($_POST['semester']);

        if($_POST['description']==''){
            $description='-';
        }else{
            $description = filterStringBasic($_POST['description']);
        }



        $sql = "INSERT INTO items(`Name`, `Original Price`, `Selling Price`, `Description`, `Author`, `Branch`, `Semester`, `Homepage`, `Featured`, `Stock Status`, `Deprecated`) VALUES(:fullName, :oPrice, :sPrice, :desc, :author, :branch, :sem, 0, 0, 1, 0)";

        $statement = $pdo->prepare($sql);

        $statement->execute(
            [
                'fullName'      => $fullName,
                'oPrice'        => $originalPrice,
                'sPrice'        => $sellingPrice,
                'desc'          => $description,
                'author'        => $author,
                'branch'        => $branch,
                'sem'           => $semester
            ]
        );

        $lastId = $pdo->lastInsertId();
        
        $target='../../images/products/'.$lastId.'.0.jpg';
        move_uploaded_file( $_FILES['img1']['tmp_name'], $target);


        header('Location: ../products.php');

    } elseif($action == 'editProduct') {

        $id =               filterStringBasic($_POST['id']);
        $fullName =         filterStringBasic($_POST['fullName']);
        $originalPrice =    filterStringBasic($_POST['originalPrice']);
        $sellingPrice =     filterStringBasic($_POST['sellingPrice']);
        $author =         filterStringBasic($_POST['author']);
        $branch =         filterStringBasic($_POST['branch']);
        $semester =         filterStringBasic($_POST['semester']);

        if($_POST['description']==''){
            $description='-';
        }else{
            $description = filterStringBasic($_POST['description']);
        }

        $sql = "UPDATE items SET `Name` = :fullName, `Original Price` = :oPrice, `Selling Price` = :sPrice, `Description` = :desc, `Author` = :author, `Branch` = :branch, `Semester` = :semester WHERE `ID` = :id";

        $statement = $pdo->prepare($sql);

        $statement -> execute(
            [
                'fullName'      => $fullName,
                'oPrice'        => $originalPrice,
                'sPrice'        => $sellingPrice,
                'desc'          => $description,
                'author'        => $author,
                'branch'        => $branch,
                'semester'      => $semester,
                'id'            => $id
            ]
        );


        if(!$_FILES['img1']['name']==''){
        
            if(file_exists("../../images/products/".$id.".0.jpg")){

                unlink("../../images/products/".$id.".0.jpg");
            }
    
            $target='../../images/products/'.$id.'.0.jpg';
            move_uploaded_file( $_FILES['img1']['tmp_name'], $target);
        }

        header('Location: ../products.php?id='.$id);

    }elseif($action == 'deleteProduct'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }

        $sql = "UPDATE items SET `Deprecated`=1 WHERE `ID` = :id";
        $statement = $pdo->prepare($sql);
        $statement -> execute(['id' => $id]);

        if(file_exists("../../images/products/".$id.".0.jpg")){
            unlink("../../images/products/".$id.".0.jpg");
        }
    }

?>