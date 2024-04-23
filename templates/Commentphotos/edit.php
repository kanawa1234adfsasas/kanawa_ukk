<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commentphoto $commentphoto
 */
?>

<?php
$this->assign('title', __('Edit Commentphoto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Commentphotos'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $commentphoto->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($commentphoto) ?>
    <div class="card-body">
        <?= $this->Form->control('IsiKomentar') ?>
        <?= $this->Form->control('TanggalKomentar') ?>
        <?= $this->Form->control('Photos_id', ['options' => $photos, 'class' => 'form-control']) ?>
        <?= $this->Form->control('Users_id', ['options' => $users, 'class' => 'form-control']) ?>
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
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $commentphoto->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>