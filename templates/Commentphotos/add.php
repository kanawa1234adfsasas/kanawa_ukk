<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commentphoto $commentphoto
 */
?>

<?php
$this->assign('title', __('Add Commentphoto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Commentphotos'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($commentphoto, ['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('IsiKomentar') ?>
        <?= $this->Form->control('TanggalKomentar') ?>
        <?= $this->Form->control('Photos_id', ['options' => $photos, 'class' => 'form-control']) ?>
        <?= $this->Form->control('Users_id', ['options' => $users, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>