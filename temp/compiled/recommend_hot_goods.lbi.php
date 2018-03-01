
<?php if ($this->_var['hot_goods']): ?>
<div class="mc-main" style="display:block;">
	<div class="mcm-left">
		<div class="spirit"></div>
		<?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_31766100_1517022098');$this->_foreach['hot'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_31766100_1517022098']):
        $this->_foreach['hot']['iteration']++;
?>
		<div class="rank-number rank-number<?php echo $this->_foreach['hot']['iteration']; ?>"><?php echo $this->_foreach['hot']['iteration']; ?></div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
	<div class="mcm-right">
		<ul>
			<?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_31771500_1517022098');$this->_foreach['hot'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_31771500_1517022098']):
        $this->_foreach['hot']['iteration']++;
?>
			<li>
				<div class="p-img"><a href="<?php echo $this->_var['goods_0_31771500_1517022098']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_31771500_1517022098']['short_style_name']); ?>"><img src="<?php echo $this->_var['goods_0_31771500_1517022098']['thumb']; ?>" width="130" height="130"></a></div>
				<div class="p-name"><a href="<?php echo $this->_var['goods_0_31771500_1517022098']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_31771500_1517022098']['short_style_name']); ?>"><?php echo $this->_var['goods_0_31771500_1517022098']['short_style_name']; ?></a></div>
				<div class="p-price">
					<?php if ($this->_var['goods_0_31771500_1517022098']['promote_price'] != ''): ?>
						<?php echo $this->_var['goods_0_31771500_1517022098']['promote_price']; ?>
					<?php else: ?>
						<?php echo $this->_var['goods_0_31771500_1517022098']['shop_price']; ?>
					<?php endif; ?>
				</div>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>
<?php endif; ?> 