<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
?>

<?php
$this->assign('title', __('Add Photo'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Photos'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($photo, ['enctype'=>'multipart/form-data'], ['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('JudulFoto') ?>
        <?= $this->Form->control('DeskripsiFoto') ?>
        <?= $this->Form->control('TanggalUnggah') ?>
        <?= $this->Form->control('LokasiFile') ?>
        <?= $this->Form->control('foto', ['type' => 'file']) ?>
        <?= $this->Form->control('Albums_id', ['options' => $albums, 'class' => 'form-control']) ?>
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