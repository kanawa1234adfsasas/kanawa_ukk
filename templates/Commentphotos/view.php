<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commentphoto $commentphoto
 */
?>

<?php
$this->assign('title', __('Commentphoto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Commentphotos'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($commentphoto->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Photo') ?></th>
                <td><?= $commentphoto->has('photo') ? $this->Html->link($commentphoto->photo->JudulFoto, ['controller' => 'Photos', 'action' => 'view', $commentphoto->photo->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $commentphoto->has('user') ? $this->Html->link($commentphoto->user->Username, ['controller' => 'Users', 'action' => 'view', $commentphoto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($commentphoto->id) ?></td>
            </tr>
            <tr>
                <th><?= __('TanggalKomentar') ?></th>
                <td><?= h($commentphoto->TanggalKomentar) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $commentphoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commentphoto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commentphoto->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('IsiKomentar') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($commentphoto->IsiKomentar)); ?>
    </div>
</div>
