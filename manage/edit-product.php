<?php
    include './includes/config.php';
    include '../includes/helpers.php';

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != 1){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }else{
        header("Location: ".ManageAddress."/handlers/logout.php");
    }

    $title = 'Edit Product - Malgadi Books';
    $thisPage = 'products';

    include  './includes/header.php';

    if(isset($_GET['q'])){
        $id = filterStringBasic($_GET['q']);
    }else{
        header("Location: ./products.php");
    }
    
    $p = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id");
    $p->execute(["id" => $id]);
    $row = $p->fetch();

    $branch['cm']='';
    $branch['ce']='';
    $branch['it']='';
    $branch['ec']='';
    $branch['mh']='';
    $branch['ic']='';
    $branch['cl']='';
    $branch['ch']='';
    $branch[$row['Branch']]='selected';

    $sem['1']='';
    $sem['2']='';
    $sem['3']='';
    $sem['4']='';
    $sem['5']='';
    $sem['6']='';
    $sem['7']='';
    $sem[$row['Semester']]='selected';
    
?>

            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Edit Product</h4>
                        </div>
                        <div class="col s12 center">
                            <p class="light">Please read these <a href="#editIns" class="modal-trigger">instructions</a> carefully before editing a product.</p>
                        </div>
                    </div>

                    <form id="edit-product" method="POST" action="handlers/product.php" enctype="multipart/form-data" onsubmit="editProduct()">

                        <input name="action" value="editProduct" class="hide">
                        <input name="id" value="<?php echo $row['ID'] ?>" class="hide">

                    <div class="row">                        

                        <div class="col s6 m8 offset-m2 input-field">
                            <input id="fullName" type="text" name="fullName" value="<?php echo $row['Name']; ?>" required>
                            <label for="fullName">Full Name*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="original_price" type="number" name="originalPrice" value="<?php echo $row['Original Price']; ?>" required>
                            <label for="original_price">Original Price*</label>
                        </div>
                        <div class="col s6 m4 input-field">
                            <input id="selling_price" type="number" name="sellingPrice" value="<?php echo $row['Selling Price']; ?>" required>
                            <label for="selling_price">Selling Pirce*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <textarea id="description" name="description" class="materialize-textarea"><?php echo $row['Description']; ?></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="col s6 m4 input-field">
                            <textarea id="author" name="author" class="materialize-textarea"><?php echo $row['Author']; ?></textarea>
                            <label for="author">Author</label>
                        </div>
                    
                    </div>
                    
                    <div class="row">
                        
                        <div class="col s6 m4 offset-m2">
                            <label>Branch*</label>
                            <select class="browser-default" name="branch" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="cm" <?php echo $branch['cm'] ?>>Common</option>
                                <option value="ce" <?php echo $branch['ce'] ?>>CE</option>
                                <option value="it" <?php echo $branch['it'] ?>>IT</option>
                                <option value="ec" <?php echo $branch['ec'] ?>>EC</option>
                                <option value="mh" <?php echo $branch['mh'] ?>>Mech</option>
                                <option value="ic" <?php echo $branch['ic'] ?>>IC</option>
                                <option value="cl" <?php echo $branch['cl'] ?>>Civil</option>
                                <option value="ch" <?php echo $branch['ch'] ?>>Chem</option>
                            </select>
                        </div>

                        <div class="col s6 m4">
                            <label>Semester*</label>
                            <select class="browser-default" name="semester" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1" <?php echo $sem['1'] ?>>1</option>
                                <option value="2" <?php echo $sem['2'] ?>>2</option>
                                <option value="3" <?php echo $sem['3'] ?>>3</option>
                                <option value="4" <?php echo $sem['4'] ?>>4</option>
                                <option value="5" <?php echo $sem['5'] ?>>5</option>
                                <option value="6" <?php echo $sem['6'] ?>>6</option>
                                <option value="7" <?php echo $sem['7'] ?>>7</option>
                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="file-field input-field col s12 m8 offset-m2">
                            <div class="btn blue-grey darken-4">
                                <span>IMG</span>
                                <input type="file" accept=".jpg" name="img1">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-light waves-effect blue-grey darken-4" type="submit" form="edit-product" id="editSubmit">Submit</button>
                        </div>
                    </div>


                    </form>

                </div>
            </section>

            <div id="editIns" class="modal">
                <div class="modal-content">
                    <h4 class="light">Editing a Product</h4>
                    <p class="light">It's important to keep the following things in mind before editing a product.</p>
                    <ul class="collection light">
                        <li class="collection-item">Leave the image inputs blank if you do not want to change the image.</li>
                        <li class="collection-item">"Full Name" is the name displayed on the product page.</li>
                        <li class="collection-item">Original price is the price that will be <strike>striked out</strike>.</li>
                        <li class="collection-item">Selling price is the price with which the item will be sold.</li>
                        <li class="collection-item">IMG is compulsory to add, it will be used as the main image of the product.</li>
                        <li class="collection-item">The image specs are as follows: Dimensions: 400X400 px. File extension: .jpg</li>
                        <li class="collection-item">The tutorial file should always be a zip file.</li>
                    </ul>
                    <p class="light">If the above conditions are not followed, the website is likely to show errors.</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>


<?php
    include './includes/footer.php';
?>