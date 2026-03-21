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

                        foreach ($projets as $projet) {
                            echo "<div class='card overflow-hidden shadow rounded-4 border-0 mb-5'>";
                            echo "<div class='card-body p-0'>";
                            echo "<div class='d-flex align-items-center'>";
                            echo "<div class='p-5'>";
                            echo "<h2 class='fw-bolder'>" . $projet['titre'] . "</h2>";
                            echo "<p>" . $projet['description'] . "</p>";
                            echo "</div>";
                            echo "<img class='img-fluid' src='https://dummyimage.com/300x400/343a40/6c757d' alt='...' />";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                     ?>

                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h2 class="fw-bolder">Project Name 1</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo commodi quo itaque! Ipsam!</p>
                                </div>
                                <img class="img-fluid" src="https://dummyimage.com/300x400/343a40/6c757d" alt="..." />
                            </div>
                        </div>
                    </div>
                    <!-- Project Card 2-->
                    <div class="card overflow-hidden shadow rounded-4 border-0">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h2 class="fw-bolder">Project Name 2</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius at enim eum illum aperiam placeat esse? Mollitia omnis minima saepe recusandae libero, iste ad asperiores! Explicabo commodi quo itaque! Ipsam!</p>
                                </div>
                                <img class="img-fluid" src="https://dummyimage.com/300x400/343a40/6c757d" alt="..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
