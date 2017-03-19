/*
* @Author: shishao
* @Date:   2017-03-11 21:41:48
* @Last Modified by:   shishao
* @Last Modified time: 2017-03-19 21:36:19
*/
$.fn.extend({
    formAjax: function() {
        return this.each(function() {
            var $this = $(this);
            $this.submit(function(event) {
                event.preventDefault();
                var url = $this.attr("action"),
                    data = $this.serialize();
                $.post(url, data, function(data) {
                    if (data.status) {
                        if (data.url == '') {
                            layer.statusinfo(data.info, 'success', function() {
                                location.reload()
                            });
                        } else {
                            layer.statusinfo(data.info + "&nbsp;&nbsp;2秒后跳转", 'success', urllocation, data.url);
                        }
                    } else {
                        layer.statusinfo(data.info, 'error');
                    }
                }, "json");
            });
        });
    },
    AjaxTodo: function() {
        return this.each(function() {
            var $this = $(this);
            $this.click(function(event) {
                event.preventDefault();
                var url = $this.attr("href");
                var title = $this.attr("title");
                if (title) {
                    layer.confirm(title, function(index) {
                        layer.close(index);
                        AjaxTodo(url, $this.attr("callback"));
                    });
                } else {
                    AjaxTodo(url, $this.attr("callback"));
                }
            });
        });
    },
})

function alertmessage(type, text, closetype, layout, time, onShow, afterShow, onClose, afterClose, onCloseClick) {
    var type = type || 'success',
        text = text || 'nothing',
        closetype = closetype || 'click',
        layout = layout || 'topcenter',
        time = time || 0;
    var icon, icontext, icontextcolor;
    if (type == 'info') {
        type = 'notification';
    }
    if (type == 'success') {
        icon = '<h3 class="content-box-header bg-blue-alt">';
        icontext = '<span class=" font-size-18 "><i class="glyph-icon icon-check font-size-23"></i> 操作成功</span></h3>';
        icontextcolor = '<div class="content-box-wrapper noty_text font-blue font-bold">';
    }
    if (type == 'error' || type == 'alert') {
        icon = '<h3 class="content-box-header bg-red">';
        icontext = '<span class=" font-size-18 "><i class="glyph-icon icon-exclamation-triangle font-size-23"></i> 操作失败</span></h3>';
        icontextcolor = '<div class="content-box-wrapper noty_text font-red font-bold">';
    }
    if (type == 'notification') {
        icon = '<h3 class="content-box-header primary-bg">';
        icontext = '<span class=" font-size-18 "><i class="glyph-icon icon-info font-size-23"></i> 信息提示 </span></h3>';
        icontextcolor = '<div class="content-box-wrapper noty_text font-black font-bold">';
    }
    var html = icon;
    html += icontext;
    html += icontextcolor;
    html += '</div>';
    var n = noty({
        text: text,
        type: type,
        closeWith: [closetype, 'backdrop'],
        theme: 'agileUI',
        template: html,
        layout: layout,
        animation: {
            open: {
                height: 'toggle'
            }, // or Animate.css class names like: 'animated bounceInLeft'
            close: {
                height: 'toggle'
            }, // or Animate.css class names like: 'animated bounceOutLeft'
            easing: 'swing',
            speed: 300 // opening & closing animation speed
        },
        callback: {
            onShow: function() {
                onShow
            },
            afterShow: function() {
                afterShow
            },
            onClose: function() {
                onClose
            },
            afterClose: afterClose,
            onCloseClick: function() {
                onCloseClick
            },
        },
    });
    if (time > 0) {
        setTimeout(function() {
            n.close();
        }, time * 1000);
    }
}

function AjaxDone(data) {
    if (data.statusCode == '200') {
        alert(1);
        layer.closeAll();
        alertmessage('success', data.message, '', '', 2, '', '', '', function() {
            window.location.reload();
        });
    } else {
        alert(2);
        alertmessage('error', data.message, '', '', 3);
    }
}

function AjaxTodo(url, callback) {
    var $callback = callback || AjaxDone;
    if (!$.isFunction($callback)) $callback = eval('(' + callback + ')');

    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        cache: false,
        success: $callback,
        error: AjaxError
    });
}


//确定是否是扩展jQuery,是：直接调用
if ($.fn.formAjax) $("form[target=formAjax]").formAjax();
if ($.fn.AjaxTodo) $("a[target=AjaxTodo]").AjaxTodo();


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
                    return false //开启该代码可禁止点击该按钮关闭
                }
            });
        },
        error: AjaxError
    });

    return false;
}

function deleteAlert(obj){
    var url = obj.attr("data-url");
    var title = obj.attr("title");
    var csrf_token = obj.attr("csrf_token");

    if (title) {
        layer.confirm(title, function(index) {
            layer.close(index);
            AjaxDelete(url, obj.attr("callback"), csrf_token);
        });
    } else {
        AjaxDelete(url, obj.attr("callback"), csrf_token);
    }
}

function AjaxDelete(url, callback, csrf_token) {
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        cache: false,
        data:{'_token': csrf_token, '_method': 'DELETE'},
        //success: $callback,
        success: function(){
            window.location.reload();
        },
        //error: AjaxError
        error: function(){
            alert('error');
            window.location.reload();
        }
    });
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
            var actionType = thisObj.attr("action-type") || 'POST';
            var html;
            $.ajax({
                type: actionType,
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