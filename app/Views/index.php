<main id="mainContainer" class="row d-flex justify-content-center">
    <div id="mainCol" class="col">
        <?php if (session()->get('signedIn')) { ?>
            <h1 style="text-align: center;">Hello, <?= session()->get('firstName'); ?></h1>
        <?php } ?>
        <div style="position: relative;" class="row d-flex align-items-center justify-content-center">
            <h3 style="position: absolute; transform:translate(15vw, -18vw)">Stay Connected</h3>
            <img class="my-4" src="assets/img/home.jpg" alt="Home" style="width: 80vw; border-radius:10%">
        </div>
        <div class="row d-flex align-items-center justify-content-center text-center">
            <div class="col-9">
            <h1>Stay Connected In Real Time</h1>
            <p>Welcome to Live Messaging, the ultimate live messaging platform that keeps you connected anytime, anywhere. Whether you're chatting with friends, collaborating with colleagues, or engaging with your audience, our seamless, instant messaging experience ensures you're always in sync. With fast, secure, and user-friendly features—including group chats, media sharing, and end-to-end encryption—you can communicate with confidence. Join today and start the conversation!</p>
            </div>
        </div>
        <hr>
        <div style="position: relative;" class="row d-flex align-items-center justify-content-center">
        <h3 style="position: absolute; transform:translate(15vw, -18vw)">Talk to Your Friends</h3>
            <img class="my-4" src="assets/img/home2.jpg" alt="Home" style="width: 80vw; border-radius:10%">
        </div>
        <div class="row d-flex align-items-center justify-content-center text-center">
            <div class="col-9">
            <h1>About Us</h1>
            <p>At Live Messaging, we believe communication should be instant, effortless, and secure. Our live messaging platform was built to bring people together—whether for personal chats, professional collaboration, or community engagement. With real-time messaging, multimedia sharing, and cutting-edge encryption, we provide a seamless and reliable way to stay connected. Our mission is to make every conversation feel natural and immediate, no matter where you are. Join us and experience the future of live messaging today!</p>
            </div>
        </div>
        <hr>
    </div>
</main>
</body>
</html>