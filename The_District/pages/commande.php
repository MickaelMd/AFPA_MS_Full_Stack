<?php 
require_once __DIR__.'/../assets/php/connect.php';
require_once __DIR__.'/../assets/php/head.php'; 
?>

<body>
    <div class="container">
        <?php 
        require_once __DIR__.'/../assets/php/header.php';
        
        // $where = [];
        // $_SESSION['commande_list'] = $where;

        $commande_list = commande_list_plat($_SESSION['commande_list']);
        $quantites = array_count_values($_SESSION['commande_list']);
        echo count($_SESSION['commande_list']);
        ?>

        <section class="mt-5">

            <?php 
        
        print_r($_SESSION['commande_list']);
        if (count($_SESSION['commande_list']) <= 0) {

            echo '<h1>Votre commande est vide.</h1>';
 
         }  else {
            echo ' <h1>Récapitulatif de votre commande :</h1>';
        
        ?>

            <hr>

            <form action="" method="post">
                <section id="sec_cards_plat_cat" class="row">
                    <?php
                    foreach ($commande_list as $platLs):
                        $libelle = htmlspecialchars($platLs['libelle'], ENT_QUOTES, 'UTF-8');
                        $image = htmlspecialchars($platLs['image'], ENT_QUOTES, 'UTF-8');
                        $prix = (float) htmlspecialchars($platLs['prix'], ENT_QUOTES, 'UTF-8'); 
                        $description = htmlspecialchars($platLs['description'], ENT_QUOTES, 'UTF-8');

                        if (strlen($description) > 200) {
                            $description = substr($description, 0, 200) . '...';
                        }

                        $quantite = isset($quantites[$platLs['id']]) ? $quantites[$platLs['id']] : 0;
                    ?>

                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../assets/img/food/<?= $image ?>" class="card-img-top" alt="<?= $libelle ?>"
                                style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title"><?= $libelle ?></h4>
                                <p class="card-text font_text"><?= $description ?></p>
                                <p class="font_text show_price"><?= number_format($prix, 2) ?>€</p>
                                <input type="number" name="quantite[<?= $platLs['id'] ?>]" class="form-control" min="0"
                                    value="<?= $quantite ?>" style="width: 100px;">
                                <?php if ($quantite > 0): ?>
                                <p class="mt-2">Quantité : <?= $quantite ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php 
                
                endforeach; ?>
                </section>

                <button type="submit" name="update_commande" class="btn btn-primary mt-4">Mettre à jour la
                    commande</button>
                <form action="" method="post">
                    <button type="submit" name="delete_commande" class="btn btn-danger mt-4">Supprimer la
                        commande</button>
                </form>

            </form>


        </section>
        <hr>


        <section>
            <?php
    $total = 0;
    foreach ($commande_list as $platLs) {
        $prix = (float) htmlspecialchars($platLs['prix'], ENT_QUOTES, 'UTF-8');
        $quantite = isset($quantites[$platLs['id']]) ? $quantites[$platLs['id']] : 0;
        $sous_total = $prix * $quantite;
        $total += $sous_total;
    }
    ?>
            <h1>Total de la commande : <?= number_format($total, 2) ?>€</h1>

            <form action="" method="post">
                <button type="submit" name="validate_commande" class="btn btn-success mt-4">Finalisé la
                    commande</button>
            </form>
        </section>

        <?php } ?>
    </div>

    <?php require_once __DIR__.'/../assets/php/footer.php'; ?>

</body>

</html>


<?php if (isset($_POST["delete_commande"])) {
   unset($_SESSION['commande_list']);
   echo "<meta http-equiv='refresh' content='0'>";
}