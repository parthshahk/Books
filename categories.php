<?php
    include './includes/config.php';
    include './includes/helpers.php';

    $cat = '';
    if(isset($_GET['br']) && isset($_GET['sem'])){
        $branch = $_GET['br'];
        $branch = filterStringBasic($branch);
        $sem = $_GET['sem'];
        $sem = filterStringBasic($sem);
    }else{
        header('Location: '.BaseAddress);
    }
    
    $title = "Shop ".strtoupper($branch)." Sem ".$sem." Books Online Now - Malgadi Books";
    $pageDescription = "The following is our catalog of ".strtoupper($branch)." Sem ".$sem." Books. Shop them now at the most reasonable rates at Malgadi Books! Malgadi is a for the students, by the students venture started by college students.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/categories.php?br=".urlencode($branch)."&sem=".urlencode($sem);

    $extendNavbar=0;
    $searchVisibility=1;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';
?>

        <section class="grey-text text-darken-3">
            <div class="container">
                <div class="row"></div>
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light"><?php if($branch != 'cm') echo strtoupper($branch) . " "; echo "Sem ". $sem . " Books"; ?></h4>
                    </div>
                </div>
            </div>
        </section>

        <?php
            $cardObject = $pdo->prepare('SELECT * FROM items WHERE `Branch` = :br AND `Semester` = :sem AND `Deprecated`=0 ORDER by `ID` DESC');
            $cardObject->execute(['br' => $branch, 'sem' => $sem]);
            include './includes/cards.php';
        ?>

        <section class="grey-text text-darken-3 hide-on-large-only">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <button class="btn-large waves-light waves-effect blue darken-2" onclick="openSidenav()">Browse Categories<i class="fa fa-list right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </section>

<?php
include './includes/footer.php';
?>