<?php
    include './includes/config.php';
    include './includes/helpers.php';

    $keywords='';
    if(isset($_GET['q'])){
        $keywords = filterStringBasic($_GET['q']);
    }else{
        header("Location: ".BaseAddress);
    }
    

    if($keywords == ''){
        header('Location: '.BaseAddress);
    }

    $keywordsQuery = "%".$keywords."%";

    $title = "Search for ".$keywords." - Malgadi Books";
    $pageDescription = "Malgadi books is a start-up organisation run by college students to provide academic engineering text books and reference books at reasonable rates to students pursuing engineering.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/search.php";

    $extendNavbar=0;
    $searchVisibility=1;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';
?>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                document.getElementById("search").value = "<?php echo $keywords; ?>";
            });
        </script>
        <section class="grey-text text-darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light" id="search-heading">
                            Search Results for '<?php echo $keywords; ?>'
                        </h4>
                    </div>
                </div>
            </div>
        </section>

        <?php   
            $cardObject = $pdo->prepare("SELECT * FROM items WHERE Name LIKE :keywords OR Author Like :keywords");
            $cardObject->execute(['keywords' => $keywordsQuery]);
            include './includes/cards.php';

            if($rows == null){
        ?>
            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row">
                        <div class="col s12 center">
                            <h5 class="light">
                                No Direct Matches Found
                            </h5>
                        </div>
                    </div>
                    <div class="row"></div>
                </div>
            </section>
            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    document.getElementById("search-heading").classList.add("hide");
                });
            </script>
        <?php
            }
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