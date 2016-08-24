<?php if(!defined('KIRBY')) exit ?>

title: Technique
pages: false
files:
  type: 
    - image
    - video
  max: 5
  sortable: true
icon: hand-pointer-o
options:
  preview: true
  status: true
  template: false
  url: false
  delete: true
fields:
  basics:
    label: Basics
    type: headline
  title:
    label: Name 
    type:  text
    placeholder: Enter the name of the technique... 
    required: true
  description:
    label: Description
    type: textarea
    validate:
      min: 4
      max: 550
    required: true
    help: Improve the writing style with the http://hemingwayapp.com/   
  tags:
    label: Tags
    type: tags
    required: true
  styles:
    label: Interaction Styles
    type: checkboxes
    required: true
    options: query
    query:
      page: all-styles
  media:
    label: Media
    type: headline
  header-image:
    label: Select a header image (GIF, 16:9)
    type: image
  extra-images:
    label: Extra Images
    type: selector
    mode: multiple
    autoselect: none
    types: 
      - image
  movie:
    label: Video (YouTube or Vimeo)
    type: url
  extra:
    label: Extra
    type: headline
  try-out:
    label: Paste a link to a website with a working demo
    type: url
  related-publications:
    label: Related Publications  
    type: structure
    entry: >
      {{title}}<br />
      {{link}}<br />
      {{type}}<br />
      {{authors}}<br />
      {{year}}<br />
    fields:
      title:
        label: Title
        type: text
        required: true
      link:
        label: Link
        type: url
        required: true
      authors:
        label: Authors
        type: text
        required: true
      type:
        label: Conference
        type: text
        required: true
      year:
        label: Year
        type: text
        required: true
        validate:
          - num
  related-techniques:
    label: Rekated Techniques
    type: structure
    entry: >
        {{technique}}
    fields:
        technique:
            label: Technique
            type: subpage
            parent: 2-all-techniques