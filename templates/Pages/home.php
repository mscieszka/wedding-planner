<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

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

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home', 'index', 'header']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header>
    <div class="search-bar">
        <div class="search-description">
            <?= $this->Html->image('lupa.svg', ['alt' => 'Provide search description']); ?>
            <label>
                <input placeholder="Czego szukasz ?">
            </label>
        </div>
        <div class="search-separator">|</div>
        <div class="place_search">
            <?php  echo $this->Html->image('miejsce.svg', ['alt' => 'Provide place to search']); ?>
            <label>
                <input placeholder="Cała Polska">
            </label>
        </div>
    </div>
    <?php if($account_type_id == 1): ?>
        <?= $this->Html->link(__('My saved offers'), ['controller' => 'Offers', 'action' => 'index', 2],  ['class' => 'button']) ?>
    <?php endif; ?>
    <?php if($account_type_id == 2): ?>
        <?= $this->Html->link(__('My Offer'), ['controller' => 'Offers', 'action' => 'index',1],['class' => 'button']) ?>
    <?php endif; ?>
    <?= $this->Html->link(__('Profil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'button']) ?>
</header>
<?= $this->Flash->render() ?>
    <div class="content_wrapper_homepage">
        <div class="logo_div" >
            <?php  echo $this->Html->image('logo_full.svg', ['alt' => 'Wedding Planner']); ?>
        </div>
        <div class="categories-nav services">
            <div class ="serv">
                <div  class="service-type">
                    <?php  echo $this->Html->image('sale.svg', ['alt' => 'Wedding Planner']); ?>
                    <?= $this->Html->link(__('Sale'), ['controller' => 'Categories', 'action' => 'view', 1],['class' => 'btn-category'] )?>
                </div>
               <div  class="service-type">
                   <?php  echo $this->Html->image('dj.svg', ['alt' => 'Wedding Planner']); ?>
                   <?= $this->Html->link(__('Zespół muzyczny / DJ'), ['controller' => 'Categories', 'action' => 'view', 2],['class' => 'btn-category'] )?>
               </div>
                <div  class="service-type">
                    <?php  echo $this->Html->image('catering.svg', ['alt' => 'Wedding Planner', 'class' => 'catering-img']); ?>
                <?= $this->Html->link(__('Catering'), ['controller' => 'Categories', 'action' => 'view', 3],['class' => 'btn-category'] )?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
