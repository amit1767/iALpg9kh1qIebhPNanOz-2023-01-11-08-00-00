$(document).ready(function(){

    // Delete the Article from the Dashboard
    $(".deleteArticles").click(function(e){
        e.preventDefault();
        const articleId = $(this).data("id");
        const confirmation = confirm("Are you sure want to delete this article?");
        if(confirmation){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "article/delete/"+articleId,
                type: 'DELETE',
                dataType: "JSON",
                data: { "id": articleId},
                success: function(response)
                {
                    if (response.status == true) {
                        alert(response.message);
                        $("#article_box_"+articleId).animate({opacity: '0'}, 150,"linear",function()
                        {
                            $(this).remove();
                        })
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    // Delete the Article from the Dashboard
    $('.article-title-edit').on('click', function(e){
        e.preventDefault();
        var $titleInput = $('.article-title-input');
        if ($titleInput.attr('readonly')) {
            $titleInput.removeAttr('readonly');
            $titleInput.focus();
        } else {
            $titleInput.attr('readonly', 'readonly');
        }
    });

    // Article add dynamically content to the Dashboard
    var countContent = $("#totalContent").val() ?? 0;
    $(".add-article-text").click(function(e) {
        e.preventDefault();
        countContent++;
        $(".article-dynamic-fields").append('<div id="content'+countContent+'" class="content-article-box"><span class="deleteContent"><svg width="20" height="20" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M30 5.99988H0V10.9999C1.24615 10.9999 1.86923 10.9999 2.33333 11.2678C2.63737 11.4434 2.88985 11.6958 3.06538 11.9999C3.33333 12.464 3.33333 13.0871 3.33333 14.3332V24.9999C3.33333 27.8283 3.33333 29.2425 4.21201 30.1212C5.09069 30.9999 6.50491 30.9999 9.33334 30.9999H20.6667C23.4951 30.9999 24.9093 30.9999 25.788 30.1212C26.6667 29.2425 26.6667 27.8283 26.6667 24.9999V14.3332C26.6667 13.0871 26.6667 12.464 26.9346 11.9999C27.1102 11.6958 27.3626 11.4434 27.6667 11.2678C28.1308 10.9999 28.7538 10.9999 30 10.9999V5.99988ZM11.8334 14.3337C11.8334 13.7815 11.3857 13.3337 10.8334 13.3337C10.2811 13.3337 9.83337 13.7815 9.83337 14.3337V22.6671C9.83337 23.2194 10.2811 23.6671 10.8334 23.6671C11.3857 23.6671 11.8334 23.2194 11.8334 22.6671V14.3337ZM20.1667 14.3337C20.1667 13.7815 19.719 13.3337 19.1667 13.3337C18.6144 13.3337 18.1667 13.7815 18.1667 14.3337V22.6671C18.1667 23.2194 18.6144 23.6671 19.1667 23.6671C19.719 23.6671 20.1667 23.2194 20.1667 22.6671V14.3337Z" fill="#3C3C3C"/><path d="M11.7803 1.61765C11.9702 1.44046 12.3887 1.28388 12.9708 1.17221C13.553 1.06053 14.2663 1 15 1C15.7338 1 16.4471 1.06053 17.0292 1.17221C17.6114 1.28388 18.0299 1.44046 18.2198 1.61765" stroke="#3C3C3C" stroke-width="2" stroke-linecap="round"/></svg></span><label for="text" class="form-label pt-2">Content of Article</label><textarea class="form-control text-input_'+countContent+'" id="text" name="content['+countContent+'][content]" data-id="'+countContent+'" rows="4"></textarea><input type="hidden" id="content_index" name="content['+countContent+'][content_index]" value="'+countContent+'"> <input type="hidden" id="font_style_'+countContent+'" name="content['+countContent+'][font_style]" value=""> <input type="hidden" id="media_type" name="content['+countContent+'][media_type]" value="text"> <input type="hidden" name="content['+countContent+'][new_media]" value="false"> <input type="hidden" id="tag" name="content['+countContent+'][tag]" value="#text"><span class="renader'+countContent+'"></span></div>');
      });

      $("body").on("click", ".deleteContent", function(e){
        e.preventDefault();
         countContent--;
         $(this).parents('.content-article-box').remove();
      });

      $(".add-article-font").click(function(e) {
        e.preventDefault();
        if($(this).data("type") == "italic"){
            $(".text-input_"+countContent).css("font-style", "italic");
            $("#font_style_"+countContent).val("italic");
        }else{
            $(".text-input_"+countContent).css("font-style", "normal");
            $("#font_style_"+countContent).val("normal");
        }
      });

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#articleImagePreview').attr('src', e.target.result);
                $('#articleImagePreview').hide();
                $('#articleImagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#articleImageUpload").on('change',function(e) {
        e.preventDefault();
        $("#image_featured").val("");
        readURL(this);
    });

    $(".add-article-image").on('click',function(e) {
        e.preventDefault();
        countContent++;
        $(".article-dynamic-fields").append('<div id="content'+countContent+'" class="content-article-box"><span class="deleteContent"><svg width="20" height="20" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M30 5.99988H0V10.9999C1.24615 10.9999 1.86923 10.9999 2.33333 11.2678C2.63737 11.4434 2.88985 11.6958 3.06538 11.9999C3.33333 12.464 3.33333 13.0871 3.33333 14.3332V24.9999C3.33333 27.8283 3.33333 29.2425 4.21201 30.1212C5.09069 30.9999 6.50491 30.9999 9.33334 30.9999H20.6667C23.4951 30.9999 24.9093 30.9999 25.788 30.1212C26.6667 29.2425 26.6667 27.8283 26.6667 24.9999V14.3332C26.6667 13.0871 26.6667 12.464 26.9346 11.9999C27.1102 11.6958 27.3626 11.4434 27.6667 11.2678C28.1308 10.9999 28.7538 10.9999 30 10.9999V5.99988ZM11.8334 14.3337C11.8334 13.7815 11.3857 13.3337 10.8334 13.3337C10.2811 13.3337 9.83337 13.7815 9.83337 14.3337V22.6671C9.83337 23.2194 10.2811 23.6671 10.8334 23.6671C11.3857 23.6671 11.8334 23.2194 11.8334 22.6671V14.3337ZM20.1667 14.3337C20.1667 13.7815 19.719 13.3337 19.1667 13.3337C18.6144 13.3337 18.1667 13.7815 18.1667 14.3337V22.6671C18.1667 23.2194 18.6144 23.6671 19.1667 23.6671C19.719 23.6671 20.1667 23.2194 20.1667 22.6671V14.3337Z" fill="#3C3C3C"/><path d="M11.7803 1.61765C11.9702 1.44046 12.3887 1.28388 12.9708 1.17221C13.553 1.06053 14.2663 1 15 1C15.7338 1 16.4471 1.06053 17.0292 1.17221C17.6114 1.28388 18.0299 1.44046 18.2198 1.61765" stroke="#3C3C3C" stroke-width="2" stroke-linecap="round"/></svg></span><div class="mb-3"><label for="contentfile" class="form-label">Please select image</label><input type="file" name="content['+countContent+'][content]" class="form-control form-control-s content_imge'+countContent+'" accept="image/*"> <input type="hidden" name="content['+countContent+'][media_type]" id="media_type" value="image"> <input type="hidden" id="content_index" name="content['+countContent+'][content_index]" value="'+countContent+'"> <input type="hidden" name="content['+countContent+'][new_media]" id="new_media" value="true"> <input type="hidden" name="content['+countContent+'][tag]" id="tag" value="#image"></div></div>');
    });

    $(".add-article-video").on('click',function(e) {
        e.preventDefault();
        countContent++;
        $(".article-dynamic-fields").append('<div id="content'+countContent+'" class="content-article-box"><span class="deleteContent"><svg width="20" height="20" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M30 5.99988H0V10.9999C1.24615 10.9999 1.86923 10.9999 2.33333 11.2678C2.63737 11.4434 2.88985 11.6958 3.06538 11.9999C3.33333 12.464 3.33333 13.0871 3.33333 14.3332V24.9999C3.33333 27.8283 3.33333 29.2425 4.21201 30.1212C5.09069 30.9999 6.50491 30.9999 9.33334 30.9999H20.6667C23.4951 30.9999 24.9093 30.9999 25.788 30.1212C26.6667 29.2425 26.6667 27.8283 26.6667 24.9999V14.3332C26.6667 13.0871 26.6667 12.464 26.9346 11.9999C27.1102 11.6958 27.3626 11.4434 27.6667 11.2678C28.1308 10.9999 28.7538 10.9999 30 10.9999V5.99988ZM11.8334 14.3337C11.8334 13.7815 11.3857 13.3337 10.8334 13.3337C10.2811 13.3337 9.83337 13.7815 9.83337 14.3337V22.6671C9.83337 23.2194 10.2811 23.6671 10.8334 23.6671C11.3857 23.6671 11.8334 23.2194 11.8334 22.6671V14.3337ZM20.1667 14.3337C20.1667 13.7815 19.719 13.3337 19.1667 13.3337C18.6144 13.3337 18.1667 13.7815 18.1667 14.3337V22.6671C18.1667 23.2194 18.6144 23.6671 19.1667 23.6671C19.719 23.6671 20.1667 23.2194 20.1667 22.6671V14.3337Z" fill="#3C3C3C"/><path d="M11.7803 1.61765C11.9702 1.44046 12.3887 1.28388 12.9708 1.17221C13.553 1.06053 14.2663 1 15 1C15.7338 1 16.4471 1.06053 17.0292 1.17221C17.6114 1.28388 18.0299 1.44046 18.2198 1.61765" stroke="#3C3C3C" stroke-width="2" stroke-linecap="round"/></svg></span><div class="mb-3"><label for="contentfile" class="form-label">Please select video</label><input type="file" name="content['+countContent+'][content]" class="form-control form-control-s content_video'+countContent+'" accept="video/*"> <input type="hidden" name="content['+countContent+'][media_type]" id="media_type" value="video"> <input type="hidden" id="content_index" name="content['+countContent+'][content_index]" value="'+countContent+'"> <input type="hidden" name="content['+countContent+'][new_media]" value="true"> <input type="hidden" name="content['+countContent+'][tag]" value="#video"></div></div>');
    });

    // Delete article contents 
     $(".content-delete").on('click', function(e){
        e.preventDefault();
        // This is content element id
        var itemId = $(this).attr('data-id');
        // Delete content element
        $('#content_item_'+itemId).fadeOut(500, function(){ $(this).hide(100);});
        // Delete item pass true value
        $("#isDelete_"+itemId).val(true);
     });

    // Featured image status change here
    $("#articleFeatured").click(function(){
        if($(this).is(":checked")){
            $("#featured").val(false);
        }else{
            $("#featured").val(true); 
        }
    });

    // content update image or video
    $(document).on('change', '.content-img-vid', function(e) {
        e.preventDefault();
        imageVideoPreview(this);
     });

     function imageVideoPreview(input) {
        if (input.files && input.files[0]) {
            var isElement  = $(input).attr('data-index');
            var file = input.files[0];
            var mixedfile = file['type'].split("/");
            var filetype = mixedfile[0]; // (image, video)
            if(filetype == "image"){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('.view_image_'+isElement).attr('src', e.target.result);
                    $('.new_media_image_'+isElement).val('true');
                }
                reader.readAsDataURL(input.files[0]);
            }else if(filetype == "video"){
                var video = $('.view_video_'+isElement);
                video.find("source").attr('src', "");
                video.find("source").attr("src", URL.createObjectURL(input.files[0]));
                video[0].load();
                video[0].play();
                $('.new_media_video_'+isElement).val('true');
            }else{
                alert("Invalid file type");
            }
        }
    }

});

