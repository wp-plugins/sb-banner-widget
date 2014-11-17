(function($){
    var sb_option = $('div.sb-option'),
        option_form = $('#sb-options-form'),
        file_frame = null,
        new_post_id = 0,
        old_post_id = '',
        body = $('body');

    if(body.hasClass('widgets-php')) {
        body.delegate('.sb-insert-media.delegate', 'click', function(e){
            e.preventDefault();
            var that = $(this),
                media_container = that.closest('div.sb-media-upload'),
                image_preview_container = media_container.find('.image-preview'),
                image_container = media_container.find('.image-upload-container'),
                image_input = image_container.find('input'),
                image_url = '';

            if(file_frame) {
                file_frame.uploader.uploader.param('post_id', new_post_id);
                file_frame.open();
                return;
            }
            file_frame = wp.media({title: 'Insert Media', button:{text: 'Use this image'}, multiple: false});
            file_frame.on('select', function(){
                image_url = window.sb_receive_media_upload(file_frame);
                if($.trim(image_url)) {
                    image_input.val(image_url);
                    image_preview_container.html('<img src="' + image_url + '">');
                    image_preview_container.addClass('has-image');
                }
                file_frame = null;
            });
            file_frame.open();
        });

        body.delegate('.sb-remove-media.delegate', 'click', function(e){
            e.preventDefault();
            var that = $(this),
                media_container = that.closest('div.sb-media-upload'),
                image_preview_container = media_container.find('.image-preview'),
                image_container = media_container.find('.image-upload-container'),
                image_input = image_container.find('input');
            image_input.val('');
            image_preview_container.removeClass('has-image');
            image_preview_container.html('');
        });
    }
})(jQuery);