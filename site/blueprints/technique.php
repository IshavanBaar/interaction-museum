<?php if(!defined('KIRBY')) exit ?>

title: Technique
pages:
	template: technique
files:
    type: 
        - image
        - video
        max: 5
		sortable: true
fields:
	info:
		label: Add an interaction technique
		type: info
		text: >
			Each technique should have at least a title, description, some tags and a header image. If possible, please add more.
						
			To publish, change the *Page Status* to visible (choose the highest number).
	title:
		label: Name 
		type:  papersearch
		placeholder: Enter the name of the technique... 
		required: true
	description:
		label: Description
		type: textarea
		validate:
			min: 4
			max: 500
		required: true
		help: Improve the writing style with the http://hemingwayapp.com/
	tags:
		label: Tags
		type: tags
		required: true
	header-image:
		label: Select a header image
		type: selector
		mode: single
		autoselect: none
		types: 
			- image
	cropper:
		label: Cropping Area
		type: cropper
		ratios:
			- 16/9
			label: portrait image
			value: 2/3
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
