<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}

include 'config.php';

// Lecture des projets
$projetsPath = __DIR__ . '/data/projets.json';
$projets = [];

if (file_exists($projetsPath)) {
    $contenu = file_get_contents($projetsPath);
    $projets = json_decode($contenu, true) ?? [];
}

// Calcul des stats projets
$totalProjets = count($projets);
$projetsTermines = 0;
$projetsEnCours = 0;

foreach ($projets as $projet) {
    $estTermine = isset($projet['termine']) && $projet['termine'] === 'true';
    if ($estTermine) {
        $projetsTermines++;
    } else {
        $projetsEnCours++;
    }
}

// Compteur de visites
$visitesPath = __DIR__ . '/data/visites.txt';
$nbVisites = 0;

if (file_exists($visitesPath)) {
    $nbVisites = (int) file_get_contents($visitesPath);
}

$nbVisites++;
file_put_contents($visitesPath, (string) $nbVisites);

// Liste des projets
$listeTermines = [];
$listeEnCours = [];

foreach ($projets as $projet) {
    $estTermine = isset($projet['termine']) && $projet['termine'] === 'true';
    if ($estTermine) {
        $listeTermines[] = $projet;
    } else {
        $listeEnCours[] = $projet;
    }
}

include 'includes/header.php';
?>

<main class="flex-shrink-0">
    <section class="py-5">
        <div class="container px-5">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h1 class="display-6 fw-bolder mb-1">
                        <span class="text-gradient d-inline">Administration</span>
                    </h1>
                    <p class="text-muted mb-0">Bienvenue <?= htmlspecialchars($_SESSION['user']) ?> !</p>
                </div>
                <a href="/logout.php" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                </a>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-2">Nombre de visites</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="fw-bolder mb-0"><?= $nbVisites ?></h2>
                                <span class="badge bg-primary-subtle text-primary-emphasis p-2 rounded-circle">
                                    <i class="bi bi-graph-up"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-2">Projets terminés</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="fw-bolder mb-0"><?= $projetsTermines ?></h2>
                                <span class="badge bg-success-subtle text-success-emphasis p-2 rounded-circle">
                                    <i class="bi bi-check2-circle"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-2">Projets en cours</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="fw-bolder mb-0"><?= $projetsEnCours ?></h2>
                                <span class="badge bg-warning-subtle text-warning-emphasis p-2 rounded-circle">
                                    <i class="bi bi-hourglass-split"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 pt-4">
                            <h3 class="h5 mb-0">Projets terminés</h3>
                        </div>
                        <div class="card-body">
                            <?php if (empty($listeTermines)): ?>
                                <p class="text-muted mb-0">Aucun projet terminé pour le moment.</p>
                            <?php else: ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($listeTermines as $projet): ?>
                                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                            <span><?= htmlspecialchars($projet['titre'] ?? 'Projet sans titre') ?></span>
                                            <span class="badge text-bg-success">Terminé</span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 pt-4">
                            <h3 class="h5 mb-0">Projets en cours</h3>
                        </div>
                        <div class="card-body">
                            <?php if (empty($listeEnCours)): ?>
                                <p class="text-muted mb-0">Aucun projet en cours.</p>
                            <?php else: ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($listeEnCours as $projet): ?>
                                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                            <span><?= htmlspecialchars($projet['titre'] ?? 'Projet sans titre') ?></span>
                                            <span class="badge text-bg-warning">En cours</span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 pt-4">
                    <h3 class="h5 mb-1">Ajouter un projet</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="titre" class="form-label">Titre du projet</label>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Ex: BTS SIO - Portfolio">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="lien" class="form-label">Lien GitHub</label>
                                <input type="url" class="form-control" id="lien" name="lien" placeholder="https://github.com/...">
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Décris le projet..."></textarea>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="etat" class="form-label">État du projet</label>
                                <select class="form-select" id="etat" name="etat">
                                    <option value="false" selected>En cours</option>
                                    <option value="true">Terminé</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex gap-2">
                                <button type="button" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Ajouter</button>
                                <button type="reset" class="btn btn-outline-secondary">Réinitialiser</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>