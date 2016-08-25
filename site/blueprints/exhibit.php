<?php if(!defined('KIRBY')) exit ?>

title: Exhibit
pages: false
files: false
icon: pencil
options:
  preview: true
  status: true
  template: false
  url: false
  delete: true
fields:
  title:
    label: Title
    type:  text
  creator:
    label: Created by
    type: user
  created_on:
    label: Created on
    type: date
   format: YYYY/MM/DD
  writings:
    label: Content (HTML)
    type: textarea