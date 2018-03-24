<?php
echo $this->Form->create(null, ['valueSources' => 'query']);
echo $this->Form->input('name');
echo $this->Form->button('検索', ['type' => 'submit']);
echo $this->Form->end();
?>
