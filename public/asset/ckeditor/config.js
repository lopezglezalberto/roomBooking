/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	config.disableNativeSpellChecker = false;
	config.scayt_autoStartup = true;
	config.language = 'es';
	config.defaultLanguage = 'es';


	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert'},
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	config.extraPlugins = 'scayt';
	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript,Link,Unlink,Print,Source,Image,Iframe,Table,SpecialChar,About,HorizontalRule,Smiley,InsertPre,CreatePlaceholder,Anchor';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	/*
	 $(document).ready(function() {
	 	CKEDITOR.config.removePlugins = 'Save,Print,Preview,Find,About,Maximize,ShowBlocks';
	 });

	«Source»
	«Save»
	«NewPage»
	«DocProps»
	«Preview»
	«Print»
	«Templates»
	«document»

	«Cut»
	«Copy»
	«Paste»
	«PasteText»
	«PasteFromWord»
	«Undo»
	«Redo»

	 «Bold»
	 «Italic»
	 «Underline»
	 «Strike»
	 «Subscript»
	 «Superscript»
	 «RemoveFormat»

	 «NumberedList»
	 «BulletedList»
	 «Outdent»
	 «Indent»
	 «Blockquote»
	 «CreateDiv»
	 «JustifyLeft»
	 «JustifyCenter»
	 «JustifyRight»
	 «JustifyBlock»
	 «BidiLtr»
	 «BidiRtl»

	 «Link»
	 «Unlink»
	 «Anchor»

	 «CreatePlaceholder»
	 «Image»
	 «Flash»
	 «Table»
	 «HorizontalRule»
	 «Smiley»
	 «SpecialChar»
	 «PageBreak»
	 «Iframe»
	 «InsertPre»

	 «Styles»
	 «Format»
	 «Font»
	 «FontSize»

	 «TextColor»
	 «BGColor»

	 «UIColor»
	 «Maximize»
	 «ShowBlocks»

	 «button1»
	 «button2»
	 «button3»
	 «oembed»
	 «MediaEmbed»

	 «About»

	*/
};
