<div class="categories-nav services">
    <div class="serv flex-col">
        <h3>Wybierz rodzaj usługi</h3>
        <div class="serv">
            <div class="service-type">
                <?php echo $this->Html->image('buttons/button-sale.svg', [
                    'alt' => 'Wedding Planner',
                    'url' => ['controller' => 'Offers', 'action' => 'add', 1]
                ]); ?>
            </div>
            <div class="service-type">
                <?php echo $this->Html->image('buttons/button-dj.svg', [
                    'alt' => 'Wedding Planner',
                    'url' => ['controller' => 'Offers', 'action' => 'add', 2]
                ]); ?>
            </div>
            <div class="service-type">
                <?php echo $this->Html->image('buttons/button-catering.svg', [
                    'alt' => 'Wedding Planner',
                    'url' => ['controller' => 'Offers', 'action' => 'add', 3]
                ]); ?>
            </div>
        </div>
    </div>
</div>
