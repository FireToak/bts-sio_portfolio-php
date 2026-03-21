<?php
$standalone = !isset($nom);
if ($standalone) {
    include '../config.php';
    include '../includes/header.php';
    echo '<main class="flex-shrink-0">';
}
?>

<!-- Contact Section -->
<section class="py-5">
    <div class="container px-5">
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Contact</h1>
                <p class="lead fw-normal text-muted mb-0">Découvrez un passionné</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Nom</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">Le nom est requis.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Adresse mail</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">L'adresse mail est requis.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">L'adresse mail n'est correcte.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Téléphone</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Le téléphone est requis.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Le message est requis.</div>
                        </div>
                        <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Envoyer</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if ($standalone) {
    include '../includes/footer.php';
}
?>
