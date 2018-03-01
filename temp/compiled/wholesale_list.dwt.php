<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<?php echo $this->fetch('library/js_languages_new.lbi'); ?>
<link rel="stylesheet" type="text/css" href="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/css/other/wholesale.css" />
<link rel="stylesheet" type="text/css" href="js/perfect-scrollbar/perfect-scrollbar.min.css" />
</head>
<body class="bg-ligtGary">
<?php echo $this->fetch('library/page_header_business.lbi'); ?>

<div class="content b2b-content">
    <div class="banner b2b-home-banner">
        <?php 
$k = array (
  'name' => 'get_adv_child',
  'ad_arr' => $this->_var['wholesale_ad'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        <div class="vip-outcon">
            <?php 
$k = array (
  'name' => 'business_user_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>
    </div>
    <div class="b2b-purchase">
        <div class="w w1200">
            <div class="bp-title">
                <h3>限时采购</h3>
            </div>
            <div class="bp-content">
                <div class="hd"><ul></ul></div>
                <div class="bd">
                    <ul>
                    	<?php $_from = $this->_var['wholesale_limit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'wholesale_limit_0_25483400_1517723567');if (count($_from)):
    foreach ($_from AS $this->_var['wholesale_limit_0_25483400_1517723567']):
?>
                        <li class="opacity_img">
                            <div class="p-img"><a href="<?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['goods_thumb']; ?>"></a></div>
                            <div class="info">
                                <div class="p-name"><a href="<?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['url']; ?>" target="_blank"><?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['goods_name']; ?></a></div>
                                <div class="p-lie">
                                    <?php if ($this->_var['wholesale_limit_0_25483400_1517723567']['goods_price'] == 0): ?>
                                    <div class="p-price"><?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['volume_price']; ?><span>/件</span></div>
                                    <div class="p-number"><em><?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['volume_number']; ?>件</em>起批</div> 
                                    <?php else: ?>
                                    <div class="p-price"><?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['goods_price']; ?><span>/件</span></div>
                                    <div class="p-number"><em><?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['moq']; ?>件</em>起批</div> 
                                    <?php endif; ?>
                                </div>
                                <?php if ($this->_var['wholesale_limit_0_25483400_1517723567']['small_time'] > 86400): ?>
                                <div class="p-time lefttime" data-time='<?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['formated_end_date']; ?>'>剩余时间：<span class="days"></span>天</div>
                                <?php else: ?>
                                <div class="p-time">剩余时间：1 天</div>
                                <?php endif; ?>
                                <a href="<?php echo $this->_var['wholesale_limit_0_25483400_1517723567']['url']; ?>" class="p-btn" target="_blank">立即采购</a>
                            </div>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="b2b-floor">
        <div class="w w1200" ectype="wholesale_cat_level">
            <?php $_from = $this->_var['get_wholesale_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'wholesale_goods');$this->_foreach['wholesale_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wholesale_goods']['total'] > 0):
    foreach ($_from AS $this->_var['wholesale_goods']):
        $this->_foreach['wholesale_goods']['iteration']++;
?>
            <?php if ($this->_foreach['wholesale_goods']['iteration'] < 9): ?>
            <?php if ($this->_var['wholesale_goods']['count_goods'] != 0): ?>
            <div class="b2b-floor-line">
                <div class="floor-hd">
                    <div class="title"><em></em><?php echo $this->_var['wholesale_goods']['cat_name']; ?></div>
                    <div class="more"><a href="<?php echo $this->_var['wholesale_goods']['cat_url']; ?>" target="_blank">更多批发<i></i></a></div>
                </div>
                <div class="floor-bd">
                    <ul>
                        <li class="floor-adv"><?php 
$k = array (
  'name' => 'get_adv_child',
  'ad_arr' => $this->_var['wholesale_cat_ad'],
  'id' => $this->_var['wholesale_goods']['cat_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></li>
                        <?php $_from = $this->_var['wholesale_goods']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <li class="floor-goods opacity_img">
                            <div class="p-img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['thumb']; ?>" width="202" height="202"></a></div>
                            <div class="p-name"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a></div>
                            <?php if ($this->_var['goods']['goods_price'] == 0): ?>
                            <div class="p-lie"><span class="label">批发价：</span><div class="p-price"><?php echo $this->_var['goods']['volume_price']; ?><span>/件</span></div></div>
                            <?php else: ?>
                            <div class="p-lie"><span class="label">批发价：</span><div class="p-price"><?php echo $this->_var['goods']['goods_price']; ?><span>/件</span></div></div>
                            <?php endif; ?>
                            <div class="p-lie">
                                <?php if ($this->_var['goods']['goods_price'] == 0): ?>
                                 <div class="fl"><span class="label">起批量：</span><em class="org"><?php echo $this->_var['goods']['volume_number']; ?></em></div>
                                <?php else: ?>
                                <div class="fl"><span class="label">起批量：</span><em class="org"><?php echo $this->_var['goods']['moq']; ?></em></div>
                                <?php endif; ?>
                                <div class="fr"><span class="label">成交量：</span><em><?php echo empty($this->_var['goods']['goods_sale']) ? '0' : $this->_var['goods']['goods_sale']; ?></em></div>
                            </div>
                            <?php echo $this->_var['goods']['goods_extends']['is_delivery']; ?>
                            <?php if ($this->_var['goods']['goods_extend']['is_delivery'] || $this->_var['goods']['goods_extend']['is_return'] || $this->_var['goods']['goods_extend']['is_free']): ?>
                            <div class="p-lie p-tiy">
                                <?php if ($this->_var['goods']['goods_extend']['is_delivery']): ?><a href="javascript:void(0);" class="goods-icons">48</a><?php endif; ?>
                                <?php if ($this->_var['goods']['goods_extend']['is_free']): ?><a href="javascript:void(0);" class="goods-icons">邮</a><?php endif; ?>
                                <?php if ($this->_var['goods']['goods_extend']['is_return']): ?><a href="javascript:void(0);" class="goods-icons">退</a><?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <a href="<?php echo $this->_var['goods']['url']; ?>" class="p-btn" target="_blank">立即采购</a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            
        </div>
    </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.SuperSlide.2.1.1.js,jquery.yomi.js')); ?>
<script type="text/javascript" src="js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/dsc-common.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.purebox.js"></script>
<script type="text/javascript">
$(".vip-item").slide({titCell:".tit a",mainCell:".con"});

function quantity(){
    $(".btn-reduce").click(function(){
        var quantity = Number($(this).siblings('.buy-num').val());
        if(quantity>1){
            quantity-=1;
            $(this).siblings('.buy-num').val(quantity);
        }else{
            return false;
        }
    });

    $(".btn-add").click(function(){
        var quantity = Number($(this).siblings('.buy-num').val());
        quantity+=1;
        $(this).siblings('.buy-num').val(quantity);
    })
}
quantity();

<?php if ($this->_var['search_category'] > 0): ?>
document.getElementById('search_category').value = '<?php echo $this->_var['search_category']; ?>';
<?php endif; ?>

var right = 0;
var winWidth = $(window).width();
var width = $("*[ectype='whoBtn']").width();

right = (winWidth-1200)/2 - width - 20;

$("*[ectype='whoBtn']").css({"right":right});

$(window).resize(function(){
    winWidth = $(window).width();

    if(winWidth < 1400){
        right = 10;
    }else{
        right = (winWidth-1200)/2 - width - 20;
    }

    $("*[ectype='whoBtn']").css({"right":right});
});

$("*[ectype='whoBtn']").on("click",function(){
    var content = $("#whoDialog1").html();
    pb({
        id:"whoDialog",
        title:"我的进货单",
        width:1040,
        content:content,
        drag:false,
        foot:false
    });
});

$(document).on("click","*[ectype='wdCart']",function(){

    var frm  = $("#whoDialog form[name='form_name']");
    var str = "";
    var consignee = frm.find("input[name='consignee']").val();
    var shipping  = frm.find("input[name='shipping']").val();
    var mobile = frm.find("input[name='mobile']").val();
    var pay_name = frm.find("input[name='pay_name']").val();
    var remarks = frm.find("textarea[name='remarks']").val();

    if(consignee == ""){
        pbDialog("联系人不能为空","",0);
        return false;
    }else{
        str += "联系人:"+consignee+"，";
    }
    if(shipping == ""){
        pbDialog("配送方式不能为空","",0);
        return false;
    }else{
        str += "配送方式："+shipping+"，";
    }
    if(mobile == ""){
        pbDialog("联系方式不能为空","",0);
        return false;
    }else{

        var reg = /^1[0-9]{10}$/;
        if (!reg.test(mobile)){
           pbDialog("联系方式格式不正确","",0);
            return false;
        }else{
            $("#phone_notice").html("<i></i>");
        }
        str += "联系方式："+mobile+"，";
    }

    if(pay_name == ""){
        pbDialog("付款方式不能为空","",0);
        return false;
    }else{
        str += "付款方式："+pay_name+"，";
    }
    str += "其他" + remarks

    $("input[name='remark']").val(str);

    frm.submit();   

});
</script>
<script type="text/javascript">
    $(".banner").slide({titCell:".hd ul",mainCell:".bd ul",effect:"fold",interTime:3500,delayTime:500,autoPlay:true,autoPage:true,trigger:"click"});
    $(".bp-content").slide({titCell:".hd ul",mainCell:".bd ul",effect:"left",interTime:3500,delayTime:500,autoPlay:true,autoPage:true,trigger:"click",vis:5,scroll:5});
    //倒计时
    $(".lefttime").each(function(){
        $(this).yomi();
    });
    //首页楼层层数
    $(function(){
	$(".b2b-floor-line").each(function(i, e) {
            i++;
            $(this).find(".title em").html(i+"F");
        })	
    })
</script>
</body>
</html>
