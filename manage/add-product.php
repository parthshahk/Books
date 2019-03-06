<?php
    include './includes/config.php';

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != 1){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }else{
        header("Location: ".ManageAddress."/handlers/logout.php");
    }

    $title = 'Add Product - Malgadi Books';
    $thisPage = 'products';

    include  './includes/header.php';
?>

            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Add Product</h4>
                        </div>
                        <div class="col s12 center">
                            <p class="light">Please read these <a href="#addIns" class="modal-trigger">instructions</a> carefully before adding a product.</p>
                        </div>
                    </div>

                    <form id="add-product" method="POST" action="handlers/product.php" enctype="multipart/form-data" onsubmit="addProduct()">
                        <input name="action" value="addProduct" class="hide">
                    <div class="row">                        

                        <div class="col s12 m8 offset-m2 input-field">
                            <input id="fullName" type="text" name="fullName" required>
                            <label for="fullName">Full Name*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="original_price" type="number" name="originalPrice" required>
                            <label for="original_price">Original Price*</label>
                        </div>
                        <div class="col s6 m4 input-field">
                            <input id="selling_price" type="number" name="sellingPrice" required>
                            <label for="selling_price">Selling Pirce*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <textarea id="description" name="description" class="materialize-textarea"></textarea>
                            <label for="description">Description</label>
                        </div>

                        <div class="col s6 m4 input-field">
                            <textarea id="author" name="author" class="materialize-textarea"></textarea>
                            <label for="author">Author</label>
                        </div>
                    
                    </div>
                    
                    <div class="row">
                        
                        <div class="col s6 m4 offset-m2">
                            <label>Branch*</label>
                            <select class="browser-default" name="branch" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="bs">BookShelf</option>
                                <option value="cm">Common</option>
                                <option value="ce">CE</option>
                                <option value="it">IT</option>
                                <option value="ec">EC</option>
                                <option value="mh">Mech</option>
                                <option value="ic">IC</option>
                                <option value="cl">Civil</option>
                                <option value="ch">Chem</option>
                            </select>
                        </div>

                        <div class="col s6 m4">
                            <label>Semester*</label>
                            <select class="browser-default" name="semester" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="file-field input-field col s12 m8 offset-m2">
                            <div class="btn blue darken-2">
                                <span>IMG*</span>
                                <input type="file" accept=".jpg" name="img1" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-light waves-effect blue darken-2" type="submit" form="add-product" id="addSubmit">Submit</button>
                        </div>
                    </div>


                    </form>

                </div>
            </section>

            <div id="addIns" class="modal">
                <div class="modal-content">
                    <h4 class="light">Adding a Product</h4>
                    <p class="light">It's important to keep the following things in mind before adding a product.</p>
                    <ul class="collection light">
                        <li class="collection-item">"Full Name" is the name displayed on the product page.</li>
                        <li class="collection-item">Original price is the price that will be <strike>striked out</strike>.</li>
                        <li class="collection-item">Selling price is the price with which the item will be sold.</li>
                        <li class="collection-item">IMG is compulsory to add, it will be used as the main image of the product.</li>
                        <li class="collection-item">The image specs are as follows: Dimensions: 200X250 px. File extension: .jpg</li>
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