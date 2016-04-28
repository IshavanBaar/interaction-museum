<?php if(!defined('KIRBY')) exit ?>

title: Technique
pages:
  template: technique
files: true
fields:
	header-image:
		label: Header Image
		type:  text
	title:
		label: Title
		type:  text
	description:
		label: Description
		type: textarea
	try-out:
		label: Try Out
		type: url
	related_page:
		label: Related Page
		type: page
	tags:
		label: Tags
		type: tags
	related-publications:
		label: Related Publications
		type: structure
		entry: >
			{{title}} <br />
			{{link}} <br />
			{{type}} <br />
			{{authors}} <br />
			{{year}}
		fields:
			title:
				label: Title
				type: text
			link:
				label: Link
				type: url
			type:
				label: Type
				type: text
			authors:
				label: Authors
				type: text
			year:
				label: Year
				type: text