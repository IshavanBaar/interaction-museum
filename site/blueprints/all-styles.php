<?php if(!defined('KIRBY')) exit ?>

title: Page
pages:
  template:
    - style
  limit: 50
  num: zero
files: false
icon: magic
options:
  preview: false
  status: false
  template: false
  url: false
  delete: false
fields:
  title:
    label: Title
    type:  text
    readonly: true