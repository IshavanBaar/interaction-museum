<div class="list-field" data-field="list" data-sortable="true">
  
  <script class="list-item-template" type="text/x-handlebars-template">
    <div class="list-item">
      <?php echo $field->inputField(''); ?>
      <div class="field-icon sortable-handle"><i class="icon fa fa-arrows"></i></div>
    </div>

  </script>

  <div class="list">
    
  </div>
  <input class="input add-input" type="text"  placeholder="<?php echo $field->i18n($field->placeholder())?>">
</div>