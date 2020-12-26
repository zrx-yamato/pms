<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personnels'), ['controller' => 'Personnels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personnel'), ['controller' => 'Personnels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tasks view large-9 medium-8 columns content">
    <h3><?= h($task->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($task->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assumption Time') ?></th>
            <td><?= h($task->assumption_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Real Time') ?></th>
            <td><?= h($task->real_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $task->has('status') ? $this->Html->link($task->status->name, ['controller' => 'Statuses', 'action' => 'view', $task->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $task->has('project') ? $this->Html->link($task->project->title, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($task->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add User Id') ?></th>
            <td><?= $this->Number->format($task->add_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add Update Id') ?></th>
            <td><?= $this->Number->format($task->add_update_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create At') ?></th>
            <td><?= h($task->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update At') ?></th>
            <td><?= h($task->update_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Delete') ?></th>
            <td><?= $task->is_delete ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($task->content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Personnels') ?></h4>
        <?php if (!empty($task->personnels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Mail') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Task Id') ?></th>
                <th scope="col"><?= __('Is Delete') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($task->personnels as $personnels): ?>
            <tr>
                <td><?= h($personnels->id) ?></td>
                <td><?= h($personnels->name) ?></td>
                <td><?= h($personnels->mail) ?></td>
                <td><?= h($personnels->company_id) ?></td>
                <td><?= h($personnels->task_id) ?></td>
                <td><?= h($personnels->is_delete) ?></td>
                <td><?= h($personnels->create_at) ?></td>
                <td><?= h($personnels->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Personnels', 'action' => 'view', $personnels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Personnels', 'action' => 'edit', $personnels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Personnels', 'action' => 'delete', $personnels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personnels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
