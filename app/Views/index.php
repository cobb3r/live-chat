<main id="mainContainer" class="row d-flex justify-content-center">
    <div id="mainCol" class="col">
        <?php if (session()->get('signedIn')) { ?>
            <h1>Hello, <?= session()->get('firstName'); ?></h1>
        <?php } ?>
    </div>
</main>
</body>
</html>