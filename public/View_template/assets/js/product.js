function f_product_color(color_id,product_id)
{
    $(`.product_color`).removeClass('active active_select_color');
    $(`#product_color_`+color_id).addClass('active active_select_color');
    $sizeid = $var1;
    change_image_on_sizecolor($sizeid,color_id,product_id);
    change_image_on_color(color_id,product_id);
}

function change_image_on_color(color_id,product_id)
{
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    
    $.ajax({
        type:"GET",
        dataType : "json",
        url : get_image_on_color+"/"+product_id+"/"+color_id,
        success:function(data) {
            image_link = data.image1;
            $(`#variate_image`).attr('src',"/Horvey/public/"+data.image1);
            console.log(data.image1);
         }
    });
}

