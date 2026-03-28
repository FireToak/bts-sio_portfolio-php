<?php include '../config.php'; ?>
<?php include '../includes/header.php'; ?>

<main class="flex-shrink-0">
<!-- Page Content-->
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Curriculum vitae</span></h1>
    </div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <!-- Experience Section-->
            <section>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="text-primary fw-bolder mb-0">Experiences</h2>
                </div>

                <!-- Experience Card-->
                <?php
                
                $fichier_experiences = "../data/experiences.json";

                // Vérification de l'existence du fichier
                if (file_exists($fichier_experiences) && is_readable($fichier_experiences)) {
                    $jsonTexte = file_get_contents($fichier_experiences);
                    $experiences = json_decode($jsonTexte, true);

                    // Vérification du format du tableau
                    if (is_array($experiences)) {
                        foreach ($experiences as $experience) {
                            ?>
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-primary fw-bolder mb-2"><?= htmlspecialchars($experience['date'] ?? '') ?></div>
                                                <div class="small fw-bolder"><?= htmlspecialchars($experience['status'] ?? '') ?></div>
                                                <div class="small text-muted"><? htmlspecialchars($experience['entreprise'] ?? '') ?></div>
                                                <div class='small text-muted'><?= htmlspecialchars($experience['ville'] ?? '') ?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div><?= htmlspecialchars($experience['description'] ?? '') ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>Erreur : les données des expériences n'ont pas pu être chargées.</p>";
                    }
                } else {
                    echo "<p>Erreur : le fichier des expériences n'a pu être chargé.";
                }
                ?>

            <!-- Formation Section-->
            <section>
                <h2 class="text-secondary fw-bolder mb-4">Formations</h2>
                <!-- Formation Card-->
                <?php
                
                $fichier_formations = "../data/formations.json";

                // Vérification de l'existence du fichier
                if (file_exists($fichier_formations) && is_readable($fichier_formations)) {
                    $jsonTexte = file_get_contents($fichier_formations);
                    $formations = json_decode($jsonTexte, true);

                    // Vérification du format du tableau
                    if (is_array($formations)) {
                        foreach ($formations as $formation) {
                            ?>
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-secondary fw-bolder mb-2"><?= htmlspecialchars($formation['date']) ?></div>
                                                <div class="mb-2">
                                                    <div class="small fw-bolder"><?= htmlspecialchars($formation['etude']) ?></div>
                                                    <div class="small text-muted"><?= htmlspecialchars($formation['ecole']) ?></div>
                                                </div>
                                                <div class="fst-italic">
                                                    <div class="small text-muted"><?= htmlspecialchars($formation['ville']) ?></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div><?= htmlspecialchars($formation['description'] ?? '') ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>Erreur : les données des expériences n'ont pas pu être chargées.</p>";
                    }
                } else {
                    echo "<p>Erreur : le fichier des expériences n'a pu être chargé.";
                }
                ?>
            </section>

            <!-- Diviseur -->
            <div class="pb-5"></div>

            <!--- Compétences Section --->
            <section>
            <?php
            $fichier_competences = '../data/competences.json';
            $donnees_competences = [];

            if (file_exists($fichier_competences) && is_readable($fichier_competences)) {
                $donnees_competences = json_decode(file_get_contents($fichier_competences), true);
            }
            ?>
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                                <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Compétences professionnelles</span></h3>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 mb-4">
                                <?php foreach ($donnees_competences['competences-pro'] ?? [] as $competence): ?>
                                    <div class="col mb-4">
                                        <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">
                                            <?= htmlspecialchars($competence) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="d-flex align-items-center mb-4">
                                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-person-fill"></i></div>
                                <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Compétences personnelles</span></h3>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 mb-4">
                                <?php foreach ($donnees_competences['competences-perso'] ?? [] as $competence): ?>
                                    <div class="col mb-4">
                                        <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">
                                            <?= htmlspecialchars($competence) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php include '../includes/footer.php'; ?>
