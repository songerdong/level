$(function () {
    var scWidth = window.innerWidth;
    var scHeight = window.innerHeight;
    $(".prompt").css({"width": scWidth + "px", "height": scHeight + "px"})
    $(".prompt>div>span").click(function () {
        $(".prompt").hide()
    })
});
function tologin() {
    location.href = "login.html"
}
//用户名
function checkname() {
    var username = $("#username").val();
    var testUser = /^[\u4E00-\u9FA5a-z0-9_]+$/i;
    if (username == '') {
//		addtip("username", "请输入您要使用的用户名");
        $("#username").val("");
        $(".prompt>div>p").text("请输入用户名");
        $(".prompt").show()
    } else if (username.length < 3 || username.length > 16) {
//		addtip("username", "用户名长度3-16个字符");
        $("#username").val("");
        $(".prompt>div>p").text("用户名长度3-16个字符");
        $(".prompt").show()

    } else if (isFirstNum(username)) {
//		addtip("username", "用户名不能使用数字、汉字开头");
        $("#username").val("");
        $(".prompt>div>p").text("用户名不能使用数字、汉字开头");
        $(".prompt").show()
    } else if (!testUser.test(username)) {
//		addtip("username", "仅可使用字母、数字、汉字和下划线");
        $("#username").val("");
        $(".prompt>div>p").text("仅可使用字母、数字、汉字和下划线");
        $(".prompt").show()
    } else {
        $.getJSON(get_url("act=verifyusername&username=" + encodeURIComponent(username)), function (res) {
            if (res.error == '0') {
//				addtip("username", '已注册过，请更换用户名');
                $("#username").val("");
                $(".prompt>div>p").text("已注册过，请更换用户名");
                $(".prompt").show()
            }
        });
    }
}
//登录密码
function checkpassword() {
    if ($("#password,#checkpassword").val() == '') {
        // addtip("password","至少6位的数字、字母组合。");
        $("#password,#checkpassword").val("");
        $(".prompt>div>p").text("至少6位的数字、字母组合");
        $(".prompt").show()
    } else if ($("#password,#checkpassword").val().length < 6) {
        // addtip("password","密码长度最小六位！");
        $("#password,#checkpassword").val("");
        $(".prompt>div>p").text("密码长度最小六位");
        $(".prompt").show()
    }
}
//支付密码
function checkrepass() {
    if ($("#repass,#checkrepass").val() == "") {
        // addtip("_repass","请再次输入支付密码。");
        $("#repass").val("");
        $(".prompt>div>p").text("请输入支付密码");
        $(".prompt").show()
    } else if ($("#repass,#checkrepass").val().length < 6) {
        // addtip("repass","支付密码长度最小六位！");
        $("#repass").val("");
        $(".prompt>div>p").text("支付密码长度最小六位！");
        $(".prompt").show()
    }
}

function checkuserphone() {
    var userphone = $("#userphone").val();
    if (userphone == '') {
// addtip("userphone","您还没有输入手机号码");
        $(".prompt>div>p").text("您还没有输入手机号码");
        $(".prompt").show();
    } else if (userphone.length < 11 || userphone.length > 11) {
// addtip("userphone","请输入有效的手机号码");
        $(".prompt>div>p").text("请输入有效的手机号码");
        $(".prompt").show();
    }
    else {
        yestip("userphone", "&nbsp;");
    }
}
function checknowopen() {
    var nowopen = $("#nowopen").val();
    var mymoney = parseFloat($("#mymoney").val());
    if (nowopen == '') {
        addtip("nowopen", "请选择是否现在开通");
    } else {
        yestip("nowopen", '');
        checkgroupid();
    }
}
function checkgroupid() {
    var groupid = $("#groupid").val();
    var mymoney = parseFloat($("#mymoney").val());
    if (groupid == '') {
//  addtip("groupid","对不起，请选择会员级别");
        $(".prompt>div>p").text("对不起，请选择会员级别");
        $(".prompt").show();
    } else {
        $.ajax({
            url: get_url("act=getregmoney&groupid=" + groupid),
            type: 'GET',
            success: function (money) {
                if ($("#nowopen").val() == '0') {
                    yestip("groupid", '');
                } else {
                    if (parseFloat(money) > mymoney) {

                    } else {
                        yestip("groupid", '开通该级别会员将扣您' + money + '元！', '1');
                    }
                }
            }
        });
    }
}
function checkreferee() {
    var referee = $("#referee").val();
    if (referee == '') {
        addtip("referee", "对不起，请输入直荐会员");
    } else {
        $.getJSON(get_url("act=verifyusername&username=" + encodeURIComponent(referee)), function (res) {
            if (res.error == '0') {
                yestip("referee", res.truename);
            } else {
                addtip("referee", res.error);
            }
        });
    }
}
function check_referee() {
    var _referee = $("#_referee").val();
    if (_referee == '') {
        addtip("_referee", "对不起，请输入会员上线");
    } else {
        $.getJSON(get_url("act=verifyusername&username=" + encodeURIComponent(_referee)), function (res) {
            if (res.error == '0') {
                yestip("_referee", res.truename);
            } else {
                addtip("_referee", res.error);
            }
        });
    }
}
function checktruename() {
    if ($("#truename").val() == '') {
        addtip("truename", "请填写会员姓名。");
    } else {
        yestip("truename", "");
    }
}
function checkservice() {
    var service = $("#service").val();
    if (service == '') {
        removetip("service", '');
    } else {
        $.getJSON(get_url("act=verifyservice&username=" + encodeURIComponent(service)), function (res) {
            if (res.error == '0') {
                yestip("service", res.truename);
            } else {
                addtip("service", res.error);
            }
        });
    }
}
function checkform() {
    var post = true;
    var testUser = /^[\u4E00-\u9FA5a-z0-9_]+$/i;
    if ($("#username").val() == '') {
        addtip("username", "请输入您要使用的用户名");
        post = false;
    }
    if ($("#username").val().length < 4 || $("#username").val().length > 20) {
        post = false;
    }
    if (isFirstNum($("#username").val()) && post) {
        post = false;
    }
    if (!testUser.test($("#username").val()) && post) {
        post = false;
    }
    if ($("#usernametip").html().indexOf('已注册过') != -1 && post) {
        post = false;
    }
    if (!(isPhone($("#userphone").val()) || $("#userphone").val() == '')) {
        post = false;
    }
    if (!(isEmail($("#email").val()) || $("#email").val() == '')) {
        post = false;
    }
    if ($("#nowopen").val() == '') {
        addtip("nowopen", "请选择是否现在开通");
        post = false;
    }
    if ($("#truename").val() == '') {
        addtip("truename", "请填写会员姓名。");
        post = false;
    }
    if ($("#userphone").val() == '') {
        addtip("userphone", "您还没有填写手机号码");
        post = false;
    }
    if ($("#_referee").val() == '') {
        addtip("_referee", "对不起，请输入会员上线");
        post = false;
    }
    if ($("#_refereetip").html().indexOf('会员上线不存在') != -1 && post) {
        post = false;
    }
    if ($("#password").val() == '') {
        addtip("password", "对不起，请输入会员登陆密码");
        post = false;
    }
    if ($("#password").val().length < 6) {
        addtip("password", "密码长度最小六位！");
        post = false;
    }
    if ($("#_repass").val() == '') {
        addtip("_repass", "对不起，请输入支付密码");
        post = false;
    }
    if ($("#_repass").val().length < 6) {
        addtip("_repass", "支付密码长度最小六位！");
        post = false;
    }
    if (post) listTable.register();
    return false;
}