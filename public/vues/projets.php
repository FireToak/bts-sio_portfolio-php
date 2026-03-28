<?php include '../config.php'; ?>
<?php include '../includes/header.php'; ?>

<main class="flex-shrink-0">
    <!--- *** Section introduction *** --->
    <section class="py-5">
        <div class="container px-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projets</span></h1>
                <p class="lead mt-3">Retrouvez tous mes projets réaliser en BTS SIO.</p>
            </div>
        </div>
    </section>

    <!--- *** Section Projets *** --->
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <!-- Project Card 1-->

                    <?php 
                        // Récupération du fichier contenant les projets
                        $jsonTexte = file_get_contents('../data/projets.json');

                        $projets = json_decode($jsonTexte, true);

                        // Variable pour compter les projets non terminées
                        $projet_non_termines = 0;

                        foreach ($projets as $projet) {
                            if ($projet['termine'] == "true") {
                                echo "<div class='card overflow-hidden shadow rounded-4 border-0 mb-5'>";
                                echo "<div class='ratio project-banner-wrap'>";
                                echo "<img class='w-100 h-100 project-banner' src='" . $projet["image"] . "' alt='Bannière du projet' />";
                                echo "</div>";
                                echo "<div class='card-body p-4 p-md-5'>";
                                echo "<h2 class='fw-bolder'>" . $projet['titre'] . "</h2>";
                                echo "<p class='mb-0'>" . $projet['description'] . "</p>";
                                echo "<h5 class='fw-bolder mt-3'>Compétences</h5>";
                                if (!empty($projet['competences']) && is_array($projet['competences'])) {
                                echo "<ul class='mb-3'>";
                                foreach ($projet['competences'] as $competence) {
                                echo "<li>" . $competence . "</li>";
                                }
                                echo "</ul>";
                                }
                                echo "<a class='btn btn-primary' href='" . $projet['lien'] . "'>Découvrir</a>";
                                echo "</div>";
                                echo "</div>";
                            }
                            else {
                                $projet_non_termines += 1;
                            }
                        }
                        echo "<div class='card border-info overflow-hidden shadow rounded-4 border-1 mb-5'>";
                        echo "<div class='card-body p-4 p-md-5'>";
                        echo "<h2 class='card-title text-center'> Il y a " . $projet_non_termines . " projet(s) inachevé(s).</h2>";
                        echo "</div>";
                        echo "</div>"
                     ?>
                </div>
            </div>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
