<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'index', 'header']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('jquery-3.6.0.min.js') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <div class="top-nav-logo">
                <a href="<?= $this->Url->build('/') ?>">
                    <?php echo $this->Html->image("logo.svg")?>
                </a>
            </div>
        </div>

        <div class="search-bar">
            <div class="search-description">
                <?php  echo $this->Html->image('lupa.svg', ['alt' => 'Wedding Planner']); ?>
                <label>
                    <input placeholder="Czego szukasz ?">
                </label>
            </div>
            |
            <div class="place_search">
                <?php  echo $this->Html->image('miejsce.svg', ['alt' => 'Wedding Planner']); ?>
                <label>
                    <input placeholder="Cała Polska">
                </label>
            </div>
        </div>

        <div class="top-nav-links">
            <div>
                <?php if($account_type_id == 1): ?>
                    <?= $this->Html->link(__('My saved offers'), ['controller' => 'Offers', 'action' => 'index', 2],  ['class' => 'button']) ?>
                <?php endif; ?>
                <?php if($account_type_id == 2): ?>
                    <?= $this->Html->link(__('My Offer'), ['controller' => 'Offers', 'action' => 'index',1],['class' => 'button']) ?>
                <?php endif; ?>

                <?= $this->Html->link(__('Profil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'button']) ?>
            </div>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
