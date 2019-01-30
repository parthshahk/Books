<?php
    include './includes/config.php';

    $id='';
    if(isset($_GET['q'])){
        $id = $_GET['q'];
    }else{
        header('Location: '.BaseAddress);
    }
    
    $statement = $pdo->prepare('SELECT * FROM items WHERE ID = :id');
    $statement->execute(['id' => $id]);
    $row = $statement->fetch();

    if($row == null){
        header('Location: '.BaseAddress);
    }

    $inCart = 0;
    foreach ($_SESSION['cart'] as $object) {
        if($object['id'] == $id){
            $inCart = 1;
            break;
        }
    }

    $title = $row['Name']." - Malgadi Books";
    $pageDescription = $row['Description'];
    $imagePath = BaseAddress."/images/products/".$row['ID'].".0.jpg";
    $canonUrl = BaseAddress."/item.php?q=".$row['ID'];

    $extendNavbar=0;
    $searchVisibility=1;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';
?>
        <section class="grey-text text-darken-3 product-details">
            <div class="container">
                <div class="row">
                    <div class="col m5 s12">
                        <img src="<?php echo BaseAddress."/images/products/".$row['ID'].".0.jpg"; ?>" alt="<?php echo $row['Name'];?>" class="responsive-img materialboxed">
                    </div>
                    
                    <div class="col m6 offset-m1 s12">
                        <h5 class="light"><?php echo $row['Name']; ?></h5>
                        <p class="green-text <?php echo $row['Stock Status'] ? '' : 'hide'; ?>">In Stock</p>
                        <p class="red-text <?php echo $row['Stock Status'] ? 'hide' : ''; ?>">Out Of Stock</p>
                        <h5 class="blue-text text-darken-2 light">Rs. <?php echo $row['Selling Price']; ?> <strike class="grey-text">Rs. <?php echo $row['Original Price']; ?></strike></h5>
                        <button class="btn-large waves-effect waves-light blue darken-2 <?php echo $row['Stock Status'] ? '' : 'disabled'; ?>" onclick="addToCart(<?php echo $row['ID'];?>)" id="item<?php echo $row['ID'];?>"><span id="button-text">Add</span> <i id="icon<?php echo $row['ID']; ?>" class="fa fa-cart-plus right" aria-hidden="true"></i></button>
                        <p class="light">The quantity can be changed from the cart.</p>
                        <p class="light">Rent options available at checkout.</p> 
                    </div>
                </div>
                <?php
                    if(!$row['Stock Status']){
                ?>
                <div class="row" id="notify">
                    <div class="col s12 m6 l4 input-field grey lighten-4">
                        <p class="light">Notify me when this product is in stock.</p>
                        <input type="email" placeholder="Your Email Address" id="notify-email" autocomplete="email">
                        <button class="btn waves-effect waves-light blue darken-2" onclick="notifyMe(<?php echo $row['ID']; ?>)">Notify Me</button>
                        <p class="light">We renew our inventory quite often or might even do it just for you!</p>
                        <p class="light">So make sure that you add your email address above so that we can contact you when this product is available.</p>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="row">
                <?php
                    if($row['Description'] != '-'){
                ?>
                    <div class="col s12">
                        <h5 class="light">Description</h5>
                        <p class="light"><?php echo $row['Description']; ?></p>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </section>  

        <section>
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmalgadi.co.in%2F&width=230&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="250" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </section>

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
            if($inCart){
        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    modifyInCart(<?php echo $row['ID'] ?>);
                });
            </script>
        <?php
            }
        ?>
<?php
    include './includes/footer.php';
?>