<?php if(!defined('KIRBY')) exit ?>

title: Page
pages: collection
  limit: 50
  num: zero
files: false
icon: folder-open
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