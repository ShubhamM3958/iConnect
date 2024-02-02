<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="The iConnect Society is a student organization located at PDUIIC in GJUS&T,Hisar. Its goal is to encourage innovation, collaboration, and skill development among students.">
    <meta name="keywords" content="GJU,GJUS&T,Guru,Jambheshwar,University,Science,Technology,Hackathon,Visionthon,Viz Wiz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="googlebot" content="noindex">
    <meta name="googlebot-news" content="nosnippet">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&amp;family=Montserrat:ital@1&amp;family=Sacramento&amp;display=swap"
            rel="stylesheet"
    />
    <link
            href="https://fonts.googleapis.com/css?family=Montserrat|Baloo+Chettan+2|Tangerine&display=swap"
            rel="stylesheet"
    />

    <link
            href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
            rel="stylesheet"
    />

    <link
            href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
            rel="stylesheet"
    />
    <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"
    ></script>
    <link rel="icon" type="image/x-icon" href="images/iconnect.jpg" />
    <link rel="stylesheet" href="index_layout.css" />
    <link rel="stylesheet" href="template/nav_style.css"/>
    <link rel="stylesheet" href="template/footer_style.css"/>
    <title>iConnect Society</title>
</head>
<body>

<?php
define('key', TRUE);
?>
<?php
//$servername = "localhost";
//$username = "root";
//$password = "root";
//$database = "iconnect_test";

$servername = "118.139.160.140";
$username = "shubham_poco";
$password = "Shubham#Sql3958";
$database = "iconnect_test";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    $error_message = "Connection Error";
}
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Initialize an empty array to store the events
$events = [];

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row and fetch data
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            "name" => $row["name"],
            "poster" => $row["icon"],
            "active" => (bool) $row["active"]
        ];
    }
}
$conn->close();
?>
<?php include('template/nav.php'); ?>
<div id="scroll-line">
    <div id="scroll-indicator"></div>
</div>

<div id="links">
    <div id="float-btn"><i class="fas fa-arrow-up"></i></div>
</div>

<section class="head-section">
    <div id="head-bg"></div>
    <div id="head-obj2"></div>
    <div id="head-obj"></div>

    <div id="head-content" class="reveal fade-bottom">
        <h1 class="heading">
            <span class="text-theme">i</span>Connect Society
            <!-- <sub>2024</sub> -->
        </h1>
        <p class="pt-2 m-0">
            Pandit Deendayal Upadhyay Innovation & Incubation Center
        </p>
        <p class="m-0">Guru Jambheshwar University of Science and Technology</p>
        <p class="m-0">Hisar, Haryana, 125001</p>
    </div>
</section>
<br />
<!--<hr />-->
<section id="event">
    <div class="event-content text-center pt-3 pb-3">
        <h1 class="section-title heading reveal fade-bottom">Recent Opportunity</h1>
        <div
                class="konark rounded-5 m-3"
                style="
            background-image: url('images/konark_bg_dark.png');
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
          "
        >
            <div class="row pt-1 m-0">
                <div class="col">
                    <span class="">GJUS'T, HISAR, HARYANA</span>
                </div>
                <div class="col">
                    <span class="">07TH & 8TH FEB 2024</span>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-md">
                    <img class="w-25" src="images/konark_logo_white.png" />
                    <img class="w-50" src="images/konark_font.png" />
                    <h2 class="color-yellow text-decoration-underline">
                        THE CHARIOT OF INNOVATION
                    </h2>
                </div>
                <div class="col-md d-flex flex-column align-items-center pt-1">
                    <img class="w-75" src="images/konark_activity.png" />
                    <a
                            class="p-1"
                            href="https://unstop.com/college-fests/konark-the-chariot-of-innovation-guru-jambheshwar-university-of-science-and-technology-hisar-haryana-193383"
                            target="_blank"
                    >
                        <button class="btn btn-outline-light">Register</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row m-0 reveal fade-bottom"> <!-- justify-content-center -->
            <?php
                foreach ($events as $index => $event):
                    if($event['active']):
            ?>
                    <div class="col-6 col-md-5 col-lg-3 workshop-card p-2">
                        <a class="nav-link" href="register.php?eventid=<?php echo $index ?>">
                            <img
                                    class="img-fluid workshop-logo"
                                    src="<?php echo $event['poster'] ?>"
                            />
                            <h5><?php echo $event['name'] ?></h5>
                        </a>

                    </div>

                <?php endif; endforeach; ?>
        </div>
        <!-- <h1 class="section-title pt-2">Past Events</h1> -->
        <div class="hl_pe mt-5">
            <h3 class="m-3">PAST EVENTS</h3>
        </div>
        <div class="d-flex justify-content-center">
            <div
                    id="image-carousel"
                    class="splide p-2"
                    aria-label="Past Event Images"
            >
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="images/poster/myStrory.jpeg" alt="" />
                            <!-- <div style="text-align: center">My Story 2023</div> -->
                        </li>
                        <li class="splide__slide p-2">
                            <img src="images/poster/sih.jpeg" alt="" />
                            <!-- <div style="text-align: center">SIH 2023</div> -->
                        </li>
                        <li class="splide__slide p-2">
                            <img src="images/poster/ideathon.jpeg" alt="" />
                            <!-- <div style="text-align: center">Ideathon 2023</div> -->
                        </li>
                        <li class="splide__slide p-2">
                            <img src="images/poster/myStrory2.jpeg" alt="" />
                            <!-- <div style="text-align: center">My Story 2024</div> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- <div class="container">
          <div class="row align-items-center event-slider">
            <div class="col text-center">
              <img class="w-75" src="img/punk_bg.png" />
              <span class="w-100 slider-text">Ideathon</span>
            </div>
            <div class="col">
              <img class="w-75" src="img/punk_bg.png" />
            </div>
            <div class="col">
              <img class="w-75" src="img/punk_bg.png" />
            </div>
            <div class="col">
              <img class="w-75" src="img/punk_bg.png" />
            </div>
            <div class="col">
              <img class="w-75" src="img/punk_bg.png" />
            </div>
            <div class="col">
              <img class="w-75" src="img/punk_bg.png" />
            </div>
          </div>
        </div> -->
    </div>
</section>
<br />
<!--<hr />-->
<section id="aboutus">
    <div class="about-content text-center overflow-hidden">
        <div class="reveal fade-bottom" style="width: 90%; padding-top: 30px">
            <h1 class="effect pt-3 heading">ABOUT US</h1>
            <h1 class="effect heading">ABOUT US</h1>
            <h1 class="effect heading">ABOUT US</h1>
        </div>
        <div class="separator-top"></div>
        <div class="overflow-hidden pt-5 pl-5">
            <div class="row">
                <div
                        class="col-lg-3 d-flex justify-content-center align-items-center"
                >
                    <div class="row row-md-6 col-lg-6 p-0">
                        <div
                                class="col-4 m-lg-5"
                        >
                            <button class="cyber-btn about-button active" text="iConnect">
                                iConnect
                            </button>
<!--                            <div class="btn-punk">-->
<!--                                <span>iConnect</span>-->
<!--                            </div>-->
                            <!-- <button class="btn btn-outline-theme">iConnect</button> -->
                        </div>
                        <div class="col-4 m-lg-5">
                            <button class="cyber-btn about-button" text="PDUIIC">
                                PDUIIC
                            </button>
<!--                            <div class="btn-punk">-->
<!--                                <span>PDUIIC</span>-->
<!--                            </div>-->
                        </div>
                        <div class="col-4 m-lg-5">
                            <button class="cyber-btn about-button" text="GJUS'T">
                                GJUS'T
                            </button>
<!--                            <div class="btn-punk">-->
<!--                                <span>GJUS'T</span>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 position-relative pt-2" style="height: 550px">
                    <div class="custom-card text-center about-info active">
                        <div class="card-header">
                            <h3 class="about-info-head">iConnect</h3>
                        </div>
                        <div class="card-body">
                            <p class="about-text">
                                The iConnect Society is a student organization located at
                                the Pandit Deendayal Upadhyay Innovation & Incubation Center
                                (PDUIIC) at GJUS&T in Hisar. Its goal is to encourage
                                innovation, collaboration, and skill development among
                                students. iConnect is run by a well-defined administrative
                                team, an influential advisory panel, and a mentoring system.
                            </p>
                        </div>
                    </div>
                    <div class="custom-card text-center about-info">
                        <div class="card-header">
                            <h3 class="about-info-head">PDUIIC</h3>
                        </div>
                        <div class="card-body">
                            <p class="about-text">
                                The iConnect Society is a student organization located at
                                the Pandit Deendayal Upadhyay Innovation & Incubation Center
                                (PDUIIC) at GJUS&T in Hisar. Its goal is to encourage
                                innovation, collaboration, and skill development among
                                students. iConnect is run by a well-defined administrative
                                team, an influential advisory panel, and a mentoring system.
                            </p>
                            <a class="link-light link-underline-opacity-0 border-1" href="">Visit Site</a>
                        </div>
                    </div>
                    <div class="custom-card text-center about-info">
                        <div class="card-header">
                            <h3 class="about-info-head">GJUS'T</h3>
                        </div>
                        <div class="card-body">
                            <p class="about-text">
                                The iConnect Society is a student organization located at
                                the Pandit Deendayal Upadhyay Innovation & Incubation Center
                                (PDUIIC) at GJUS&T in Hisar. Its goal is to encourage
                                innovation, collaboration, and skill development among
                                students. iConnect is run by a well-defined administrative
                                team, an influential advisory panel, and a mentoring system.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator-bottom"></div>
        <div class="container text-black pt-5">
            <div class="reveal fade-bottom">
                <h3 class="sub-heading">Our Team</h3>
            </div>
            <div class="hl1_team mt-5">
                <h4 class="m-3">CAPTAINS</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/aman_cap.png')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Aman Panchal</h3>
                            <h4 class="title">Captain</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.instagram.com/mr_aman_panchal"
                                        aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/aman-panchal-980b7026b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin" id="whatsapp"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/mohitm_cap.webp')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Mohit Malik</h3>
                            <h4 class="title">Captain</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.instagram.com/ch.malik.hr12"
                                        aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/mohit--malik"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hl2_team mt-5">
                <h4 class="m-3">MANAGERS</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-md-5 col-lg-3">
                    <div class="our-team sm-custom">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="
                      background-image: url('images/team/shubham_manager.png');
                    "
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Shubham Malhotra</h3>
                            <h5 class="title">Execution Manager | WebDev</h5>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.instagram.com/shubham_poco"
                                        aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/shubham-poco"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin" id="whatsapp"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-5 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/Sujalp_manager.jpg')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Sujal</h3>
                            <h4 class="title">Visual manager</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.instagram.com/sujal_.pruthi?igsh=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr"
                                        aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/friendtasticsujal?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-5 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/vipin_manager.jpg')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Vipin</h3>
                            <h4 class="title">Site Manager</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="mailto:sainivipin839@gmail.com"
                                        aria-hidden="true"
                                ><i class="fas fa-envelope"></i></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/s-vipin"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-5 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="
                      background-image: url('images/team/masooms_manager.jpeg');
                    "
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Masoom Singla</h3>
                            <h4 class="title">Planning Manager</h4>
                        </div>
                        <ul class="social">
                            <!-- <li>
                              <a target="_blank"
                                href="https://codepen.io/collection/XdWJOQ/"
                                aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                              ></a>
                            </li> -->
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/masoom-singla-308ba0282?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin" id="whatsapp"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hl3_team mt-5">
                <h4 class="m-3">COORDINATORS</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="
                      background-image: url('images/team/rohitt_coordinator.jpeg');
                    "
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Rohit Tiwari</h3>
                            <h4 class="title">Coordinator</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.instagram.com/tstrohittiwari"
                                        aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/tstrohittiwari"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin" id="whatsapp"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="
                      background-image: url('images/team/ajitk_coordinator.jpeg');
                    "
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Ajit Kumar Sah</h3>
                            <h4 class="title">Coordinator | WebDev</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.instagram.com/ajit.sah25?igsh=ZGRncnBoYTVsMDk0"
                                        aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/ajit-kumar-s-4737581b1"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin" id="whatsapp"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/prataksh_coo.jpg')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Pratyaksh Varshney</h3>
                            <h4 class="title">Coordinator</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a target="_blank"
                                   href="https://www.instagram.com/pratyaksh_1307"
                                   aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/pratyaksh-varshney-a3135a242?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/esha_coo.jpg')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Esha</h3>
                            <h4 class="title">Coordinator</h4>
                        </div>
                        <ul class="social">
                            <!-- <li>
                              <a target="_blank"
                                href="https://codepen.io/collection/XdWJOQ/"
                                aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                              ></a>
                            </li> -->
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/isha-sandhu-a01238293?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="
                      background-image: url('images/team/amans_coo.jpg');
                      background-position: center;
                    "
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Aman Sangwan</h3>
                            <h4 class="title">Coordinator</h4>
                        </div>
<!--                        <ul class="social">-->
<!--                            <li>-->
<!--                              <a target="_blank"-->
<!--                                href="https://codepen.io/collection/XdWJOQ/"-->
<!--                                aria-hidden="true"-->
<!--                                ><i class="fab fa-instagram"></i-->
<!--                              ></a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                              <a target="_blank"-->
<!--                                href="https://codepen.io/collection/XdWJOQ/"-->
<!--                                aria-hidden="true"-->
<!--                                ><i class="fab fa-linkedin" id="whatsapp"></i-->
<!--                              ></a>-->
<!--                            </li>-->
<!--                        </ul>-->
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/anushka_coo.jpg')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Anushka Das Adhikari</h3>
                            <h4 class="title">Coordinator</h4>
                        </div>
                        <ul class="social">
                            <!-- <li>
                              <a target="_blank"
                                href="https://codepen.io/collection/XdWJOQ/"
                                aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                              ></a>
                            </li> -->
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/anushka-das-a-50074a29b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div class="team-image" style="background-image: url('images/team/sarikak_coo.jpg')"></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Sarika kal kal</h3>
                            <h4 class="title">Coordinator</h4>
                        </div>
                        <ul class="social">
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.instagram.com/kalkalsarika"
                                        aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                        target="_blank"
                                        href="https://in.linkedin.com/in/sarika-kal-kal-05931b220"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="our-team">
                        <div class="picture">
                            <div
                                    class="team-image"
                                    style="background-image: url('images/team/yuvansh_coo.jpg')"
                            ></div>
                        </div>
                        <div class="team-content">
                            <h3 class="name">Yuvansh Anjna</h3>
                            <h4 class="title">Coordinator</h4>
                        </div>
                        <ul class="social">
                            <!-- <li>
                              <a target="_blank"
                                href="https://codepen.io/collection/XdWJOQ/"
                                aria-hidden="true"
                                ><i class="fab fa-instagram"></i
                              ></a>
                            </li> -->
                            <li>
                                <a
                                        target="_blank"
                                        href="https://www.linkedin.com/in/yuvansh-anjna-7496791b2?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                        aria-hidden="true"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<br />
<!--<hr />-->
<section class="px-0 text-center mt-5" id="gallery-section">
    <div class="text-white reveal fade-bottom">
        <h1 class="heading">Gallery</h1>
    </div>
    <div class="rounded-bottom-5 overflow-hidden m-2 bg-white">
        <div class="row p-3 gallery-container">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="images/events/ideathon.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                <img src="images/events/sih_presentation.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
                <img src="images/events/ideathon_prize_dist.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="images/events/sih.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />
                <img src="images/events/mystory2.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="images/events/mystory3.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />
                <img src="images/events/mystory1.jpeg" class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
            </div>
        </div>

    </div>
</section>
<?php include('template/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    new Splide("#image-carousel", {
        type: "loop",
        padding: "2rem",
        autoplay:"true",
        width: 800,
    }).mount();
</script>
<script src="index_script.js"></script>
</body>
</html>