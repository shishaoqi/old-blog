/*
* @Author: shishao
* @Date:   2017-03-11 21:41:48
* @Last Modified by:   shishao
* @Last Modified time: 2017-03-13 00:59:35
*/
function ajaxform(index, obj) {
    var url = $(obj).attr("action"),
        datax = $(obj).serialize();
    $.post(url, datax, function(data) {
        if (data.statusCode == '200') {
            layer.close(index);
            alertmessage('success', data.message, '', '', 2, '', '', '', function() {
                window.location.reload();
            });
        } else {
            alertmessage('error', data.message, '', '', 3);
        }
    }, "json");
}

function AjaxError(data) {
    if (data.status == '200') {} else {}
}

function dialog(obj) {
    var thisObj = obj;
    var title = thisObj.attr("title") || thisObj.text();
    var url = thisObj.attr("url");
    var rel = thisObj.attr("rel") || "_blank";
    var options = {};
    var w = thisObj.attr("width") || 'auto';
    var h = thisObj.attr("height") || 'auto';
    var html;
    var tpye = thisObj.attr('type') || 'GET';
    var csrf_token = csrf_token;

    $.ajax({
        type: tpye,
        url: url,
        dataType: "html",
        data:{_token: csrf_token},
        cache: false,
        success: function(data) {
            layer.open({
                type: 1, //0-4的选择,
                title: title,
                shade: 0.4,
                area: [w, h],
                content: data,
                btn: ['取消', '保存'],
                btnAlign: 'c',
                btn2: function(index, layero){//按钮【按钮二】的回调
                    layero.find('form').submit();
                    //return false 开启该代码可禁止点击该按钮关闭
                }
            });
        },
        error: AjaxError
    });
    return false;
}


function initUI(csrf_token) {
    /**
     * dialog
     * @param  {[type]} ) {               $(this).click(function(event) {        var thisObj [description]
     * @return {[type]}   [description]
     */
    $("a[target=dialog]").each(function() {
        $(this).click(function(event) {
            var thisObj = $(this);
            var title = thisObj.attr("title") || thisObj.text();
            var url = thisObj.attr("href");
            var rel = thisObj.attr("rel") || "_blank";
            var options = {};
            var w = thisObj.attr("width") || 'auto';
            var h = thisObj.attr("height") || 'auto';
            var html;
            $.ajax({
                type: 'POST',
                url: url,
                dataType: "html",
                data:{_token: csrf_token},
                cache: false,
                success: function(data) {
                    layer.open({
                        type: 1, //0-4的选择,
                        title: title,
                        shade: 0.4,
                        //maxmin: true,
                        area: [w, h],
                        content: data,
                        btn: ['取消', '保存'],
                        btnAlign: 'c',
                        btn2: function(index, layero){//按钮【按钮二】的回调
                            layero.find('form').submit();
                            //alert(layero.find('form').html());
                            //return false 开启该代码可禁止点击该按钮关闭
                        }
                        /*success: function(layero, index){
                            var btn = layero.find('.layui-layer-btn');
                            btn.find('.layui-layer-btn0').attr({
                                href: 'http://www.layui.com/',
                                target: '_blank'
                            });

                            btn.find('.layui-layer-btn1').attr({
                                href: 'http://www.layui.com/',
                                target: '_blank'
                            });
                        }*/

                    });
                    //$('select.selectpicker').selectpicker();
                    //validateform();
                    /*$('.j-icheck').iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green',
                    });*/
                },
                error: AjaxError
            });
            return false;
        });
    });
}