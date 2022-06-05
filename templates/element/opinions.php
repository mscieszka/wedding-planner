<div class="opinion-box">
    <a class="user-img">
        <?php

        use Cake\Filesystem\Folder;

        $path = WWW_ROOT . 'img' . DS . 'userProfileImage' . DS . $rating->user->id;
        if (!file_exists($path)) {
            $path = new Folder($path, true, 777);
        } else {
            $path = new Folder($path);
        }
        $files = $path->find();
        ?>

        <?php if (empty($files)) : ?>
            <?= $this->Html->image('userProfileImage/no-profile-img.png', [
                'alt' => 'User profile image',
                'class' => 'user-img-inner'
            ]) ?>
        <?php endif; ?>

        <?php if (!empty($files)) : ?>
            <?php foreach ($files as $file) : ?>
                <?php $filePath = 'userProfileImage/' . (int)$rating->user->get('id') . '/' . $file; ?>
                <?= $this->Html->image($filePath, [
                    'alt' => 'User profile image',
                    'class' => 'user-img-inner'
                ]) ?>
                <?php break; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </a>
    <div class="rest-of-opinion">
        <div class="upper-box">
            <h3><?= $rating->has('user') ? $this->Html->link($rating->user->name, ['controller' => 'Users', 'action' => 'profile', 1, $rating->user->id]) : '' ?></h3>
            <h5><?= $rating->has('offer') ? $this->Html->link($rating->offer->name, ['controller' => 'Offers', 'action' => 'view', $rating->offer->id]) : '' ?></h5>
            <div class="rating-combo">
                <?= $this->Html->image('rating-star.svg') ?>
                <h4><?= h($rating->rating) ?></h4>
            </div>
            <h5><?= h($rating->opinion_date) ?></h5>
        </div>
        <div class="opinion-content">
            <blockquote>
                <?= $this->Text->autoParagraph(h($rating->description)); ?>
            </blockquote>
            <?php if ($rating->user_id == $id_user_log) : ?>
                <td class="offer-name">
                    <?= $this->Form->postLink(__('Usuń opinię'),
                        ['controller' => 'Ratings', 'action' => 'delete', $rating->id],
                        ['confirm' => __('Czy na pewno chcesz usunąć opinię?')]) ?>
                </td>
            <?php endif; ?>
        </div>
    </div>
</div>
