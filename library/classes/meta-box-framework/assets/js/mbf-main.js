jQuery(document).ready(function($) {
    initializeColorPickers()
    // Initialize the date picker (using jQuery UI's datepicker as an example)
    $(".mbf-date-picker").datepicker();
    // Initially hide the sub-fields of all repeater items
    $('.mbf-repeater-item .mbf-sub-field').hide();

    // Global counter for repeater blocks
    var repeaterCounter = $('.mbf-repeater-item').length;

    // Add new repeater item
    $('.mbf-repeater-add').on('click', function(e) {
        e.preventDefault();
    
        // Clone the template
        var $template = $(this).siblings('.mbf-repeater-template').first().clone();
        $template.removeClass('mbf-repeater-template').addClass('mbf-repeater-item').show();
    
        // Replace the placeholder index
        $template.html($template.html().replace(/__index__/g, repeaterCounter));
    
        // Update the name and id attributes for other fields
        $template.find('input, select, textarea').each(function() {
            var name = $(this).attr('name');
            var id = $(this).attr('id');
            if (name) {
                name = name.replace(/\[__index__\]/g, '[' + repeaterCounter + ']');
                $(this).attr('name', name);
            }
            if (id) {
                id = id.replace(/__index__/g, repeaterCounter);
                $(this).attr('id', id);
            }
        });
    
        // Insert the cloned template before the "Add New" button
        $(this).before($template);
    
        // Initialize the WYSIWYG editor for the cloned item
        var editorId = $template.find('.wp-editor-area').attr('id');
        if (editorId) {
            // Delay the initialization of the TinyMCE editor to ensure DOM is ready
            setTimeout(function() {
                // Initialize the TinyMCE editor using wp.editor with default settings
                wp.editor.remove(editorId);
                wp.editor.initialize(editorId, {
                    tinymce: {
                        wpautop: true,
                        plugins: "lists,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpautoresize,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                        toolbar1: "bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker",
                        toolbar2: "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                        toolbar3: "",
                        toolbar4: ""
                    },
                    quicktags: true
                });
            }, 100);
        }
        initializeColorPickers();
        // Increment the counter
        repeaterCounter++;
    });


    // Event delegation for dynamic elements
    
    $('body').on('click', '.mbf-repeater-collapse', function() {
        var $repeaterItem = $(this).closest('.mbf-repeater-item');
        $repeaterItem.find('.mbf-sub-field').toggle();

        if ($repeaterItem.find('.mbf-sub-field').is(':visible')) {
            // Re-initialize the WYSIWYG editors
            $repeaterItem.find('.wp-editor-area').each(function() {
                var editorId = $(this).attr('id');
                if (editorId) {
                    // Initialize the TinyMCE editor using wp.editor with default settings
                    wp.editor.remove(editorId);
                    wp.editor.initialize(editorId, {
                        tinymce: {
                            wpautop: true,
                            plugins: "lists,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpautoresize,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                            toolbar1: "bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker",
                            toolbar2: "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                            toolbar3: "",
                            toolbar4: ""
                        },
                        quicktags: true
                    });
                }
            });
        }
    });


    $('.mbf-input').on('click', '.mbf-repeater-remove', function() {
        $(this).closest('.mbf-repeater-item').remove();
    });

    // Make repeater blocks sortable
    $('.mbf-input').sortable({
        items: '.mbf-repeater-item, .collapsible-box',
        handle: '.mbf-repeater-drag, .dashicons-move',
        placeholder: 'mbf-repeater-sortable-placeholder',
        forcePlaceholderSize: true,
        forceHelperSize: true,
        start: function(event, ui) {
            // Store the content of WYSIWYG editors and remove them
            ui.item.find('.wp-editor-area').each(function() {
                var editorId = $(this).attr('id');
                if (tinyMCE && tinyMCE.get(editorId)) {
                    var content = tinyMCE.get(editorId).getContent();
                    $(this).data('editorContent', content);
                    tinyMCE.execCommand('mceRemoveEditor', false, editorId);
                }
            });
    
            // Store the checked state of radio buttons
            ui.item.find('input[type="radio"]:checked').each(function() {
                $(this).data('wasChecked', true);
            });
        },
        update: function(event, ui) {
            updateOrderNumbers();
        },
        stop: function(event, ui) {
            // Reinitialize the WYSIWYG editors and restore their content
            $('.wp-editor-area').each(function() {
                var editorId = $(this).attr('id');
                if (tinyMCE) {
                    tinyMCE.execCommand('mceAddEditor', false, editorId);
                    var content = $(this).data('editorContent');
                    tinyMCE.get(editorId).setContent(content);
                }
            });
    
            // Restore the checked state of radio buttons
            $('input[type="radio"]').each(function() {
                if ($(this).data('wasChecked')) {
                    $(this).prop('checked', true);
                }
            });
        }
    });
    
    $('.layout-option').hover(
        function() { // Mouse enter
            $(this).find('.image-preview').show();
        },
        function() { // Mouse leave
            $(this).find('.image-preview').hide();
        }
    );

    // Image Upload
    
    $(document).on('click', '.mbf-image-upload', function(e) {
        e.preventDefault();
    
        var button = $(this);
        var fieldID = button.data('field-id');
        console.log('Clicked Upload Button with fieldID:', fieldID); // Debugging line
    
        var frame = wp.media({
            title: 'Select or Upload an Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });
    
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            console.log('Selected Image for fieldID:', fieldID, 'URL:', attachment.url); // Debugging line
            
            var escapedFieldID = fieldID.replace(/\[/g, '\\[').replace(/\]/g, '\\]');
            $('#' + escapedFieldID).val(attachment.url);
            console.log('Value of Hidden Input:', $('#' + escapedFieldID).val()); // Debugging line
    
            var targetContainer = $('.mbf-image-container[data-field-id="' + fieldID + '"]');
            targetContainer.css({
                'background-image': 'url(' + attachment.url + ')',
                'display': 'block'
            });
            targetContainer.find('.remove_image_button').show();
        });
    
        frame.open();
    });
    
    $(document).on('click', '.mbf-file-upload', function(e) {
        e.preventDefault();
    
        var button = $(this);
        var fieldID = button.data('field-id');
    
        var frame = wp.media({
            title: 'Select or Upload a File',
            button: {
                text: 'Use this file'
            },
            multiple: false
        });
    
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            
            var escapedFieldID = fieldID.replace(/\[/g, '\\[').replace(/\]/g, '\\]');
            $('#' + escapedFieldID).val(attachment.url);
            
            var preview = $('<div class="file-preview" data-field-id="' + escapedFieldID + '">');
            preview.append('<span class="dashicons dashicons-media-default file-icon"></span>');
            preview.append('<span class="file-name">' + attachment.filename + '</span>');
            preview.append('<span class="file-delete dashicons dashicons-no-alt"></span>');
            preview.append('</div>');
            button.before(preview);
            button.hide();
        });
    
        frame.open();
    });

    $(document).on('click', '.file-delete', function() {
        var preview = $(this).closest('.file-preview');
        var fieldID = preview.data('field-id');
        $('#' + fieldID).val('');
        preview.remove();
        $('.mbf-file-upload[data-field-id="' + fieldID + '"]').show();
    });
    

    $(document).on('click', '.remove_image_button', function(e) {
        e.preventDefault();
        var container = $(this).closest('.mbf-image-container');
        var fieldID = container.data('field-id');
        console.log('Remove Image Button Clicked for fieldID:', fieldID); // Debugging line
        $('#' + fieldID).val('');
        container.css({
            'background-image': 'none',
            'display': 'none'
        });
        $(this).hide();
    });

    $('.tab-content').hide();
    $('.tab-content:first').show();

    $('.tab-link').click(function() {
        var target = $(this).data('tab');
        $('.tab-content').hide();
        $('#' + target).show();
        $('.tab-link').removeClass('active');
        $(this).addClass('active');
    });

    $('.tab-link:first').addClass('active');

    $('.collapsible-box .box-header').on('click', function() {
        $(this).siblings('.box-content').slideToggle();
        $(this).find('.dashicons-arrow-down').toggleClass('rotated');
    });

    
});
function updateOrderNumbers() {
    jQuery('.collapsible-box[data-input-type="checkbox"]').each(function(index, element) {
        var newOrder = index + 1; // Order numbers start from 1
        jQuery(element).data('order', newOrder); // Update data attribute
        jQuery(element).find('.order-display').text(newOrder); // Update displayed order number
        jQuery(element).find('.order-input').val(newOrder); // Update hidden input value
    });
}

function destroyWysiwygEditor(editorId) {
    if (editorId && tinyMCE && tinyMCE.get(editorId)) {
        var content = tinyMCE.get(editorId).getContent();
        jQuery('#' + editorId).val(content);
        wp.editor.remove(editorId);
    }
}

function initializeWysiwygEditor(editorId) {
    if (editorId) {
        wp.editor.initialize(editorId, {
            tinymce: {
                wpautop: true,
                plugins: "lists,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpautoresize,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                toolbar1: "formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker",
                toolbar2: "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                toolbar3: "",
                toolbar4: ""
            },
            quicktags: true
        });
    }
}

function initializeColorPickers() {
    jQuery('.mbf-color-picker-display:not(.initialized)').each(function() {
        var $this = jQuery(this);
        $this.wpColorPicker({
            defaultColor: false,
            change: function(event, ui){
                var colorInput = jQuery("#" + event.target.id.replace("_display", ""));
                colorInput.val(ui.color.toString());
            },
            clear: function() {},
            hide: true,
            palettes: true
        });
        $this.addClass('initialized'); // Mark this as initialized to avoid re-initializing
    });
}
