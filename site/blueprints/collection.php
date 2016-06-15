<?php if(!defined('KIRBY')) exit ?>

title: Collection
pages: false
files: false
options:
  deletable: false
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
            parent: recently-added