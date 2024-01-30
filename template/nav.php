<?php
if(!defined('key')) {
   die('Direct access not permitted');
}
?>
<nav class="navbar navbar-expand-md navbar-dark position-fixed w-100 z-3">
    <div class="container-fluid nav-content">
        <a class="navbar-brand px-1" href="index.php">
            <img
                    class="rounded-circle"
                    id="iconnect-logo"
                    src="images/iconnect.jpg"
                    alt="iConnect"
            />
<!--            <span class="">iConnect</span>-->
        </a>
        <button
                class="navbar-toggler px-4 border-0 strokeme"
                id="nav-toggler"
                type="button"
                data-bs-toggle="collapse"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="fas fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse">
            <div class="navbar-nav me-2 mb-auto ml-auto strokeme">
                <div class="nav-item ">
                    <a class="nav-link" href="#event" id="event-link"
                    ><h5>Events</h5></a
                    >
                </div>
                <div class="nav-item">
                    <a class="nav-link" id="about-link" href="#aboutus"
                    ><h5>About Us</h5></a
                    >
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#contactUs"><h5>Contacts</h5></a>
                </div>
                <div class="">
                    <a href="https://tinyurl.com/iConnectRepresentatives" target="_blank">
                        <button
                                data-mdb-ripple-init
                                type="button"
                                class="btn btn-outline-theme me-3"
                        >
                            Join Us
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="nav-items" class="d-lg-none d-md-none strokeme-white">
        <div class="nav-item">
            <a class="nav-link" href="#event" id="event-link"><h5>Events</h5></a>
        </div>
        <div class="nav-item">
            <a class="nav-link" id="about-link" href="#aboutus"
            ><h5>About Us</h5></a
            >
        </div>
        <div class="nav-item">
            <a class="nav-link" href="#contactUs"><h5>Contacts</h5></a>
        </div>
        <div class="nav-item">
            <a href="https://tinyurl.com/iConnectRepresentatives" target="_blank">
                <button
                        data-mdb-ripple-init
                        type="button"
                        class="btn btn-outline-theme me-3"
                >
                    Join Us
                </button>
            </a>
        </div>

    </div>
</nav>