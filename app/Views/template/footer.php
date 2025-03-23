<footer class="row d-flex justify-content-center align-items-center">
    <div class="col-7 col-md-2" style="overflow: hidden;">
        <img class="ms-2" src="/assets/img/logo.png" alt="" style="width: 100%; height:30%; border-radius:1em">
    </div>
    <div class="col-12 col-sm-6 col-md-5 text-center">
        <ul class="p-0" style="list-style-type: none;">
             <li>
                <a href="/">Home</a>
            </li>
            </br>
            <?php if (! session()->get('signedIn')) { ?>
                <li>
                    <a href="/signin">Sign Up</a>
                </li>
                </br>
                <li>
                    <a href="/signup">Sign In</a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="/signup">Chat</a>
                </li>
                </br>
                <li>
                    <a href="/signout">Sign Out</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</footer>
</body>
</html>