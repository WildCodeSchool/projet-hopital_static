jQuery(document).ready(
    function($){
        jQuery('#scrollup_upload_image_preview').attr('src', jQuery('#scrollup_upload_image').val());
        if(jQuery('#scrollup_type').val()!="image") {
            jQuery('#scrollup_custom_image_section').parent().parent().hide();
        }

        jQuery('#scrollup_type').change(
            function(){
                var i= jQuery('#scrollup_type').val();
                if(i=="image") {
                    jQuery('#scrollup_custom_image_section').parent().parent().show("slow");
                }
                else
                {
                    jQuery('#scrollup_custom_image_section').parent().parent().hide("slow");
                }
            }
        );
        jQuery('.scrollup_upload_image_button').click(
            function(e) {
                e.preventDefault();
                var image = wp.media(
                    { 
                        title: 'Upload Image',
                        // mutiple: true if you want to upload multiple files at once
                        multiple: false
                    }
                ).open()
                .on(
                    'select', function(e){
                    // This will return the selected image from the Media Uploader, the result is an object
                        var uploaded_image = image.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                        // Output to the console uploaded_image
                        console.log(uploaded_image);
                    var image_url = uploaded_image.toJSON().url;
                    // Let's assign the url value to the input field
                        jQuery('#scrollup_upload_image').val(image_url);
                    jQuery('#scrollup_upload_image_preview').attr('src', image_url);
                    }
                );
            }
        );
    }
);