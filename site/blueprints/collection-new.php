<?php if(!defined('KIRBY')) exit ?>

title: New Collection
pages: false
fields:
  title:
    label: Title
    type:  text
  creator:
    label: Created by
    type: user
  test:
    label: Test
    type: relatedpage
  techniques:
    label: Techniques in this collection
    type: structure
    entry: >
        {{technique}}
    fields:
        technique:
            label: Technique
            type: relatedpage