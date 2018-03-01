<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><a href="javascript:;" ectype='goback' class="s-back">返回</a>供求 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4><?php echo $this->_var['lang']['operating_hints']; ?></h4><span id="explanationZoom" title="<?php echo $this->_var['lang']['fold_tips']; ?>"></span>				
				</div>
                <ul>
                	<li>该页面展示了商城所有的求购单。</li>
                    <li>可根据关键词等条件进行查询。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<div class="common-head">
                   	<?php if ($this->_var['action_link']): ?>
                    <div class="fl">
                        <a href="<?php echo $this->_var['action_link']['href']; ?>"><div class="fbutton"><div class="add" title="<?php echo $this->_var['action_link']['text']; ?>"><span><i class="icon icon-plus"></i><?php echo $this->_var['action_link']['text']; ?></span></div></div></a>
                    </div>
                    <?php endif; ?>
                    <div class="refresh<?php if (! $this->_var['action_link']): ?> ml0<?php endif; ?>">
                    	<div class="refresh_tit" title="<?php echo $this->_var['lang']['refresh_data']; ?>"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span"><?php echo $this->_var['lang']['refresh_common']; ?><?php echo $this->_var['record_count']; ?><?php echo $this->_var['lang']['record']; ?></div>
                    </div>
                    
                    <div class="search">
                    	<form action="javascript:;" name="searchForm" onSubmit="searchGoodsname(this);">
                        <div class="input">
                            <input type="text" name="keyword" class="text nofocus" placeholder="关键词" autocomplete="off" />
                            <input type="submit" class="btn" name="secrch_btn" ectype="secrch_btn" value="" />
                        </div>
                        </form>
                    </div>
                    
                </div>
                <div class="common-content">
					<form method="post" action="wholesale_purchase.php" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
						<div class="list-div" id="listDiv">
							<?php endif; ?>
							<table cellpadding="0" cellspacing="0" border="0">
								<thead>
									<tr>
										<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
										<th width="5%"><div class="tDiv"><a href="javascript:listTable.sort('purchase_id'); "><?php echo $this->_var['lang']['record_id']; ?></a></div></th>
										<th width="32%"><div class="tDiv">求购单标题</div></th>
										<th width="10%"><div class="tDiv">求购产品类型</div></th>
										<th width="10%"><div class="tDiv">会员账号</div></th>
										<th width="10%"><div class="tDiv"><a href="javascript:listTable.sort('add_time'); ">发布时间</a></div></th>
										<th width="10%"><div class="tDiv"><a href="javascript:listTable.sort('end_time'); ">截止时间</a></div></th>
										<th width="10%"><div class="tDiv">是否上架</div></th>
										<th width="10%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php $_from = $this->_var['purchase_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
									<tr>
										<td class="sign">
											<div class="tDiv">
												<input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['list']['purchase_id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['list']['purchase_id']; ?>" />
												<label for="checkbox_<?php echo $this->_var['list']['purchase_id']; ?>" class="checkbox_stars"></label>
											</div>
										</td>
										<td><div class="tDiv"><?php echo $this->_var['list']['purchase_id']; ?></div></td>
										<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['subject']); ?></div></td>
										<td><div class="tDiv"><?php echo $this->_var['lang']['purchase_type'][$this->_var['list']['type']]; ?></div></td>
										<td><div class="tDiv"><?php if ($this->_var['list']['user_name']): ?><font style="color:#F00;"><?php echo $this->_var['list']['user_name']; ?></font><?php else: ?><font class="blue">匿名</font><?php endif; ?></div></td>
										<td><div class="tDiv"><?php echo $this->_var['list']['add_time']; ?></div></td>
										<td><div class="tDiv"><?php echo $this->_var['list']['end_time']; ?></div></td>
										<td>
											<div class="tDiv">
												<div class="switch <?php if ($this->_var['list']['review_status']): ?>active<?php endif; ?>" title="<?php if ($this->_var['list']['review_status']): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_review_status', <?php echo $this->_var['list']['purchase_id']; ?>)">
													<div class="circle"></div>
												</div>
												<input type="hidden" value="0" name="">
											</div>									
										</td>									
										<td class="handle">
											<div class="tDiv a2">
												<a href="wholesale_purchase.php?act=edit&purchase_id=<?php echo $this->_var['list']['purchase_id']; ?>" title="<?php echo $this->_var['lang']['view']; ?>" class="btn_edit"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view']; ?></a>
												<a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['purchase_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a>
											</div>
										</td>
									</tr>
									<?php endforeach; else: ?>
										<tr><td class="no-records" colspan="12"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
									<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="12">                                         
											<div class="tDiv">
												<div class="tfoot_btninfo">
													<div class="shenhe">
														<input type="submit" name="drop" id="btnSubmit" value="<?php echo $this->_var['lang']['drop']; ?>" class="btn btn_disabled" disabled="true" ectype="btnSubmit" />
														<input type="hidden" name="act" value="batch" />											  
													</div>										
												</div>
												<div class="list-page">
													<?php echo $this->fetch('library/page.lbi'); ?>
												</div>
											</div>
										</td>
									</tr>
								</tfoot>
							</table>
							<?php if ($this->_var['full_page']): ?>
						</div>
					</form>
                </div>
				
            </div>
        </div>
    </div>
 	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    
    <script type="text/javascript">
		listTable.recordCount = <?php echo empty($this->_var['record_count']) ? '0' : $this->_var['record_count']; ?>;
		listTable.pageCount = <?php echo empty($this->_var['page_count']) ? '1' : $this->_var['page_count']; ?>;
		
		<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
		listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
		$(function(){
			//点击查看图片
			$('.nyroModal').nyroModal();
		});
    </script>
</body>
</html>
<?php endif; ?>
