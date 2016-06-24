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
	title:
		label: Name 
		type:  text
		placeholder: Enter the name of the technique... 
		required: true
	description:
		label: Description
		type: textarea
	tags:
		label: Tags
		type: tags
		required: true
	header-image:
		label: Select a header image (GIF)
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
			{{year}}
		fields:
			title:
				label: Title
				type: text
				required: true
			link:
				label: Link
				type: url
				required: true
			type:
				label: Type
				type: text
				required: true
			authors:
				label: Authors
				type: text
				required: true
			year:
				label: Year
				type: text
				required: true
				validate: 
					num
