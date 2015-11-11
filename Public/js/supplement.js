/*!
 * Created by wengshenshun on 2015/11/11.
 */
$(document).ready(function(){
    /*$('.btn-up').on("click",function(){
        // 获得 tr元素
        var trobj = $(this).parent().parent();
        // tr元素中包含 dev_id属性
        var dev_id = trobj.attr('dev_id');
        console.log( dev_id );
        // 访问该tr元素的所有子td元素
        var tdobj = $(trobj).children("td");

        var status_obj = $(tdobj).eq(2);
        var status_str = status_obj.text();
        console.log(status_str);

        if( status_str == "on"){
            status_obj.text("off");
            sendLedControl( dev_id , "off" );
        }else{
            status_obj.text("on");
            sendLedControl( dev_id , "on" );
        }
    });*/
    progressbarchange();
});
function progressbarchange(){
    var progressbar=1;
    $('.progress-bar').each(
        function(){
            progressbar=$(this).attr("aria-valuenow");
            $(this).attr("style","width:"+progressbar+"%");
        }
    )
}