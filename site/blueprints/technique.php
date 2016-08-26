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
    label: Name vid
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
  header-image:
    label: Preview Image
    type: selector
    mode: single
    autoselect: first
    help: Select an image file as preview image. An appropriate image represents the technique. Preferably it is a 16:9 GIF.
    types: 
      - image
    required: true
  tags:
    label: Tags
    type: tags
    required: true
  media:
    label: Media
    type: headline
  movie:
    label: Video (YouTube or Vimeo)
    type: url
  movie-file:
    label: Video (from Files)
    type: selector
    mode: single
    autoselect: none
    help: Select a video file to turn it visible
    types: 
      - video
  extra-images:
    label: Additional Images
    type: selector
    mode: multiple
    autoselect: last
    help: Select an image file to turn it visible
    types: 
      - image
  try-out:
    label: Link to Demo
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
  extra:
    label: Extra
    type: headline
  styles:
    label: Interaction Styles
    type: checkboxes
    options: query
    query:
      page: all-styles
  techniques:
    label: Techniques in this collection
    type: structure
    entry: >
        {{technique}}
  relatedPage:
    label: Related Page
    type: subpage
    parent: all-techniques