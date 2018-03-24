<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CreditCard $creditCard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Credit Card'), ['action' => 'edit', $creditCard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credit Card'), ['action' => 'delete', $creditCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditCard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credit Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Card'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Restaurants'), ['controller' => 'Restaurants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Restaurant'), ['controller' => 'Restaurants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="creditCards view large-9 medium-8 columns content">
    <h3><?= h($creditCard->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($creditCard->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($creditCard->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Restaurants') ?></h4>
        <?php if (!empty($creditCard->restaurants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Credit Card Id') ?></th>
                <th scope="col"><?= __('Halal') ?></th>
                <th scope="col"><?= __('Vegan') ?></th>
                <th scope="col"><?= __('Gluten Free') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($creditCard->restaurants as $restaurants): ?>
            <tr>
                <td><?= h($restaurants->id) ?></td>
                <td><?= h($restaurants->name) ?></td>
                <td><?= h($restaurants->credit_card_id) ?></td>
                <td><?= h($restaurants->halal) ?></td>
                <td><?= h($restaurants->vegan) ?></td>
                <td><?= h($restaurants->gluten_free) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Restaurants', 'action' => 'view', $restaurants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Restaurants', 'action' => 'edit', $restaurants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Restaurants', 'action' => 'delete', $restaurants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $restaurants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
