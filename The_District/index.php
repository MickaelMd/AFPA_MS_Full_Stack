<?php
require_once __DIR__.'/assets/php/connect.php';
$categorie = index_categorie_list(6);
$platindex = plat_index_list_by_com(3);

require_once __DIR__.'/assets/php/head.php'; 
?>

<body>

    <div class="container">

        <?php require_once __DIR__.'/assets/php/header.php'; ?>

        <section id="pres_cat_pl" class="container">
            <div class="list_cat_mp">
                <?php foreach ($categorie as $categories): ?>
                <div class="cards_cat_mp">
                    <img class="img_card_cat"
                        src="<?= $ip_link ?>/assets/img/category/<?= htmlspecialchars($categories['image']) ?>"
                        alt="<?= htmlspecialchars($categories['libelle']) ?>">
                    <a
                        href="<?= $ip_link ?>/pages/foodlist.php?categorie=<?= preg_replace('#\s+#', '', htmlspecialchars($categories['id'])) ?>">
                        <?= htmlspecialchars($categories['libelle']) ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <a class="d-flex text-decoration-none" href="pages/categorie.php">
                <button type="button" class="btn btn-lg btn-info mt-3">
                    TOUTES LES CATÉGORIES
                </button>
            </a>
            <br />
            <div class="mt-5 list_cat_mp mart-20">
                <?php foreach ($platindex as $plats): ?>
                <div class="cards_pl_mp">
                    <div class="img_zoom">
                        <img class="img_card_plat_i"
                            src="<?= $ip_link ?>/assets/img/food/<?= htmlspecialchars($plats['image']) ?>"
                            alt="<?= htmlspecialchars($plats['libelle']) ?>">
                    </div>
                    <a
                        href="<?= $ip_link ?>/pages/platunique.php?plat=<?= preg_replace('#\s+#', '', htmlspecialchars($plats['id'])) ?>">
                        <?= htmlspecialchars($plats['libelle']) ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <a class="d-flex text-decoration-none" href="pages/plats.php">
                <button type="button" class="btn btn-info mt-3">
                    TOUS LES PLATS
                </button>
            </a>
        </section>
    </div>
    <?php require_once __DIR__.'/assets/php/footer.php'; ?>

</body>

</html>