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
      {{technique}}<br />
    fields:
      technique:
        label: Technique
        type: page
        parent: all-techniques
  relatedPage:
    label: Related Page
    type: subpage
    parent: all-techniques
  fruits:
    label: Give Me Fruits
    type: list
    placeholder: Add a new fruit
    parent: all-techniques