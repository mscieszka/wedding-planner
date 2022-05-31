<div class="categories-nav services">
    <div class ="serv flex-col">
        <h3>Wybierz rodzaj usługi</h3>
        <div class="flex-row">
            <div class="service-type">
                <?= $this->Html->image('sale.svg', ['alt' => 'Wedding Planner']); ?>
                <?= $this->Html->link(__('Sale'), ['action' => 'add', 1], ['class' => 'btn-category'] )?>
            </div>
            <div  class="service-type">
                <?= $this->Html->image('dj.svg', ['alt' => 'Wedding Planner']); ?>
                <?= $this->Html->link(__('Zespół muzyczny / DJ'), ['action' => 'add', 2],['class' => 'btn-category'] )?>
            </div>
            <div  class="service-type">
                <?= $this->Html->image('catering.svg', ['alt' => 'Wedding Planner', 'class' => 'catering-img']); ?>
                <?= $this->Html->link(__('Catering'), ['action' => 'add', 3], ['class' => 'btn-category'] )?>
            </div>
        </div>
    </div>
</div>
