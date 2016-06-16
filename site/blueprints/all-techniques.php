<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: technique
  limit: 50
  num:
    mode: date
    field: modified
files: false
icon: hand-pointer-o
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