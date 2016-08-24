<?php if(!defined('KIRBY')) exit ?>

title: Collection
pages: false
files: false
icon: folder-open
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
  techniques:
    label: Techniques in this collection
    type: structure
    entry: >
        {{technique}}
    fields:
        technique:
            label: Technique
            type: subpage
            parent: 2-all-techniques