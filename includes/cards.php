        <section class="item-cards">
            <div class="container">
                <div class="row">
                    <?php

                        $rows = $cardObject->fetchAll();

                        foreach($rows as $row){

                            $inCart = 0;
                            foreach ($_SESSION['cart'] as $object) {
                                if($object['id'] == $row['ID']){
                                    $inCart = 1;
                                    break;
                                }
                            }
                            
                    ?>
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
                    <div class="col m4 s12">
                        <div class="card grey lighten-3">
                            <div class="card-image">
                                <img class="activator" src="<?php echo BaseAddress; ?>/images/products/<?php echo $row['ID']; ?>.0.jpg" alt="<?php echo $row['Name']; ?>">                                
                                <a id="item<?php echo $row['ID']; ?>" class="btn-floating halfway-fab blue darken-2 <?php echo $row['Stock Status'] ? '' : 'hide'; ?>" onclick="addToCart('<?php echo $row['ID']; ?>')">
                                    <i class="fa fa-cart-plus" aria-hidden="true" id="icon<?php echo $row['ID']; ?>"></i>
                                </a>
                                <a class="btn-floating halfway-fab purple <?php echo $row['Stock Status'] ? 'hide' : ''; ?>" href="item.php?q=<?php echo $row['ID']; ?>#notify">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4 truncate">
                                    <?php echo $row['Name']; ?>
                                </span>
                                <p class="blue-text text-darken-2 <?php echo $row['Stock Status'] ? '' : 'hide'; ?>">Rs. <?php echo $row['Selling Price']; ?> <strike class="grey-text">Rs. <?php echo $row['Original Price']; ?></strike>
                                    <?php
                                        echo "<span class='green-text text-darken-2'>" . round( ($row['Original Price'] - $row['Selling Price']) / $row['Original Price'] * 100 ) . "% OFF</span>";
                                    ?>
                                </p>
                                <p class='red-text'><?php echo $row['Stock Status'] ? '' : 'OUT OF STOCK'; ?></p>
                            </div>
                            <div class='card-reveal'>
                                <span class='card-title grey-text text-darken-4'><?php echo $row['Name']; ?><i class="fa fa-times right" aria-hidden="true"></i></span>
                                <p class="light">
                                    by <?php echo $row['Author'] ?>
                                </p>
                                <p>
                                <?php
                                    if($row['Description']!='-'){                                   // If description exists then show description

                                        echo $row['Description'];
                                    }
                                ?>
                                </p><p>Open product page for technical details.</p>
                            </div>
                            <div class='card-action'>
                                <a href='item.php?q=<?php echo $row['ID']; ?>' class='blue-text text-darken-2 truncate'>Open Page</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>