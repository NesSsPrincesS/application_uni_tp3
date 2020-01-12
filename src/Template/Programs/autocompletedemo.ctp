<?php
$urlToProgramsAutocompletedemoJson = $this->Url->build([
    "controller" => "Programs",
    "action" => "findPrograms",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToProgramsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Programs/autocompletedemo', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Programs'), ['action' => 'Index']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Programs') ?>
<fieldset>
    <legend><?= __('Search Program') ?></legend>
    <?php
    echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>