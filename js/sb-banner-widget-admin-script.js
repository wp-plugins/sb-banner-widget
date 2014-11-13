(function($){
    /*
    var body = $('body'),
        sb_option = $('div.sb-option'),
        option_form = $('#sb-options-form'),
        fileFrame = null,
        newPostID = 0,
        oldPostID = wp.media.model.settings.post.id,
        formField = '';
    (function(){
        // Xử lý nút upload hình ảnh trong widget
        body.delegate('div.sb-widget .sb-insert-media', 'click', function(event){
            event.preventDefault();
            var that = $(this);
            formField = that.parent().find('input');
            if(fileFrame) {
                fileFrame.uploader.uploader.param('post_id', newPostID);
                fileFrame.open();
                return;
            }
            fileFrame = wp.media({title: 'Insert Media', button:{text: 'Use this image'}, multiple: false});
            fileFrame.on('select', function(){
                sbSetImageUpload(fileFrame, formField);
                formField = '';
            });
            fileFrame.open();
        });
    })();

    function sbSetImageUpload(fileFrame, formField) {
        var mediaData = fileFrame.state().get('selection').first().toJSON();
        if(formField) {
            var imageSource = mediaData.url,
                mediaThumbnailBox = formField.closest('div.sbtheme-media-image').find('div.sbtheme.media.image');

            formField.val(imageSource);

            if(mediaThumbnailBox.length) {
                mediaThumbnailBox.addClass('uploaded');
                mediaThumbnailBox.html('<img src="' + imageSource + '">');
            }

        }
        wp.media.model.settings.post.id = oldPostID;
    }
    */
})(jQuery);