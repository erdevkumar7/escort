<section class="footer-escorts">
    <div class="container-fluid">
        <div class="row quick-links">
            <div class="col-md-4 escorts-first-content">
                <img src="{{ asset('/public/images/static_img/logo.png') }}">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                <div class="icons">
                    <a href="#"><img src="{{ asset('/public/images/static_img/facebook.png') }}"></a>
                    <a href="#"><img src="{{ asset('/public/images/static_img/insta.png') }}"></a>
                </div>
            </div>

            <div class="col-md-2 quick-links-first">
                <h5>QUICK LINKS</h5>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Forum</a></li>
                </ul>
            </div>

            <div class="col-md-2 quick-links-two">
                <h5>Help</h5>
                <ul>
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#">Delivery Details</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="col-md-2 quick-links-three">
                <h5>FAQ</h5>
                <ul>
                    <li><a href="#">Create your ad</a></li>
                    <li><a href="#">Manage Deliveries</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Payments</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="reserved-text">
        <p class="text-center text-white">logo © 2024, All Rights Reserved</p>

    </div>

    <!-- Cookie Consent Banner -->
    <div id="cookie-banner" class="cookie-setup">
        <span>We use cookies to ensure that we give you the best experience on our website.</span>
        <button id="accept-cookies" class="btn btn-success">Accept</button>
        <button id="reject-cookies" class="btn btn-danger">Reject</button>
    </div>

    <!-- Cookie script -->
    <script>
        // Check if the cookie consent has already been given
        document.addEventListener('DOMContentLoaded', function() {
            if (!getCookie('cookie_consent')) {
                document.getElementById('cookie-banner').style.display = 'block';
            }

            // Handle "Accept" button click
            document.getElementById('accept-cookies').addEventListener('click', function() {
                setCookie('cookie_consent', 'accepted', 365);
                document.getElementById('cookie-banner').style.display = 'none';
            });

            // Handle "Reject" button click
            document.getElementById('reject-cookies').addEventListener('click', function() {
                window.location.href = "https://www.google.com"; // Redirect to Google on rejection
            });
        });

        // Function to set a cookie
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Function to get a cookie
        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
    </script>


</section>
