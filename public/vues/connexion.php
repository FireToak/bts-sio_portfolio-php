<?php include '../config.php'; ?>
<?php include '../includes/header.php'; ?>

<section class="container">
    <div class="row d-flex justify-content-center">
        <form class="col-md-4 bg-light rounded-4 p-5 mt-5">
            <div class="text-center">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-person-circle"></i></div>
            </div>
            <h2 class="text-primary fw-bolder mb-3 text-center">Connexion</h2>
            <div class="mb-3">
                <label for="Email" class="form-label">Adresse mail</label>
                <input type="email" class="form-control" id="Email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Votre adresse mail n'est pas partagé avec des tiers.</div>
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="Password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>