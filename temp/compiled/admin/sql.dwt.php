<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><?php echo $this->_var['lang']['13_backup']; ?> - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4><?php echo $this->_var['lang']['operating_hints']; ?></h4><span id="explanationZoom" title="<?php echo $this->_var['lang']['fold_tips']; ?>"></span></div>
                <ul>
                	<li>该功能可进行数据库的管理。</li>
                    <li>有一定的程序编程能力的人操作。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                    <div class="mian-info">
						<form name="sqlFrom" method="post" action="sql.php" onsubmit="return validate()">
                            <div class="switch_info">
                                <div class="items">
                                    <div class="item">
                                        <div class="label"><?php echo $this->_var['lang']['title']; ?>：</div>
                                        <div class="label_value">
											<textarea name="sql" cols="80" rows="6" class="textarea textarea_sql"><?php echo $this->_var['sql']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="label">&nbsp;</div>
                                        <div class="label_value info_btn">
											<input type="hidden" name="act" value="query">
                                            <input value="<?php echo $this->_var['lang']['query']; ?>" type="submit" class="button" />    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
					<div class="list-div order_desc mt10" id="listDiv">
					  <table cellpadding="1" cellspacing="1">
						  <tr>
							  <td>
							  <div class="log_items">
							  <?php if ($this->_var['type'] == 0): ?>
							  <!-- 出错提示-->
							  <strong class="red"><?php echo $this->_var['lang']['error']; ?>：</strong><span class="red"><?php echo $this->_var['error']; ?></span>
                              <?php elseif ($this->_var['type'] == 1): ?>
							  <!-- 执行成功-->
								<strong class="green font14"><?php echo $this->_var['lang']['succeed']; ?></strong>
							  <?php elseif ($this->_var['type'] == 2): ?>
								<!--有返回值-->
								<?php echo $this->_var['result']; ?>
							  <?php endif; ?>
							  </div>
							  </td>
						  </tr>
					  </table>
					</div>
                </div>
            </div>
		</div>
	</div>
	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    
    <script type="text/javascript">
    function validate()
    {
      var frm = document.forms['sqlFrom'];
      var sql = frm.elements['sql'].value;
      var msg ='';
    
      if (sql.length == 0 )
      {
        msg += sql_not_null + "\n";
      }
    
      if (msg.length > 0)
      {
        alert (msg);
        return false;
      }
    
      return true;
    }
	
    </script>
    
</body>
</html>
