<?php
    include './includes/config.php';

    $title = "About Us - Malgadi Books";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/about.php";

    $extendNavbar=0;
    $searchVisibility=0;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';
?>
        <section class="grey-text text-darken-3 grey lighten-4" id="details">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light">About Us</h4>
                    </div>
                    <div class="col s12">
                        <p class="light">
                            Malgadi books is a start-up organisation run by college students to provide academic engineering text books and reference books at reasonable rates to students pursuing engineering. We here at Malgadi intend to develop the platform whereby selling engineering textbooks on fingertips and help college students with their studies. Along with this, we also actively organize workshops and seminars in colleges to bestow technical knowledge to students.
                        </p>
                        <p class="light">
                            We believe in providing the best quality of service to our customers, all books at Malgadi Books are verified for their integrity by our experts. 
                        </p>
                        <h5 class="light center">Our Values</h5>
                        <div class="row"></div>
                        <div class="row">
                            <div class="col s4 light center aboutvision">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i><br>
                                We believe in making friends, not costumers.
                            </div>
                            <div class="col s4 light center aboutvision">
                                <i class="fa fa-users" aria-hidden="true"></i><br>
                                We believe in providing, not earning.   
                            </div>
                            <div class="col s4 light center aboutvision">
                                <i class="fa fa-heart-o" aria-hidden="true"></i><br>    
                                We believe in helping others before benefiting ourselves.
                            </div>
                        </div>
                    </div>
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

        <section id="photos" class="grey-text text-darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h5 class="light">Meet The Team</h5>
                    </div>
                    <div class="col s12 center">
                        <p class="light">We are passionate about Malgadi and strive to work together to provide the best service to our customers.</p>
                    </div>
                    <div class="col s10 offset-s1 divider"></div>
                </div>
                <div class="row center">
                    <?php
                        $members = file_get_contents("./json/team.json");
                        $members = json_decode($members,true);
                        foreach ($members as $member) {
                    ?>
                    <div class="col s12 m4 l3">
                        <img src="<?php echo BaseAddress; ?><?php echo $member['image']; ?>" class="circle">
                        <h5 class="light"><?php echo $member['name']; ?></h5>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
<?php
    include './includes/footer.php';
?>