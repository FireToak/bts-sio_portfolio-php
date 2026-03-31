<?php
include '../config.php';
include '../includes/header.php';

// Lecture du fichier JSON des projets
$projets = [];
$fichierProjets = '../data/projets.json';

if (file_exists($fichierProjets)) {
    $contenu = file_get_contents($fichierProjets);
    $projets = json_decode($contenu, true);
}

// Si le JSON est vide ou invalide, on met un tableau vide
if (!is_array($projets)) {
    $projets = [];
}

// Compteur des projets non terminés
$projetsNonTermines = 0;
?>

<main class="flex-shrink-0">
    <!-- Section introduction -->
    <section class="py-5">
        <div class="container px-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0">
                    <span class="text-gradient d-inline">Projets</span>
                </h1>
                <p class="lead mt-3">Retrouvez tous mes projets réalisés en BTS SIO.</p>
            </div>
        </div>
    </section>

    <!-- Section projets -->
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">

                    <?php foreach ($projets as $projet): ?>
                        <?php if (isset($projet['termine']) && $projet['termine'] == "true"): ?>
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                <div class="ratio project-banner-wrap">
                                    <img
                                        class="w-100 h-100 project-banner"
                                        src="<?= htmlspecialchars($projet['image']) ?>"
                                        alt="Bannière du projet"
                                    />
                                </div>

                                <div class="card-body p-4 p-md-5">
                                    <h2 class="fw-bolder"><?= htmlspecialchars($projet['titre']) ?></h2>
                                    <p class="mb-0"><?= htmlspecialchars($projet['description']) ?></p>

                                    <?php if (!empty($projet['competences']) && is_array($projet['competences'])): ?>
                                        <h5 class="fw-bolder mt-3">Compétences</h5>
                                        <ul class="mb-3">
                                            <?php foreach ($projet['competences'] as $competence): ?>
                                                <li><?= htmlspecialchars($competence) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <a class="btn btn-primary" href="<?= htmlspecialchars($projet['lien']) ?>" target="_blank">
                                        Découvrir
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php $projetsNonTermines++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <div class="card border-info overflow-hidden shadow rounded-4 border-1 mb-5">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="card-title text-center">
                                Il y a <?= $projetsNonTermines ?> projet(s) inachevé(s).
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>