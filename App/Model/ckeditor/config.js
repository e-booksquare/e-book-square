/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
config.toolbar = 'Full';
config.toolbar_Full =
[
	{ name: 'styles', items : ['Format','Font','FontSize' ] },
    { name: 'colors', items : [ 'TextColor','BGColor' ] },
    { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','-','Undo','Redo' ] },
    { name: 'editing', items : [ 'Find','-','SelectAll','-','SpellChecker', 'Scayt' ] },
	
    '/',
    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ] },
    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
        '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
    { name: 'insert', items : [ 'Flash','HorizontalRule','Smiley','SpecialChar','PageBreak'] },
];
};
