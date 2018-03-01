<?php if ($this->_var['topBanner']): ?>
<?php echo $this->_var['topBanner']; ?>
<?php else: ?>
<?php 
$k = array (
  'name' => 'get_adv',
  'logo_name' => $this->_var['top_banner'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
<?php endif; ?>
<div class="site-nav" id="site-nav">
    <div class="w w1200">
        <div class="fl">
        <?php 
$k = array (
  'name' => 'header_region',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
            <div class="txt-info" id="ECS_MEMBERZONE">
		<?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>	
            </div>
        </div>
        <ul class="quick-menu fr">
            <?php if ($this->_var['navigator_list']['top']): ?>
            <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
            <?php if (($this->_foreach['nav_top_list']['iteration'] - 1) < 4): ?>
            <li>
                <div class="dt"><a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew']): ?>target="_blank"<?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a></div>
            </li>
            <li class="spacer"></li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
            <?php if ($this->_var['navigator_list']['top']): ?>
            <li class="li_dorpdown" data-ectype="dorpdown">
                <div class="dt dsc-cm"><?php echo $this->_var['lang']['Site_navigation']; ?><i class="iconfont icon-down"></i></div>
                <div class="dd dorpdown-layer">
                    <dl class="fore1">
                        <dt>特色主题</dt>
                        <dd>
                            <?php $_from = $this->_var['top_cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'topc_cats');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['topc_cats']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
                                <?php if (($this->_foreach['nav_top_list']['iteration'] - 1) < 3): ?>
                                    <div class="item"><a href="<?php echo $this->_var['topc_cats']['url']; ?>" target="_blank"><?php echo $this->_var['topc_cats']['cat_alias_name']; ?></a></div>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </dd>
                    </dl>
                    <dl class="fore2">
                        <dt>促销活动</dt>
                        <dd>
                            <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
                                <?php if (($this->_foreach['nav_top_list']['iteration'] - 1) >= 4): ?>
                                    <div class="item"><a href="<?php echo $this->_var['nav']['url']; ?>"<?php if ($this->_var['nav']['opennew']): ?> target="_blank"<?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a></div>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </dd>
                    </dl>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="header header-b2b">
    <div class="w w1200">
        <div class="logo">
            <div class="logoImg"><a href="wholesale.php"><img src="<?php echo $this->_var['site_domain']; ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/business_logo.gif" /></a></div>
        </div>
        <div class="dsc-search">
            <div class="form">
                <form id="searchForm" name="searchForm" method="get" action="wholesale_search.php" onSubmit="return checkSearchForm()" class="search-form">
                    <input autocomplete="off"  name="keywords" type="text" id="keyword" value="<?php if ($this->_var['wholesale_search_keywords']): ?><?php echo $this->_var['wholesale_search_keywords']; ?><?php else: ?><?php 
$k = array (
  'name' => 'wholesale_rand_keyword',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?><?php endif; ?>" class="search-text"/>
                    <button type="submit" class="button button-goods" onclick="checkstore_search_cmt(0)" >搜商品</button>
                    <a href="javascript:;" ectype="wantToBuy" class="wantToBuy"><i class="iconfont icon-book"></i>发布求购单</a>
					<input type="hidden" name="user_id" value="<?php echo empty($this->_var['user_id']) ? '0' : $this->_var['user_id']; ?>">
                </form>
                <?php if ($this->_var['wholesale_keywords']): ?>
                <ul class="keyword">
                <?php $_from = $this->_var['wholesale_keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
                <li><a href="wholesale_search.php?keywords=<?php echo urlencode($this->_var['val']); ?>" target="_blank"><?php echo $this->_var['val']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <?php endif; ?>
                
                <div class="suggestions_box" id="suggestions" style="display:none;">
                    <div class="suggestions_list" id="auto_suggestions_list">
                        &nbsp;
                    </div>
                </div>
                
            </div>
        </div>
        <div class="shopCart b2b-shopCart" data-ectype="dorpdown" id="ECS_WHOLESALE_CARTINFO" data-carteveval="0">
        <?php 
$k = array (
  'name' => 'wholesale_cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>
    </div>
</div>
<div class="nav nav-b2b<?php if ($this->_var['filename'] != 'wholesale'): ?> dsc-zoom<?php endif; ?>">
    <div class="w w1200">
        <div class="b2b-categorys">
        	<div class="b2b-categorys-all"><a href="#" target="_blank">全部批发商品</a></div>
            <div class="b2b-categorys-content<?php if ($this->_var['filename'] != 'wholesale'): ?> hide<?php endif; ?>">
            	<ul>
                	<?php $_from = $this->_var['business_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['business_cate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['business_cate']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['business_cate']['iteration']++;
?>
                    <?php if (($this->_foreach['business_cate']['iteration'] - 1) < 10): ?>
                    <li><i class="iconfont icon-<?php echo $this->_var['cat']['style_icon']; ?>"></i><a href="<?php echo $this->_var['cat']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></li>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <div class="nav-main">
        	<ul class="navitems">
            	<li><a href="wholesale.php" <?php if ($this->_var['index'] == 'index'): ?>class="curr"<?php endif; ?>>批发首页</a></li>
                <li><a href="wholesale_purchase.php?act=list" <?php if ($this->_var['buy'] == 'list'): ?>class="curr"<?php endif; ?>>求购信息</a></li>
            </ul>
        </div>
    </div>
</div>
<?php if ($this->_var['filename'] != 'wholesale'): ?>
<script type="text/javascript">
$(document).on("mouseover", ".b2b-categorys", function(){
	$(".b2b-categorys-content").removeClass('hide');
})
$(document).on("mouseout", ".b2b-categorys", function(){
	$(".b2b-categorys-content").addClass('hide');
})
</script>
<?php endif; ?>
<script type="text/javascript">
//发布求购单
$(document).on('click', "[ectype='wantToBuy']", function(){
  var user_id = $("input[name='user_id']").val();
  var url = 'wholesale_purchase.php?act=release';
  if(user_id > 0){
	location.href = url;
  }else{
	$.notLogin("get_ajax_content.php?act=get_login_dialog", url);
  }
})
</script>