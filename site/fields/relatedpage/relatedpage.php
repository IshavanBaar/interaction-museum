<?php

class RelatedpageField extends TextField {

  public function __construct() {

    $this->icon        = 'chain';
    $this->label       = l::get('fields.page.label', 'Page');
    $this->placeholder = l::get('fields.page.placeholder', 'name of the technique');

  }

  public function input() {

    $input = parent::input();
    $input->data(array(
      'field' => 'autocomplete',
      'url'   => panel()->urls()->api() . '/autocomplete/uris' //How to rewrite this?
    ));

    return $input;

  }

}