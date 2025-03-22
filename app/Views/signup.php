<main class="row">
    <div class="col-10">
        <h1>Sign Up</h1>
        <hr>
        <form id="form" class="text-center p-1" action="/signup" method="post">
            <div class="row">
                <div class="col-12" style="height: fit-content;">
                    <label for="fName">First Name</label>
                    <input class="text-center" type="text" id="fName" name="fName" placeholder="John" required>
                    <br>
                    <label for="lName">Last Name</label>
                    <input class="text-center" type="text" id="lName" name="lName" placeholder="Doe" required>
                </div>
                <div class="col-12" style="height: fit-content;">
                    <label for="eaddress">Email Address</label>
                    <input class="text-center" type="email" id="eaddress" name="eaddress" placeholder="example@example.com" required>
                    <br>
                    <label for="pass">Password</label>
                    <input class="text-center" type="password" id="pass" name="pass" placeholder="Password" required>
                    <label for="conPass">Confirm Password</label>
                    <input class="text-center" type="password" id="conPass" name="conPass" placeholder="Confirm Password" required>
                    <div class="text-center" id="checks">
                        <p class="my-0" id="length">Password must be More than 8 Digits</p>
                        <p class="my-0" id="number">Password Must Contain a Number</p>
                        <p class="my-0" id="upper">Password Must at Least 1 Upper Case Letter</p>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" id="submit">Send</button>
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= validation_list_errors() ?>
                    </div>
                </div>
            <?php endif; ?>
        </form>
    </div>
</main>