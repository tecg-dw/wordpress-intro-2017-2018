<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title('-'); ?></title>
</head>
<body>
    <header class="head">
        <h1 class="head__branding">Mon Super Site</h1>
        <nav class="head__menu menu">
            <h2 class="sro">Mon super menu principal</h2>
            <?php foreach(taf_get_menu('main')->getItems() as $item): ?>
                <a href="<?= $item->url; ?>" class="<?= $item->getBemClasses('menu__item'); ?>">
                    <?= $item->label; ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </header>