<?php

class SubpageField extends PageField {

  public function input() {

    $input = parent::input();
    $input->data(array(
      'field' => 'autocomplete',
      'url'   => purl($this->model, 'field/' . $this->name . '/subpage/autocomplete/' . $this->parent())
    ));

    return $input;

  }
  
  public function routes() {

    return array(
      array(
        'pattern' => 'autocomplete/(:all)',
        'method'  => 'post',
        'action'  => function($parent) {
          $ids = page($parent)->children()->pluck('id');
          
          return response::json(array('data' => $ids));
        }
      )
    );

  }

}