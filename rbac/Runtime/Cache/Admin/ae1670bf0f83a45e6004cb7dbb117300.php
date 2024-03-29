<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"/><title>菜单管理 - bjyadmin</title>    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Components/rbac/Public/statics/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Components/rbac/Public/statics/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Components/rbac/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/Components/rbac/tpl/Public/css/base.css" /></head><body><div class="bjy-admin-nav"><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-home"></i> 首页</a> &gt; 菜单管理</div><ul id="myTab" class="nav nav-tabs"><li class="active"> <a href="#home" data-toggle="tab">菜单列表</a></li><li> <a href="javascript:;" onclick="add()">添加菜单</a></li></ul><form action="<?php echo U('Admin/Nav/order');?>" method="post"><div id="myTabContent" class="tab-content"><div class="tab-pane fade in active" id="home"><table class="table table-striped table-bordered table-hover table-condensed"><tr><th width="5%">排序</th><th>菜单名</th><th>连接</th><th>操作</th></tr><?php if(is_array($data)): foreach($data as $key=>$v): ?><tr><td> <input class="form-control" style="width:40px;height:25px;" type="text" name="<?php echo ($v['id']); ?>" value="<?php echo ($v['order_number']); ?>"></td><td><?php echo ($v['_name']); ?></td><td><?php echo ($v['mca']); ?></td><td> <a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" onclick="add_child(this)">添加子菜单</a> | <a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" navMca="<?php echo ($v['mca']); ?>" navIco="<?php echo ($v['ico']); ?>" onclick="edit(this)">修改</a> | <a href="javascript:if(confirm('确定删除？'))location='<?php echo U('Admin/Nav/delete',array('id'=>$v['id']));?>'">删除</a></td></tr><?php endforeach; endif; ?><tr><th> <input class="btn btn-success" type="submit" value="排序"></th><td></td><td></td></tr></table></div></div></form><div class="modal fade" id="bjy-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button><h4 class="modal-title" id="myModalLabel"> 添加菜单</h4></div><div class="modal-body"><form id="bjy-form" class="form-inline" action="<?php echo U('Admin/Nav/add');?>" method="post"> <input type="hidden" name="pid" value="0"><table class="table table-striped table-bordered table-hover table-condensed"><tr><th width="12%">菜单名：</th><td> <input class="form-control" type="text" name="name"></td></tr><tr><th>连接：</th><td> <input class="form-control" type="text" name="mca"> 输入模块/控制器/方法即可 例如 Admin/Nav/index</td></tr><tr><th>图标：</th><td> <input class="form-control" type="text" name="ico"> font-awesome图标 输入fa fa- 后边的即可</td></tr><tr><th></th><td> <input class="btn btn-success" type="submit" value="添加"></td></tr></table></form></div></div></div></div><div class="modal fade" id="bjy-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button><h4 class="modal-title" id="myModalLabel"> 修改菜单</h4></div><div class="modal-body"><form id="bjy-form" class="form-inline" action="<?php echo U('Admin/Nav/edit');?>" method="post"> <input type="hidden" name="id"><table class="table table-striped table-bordered table-hover table-condensed"><tr><th width="12%">菜单名：</th><td> <input class="form-control" type="text" name="name"></td></tr><tr><th>连接：</th><td> <input class="form-control" type="text" name="mca"> 输入模块/控制器/方法即可 例如 Admin/Nav/index</td></tr><tr><th>图标：</th><td> <input class="form-control" type="text" name="ico"> font-awesome图标 输入fa fa- 后边的即可</td></tr><tr><th></th><td> <input class="btn btn-success" type="submit" value="修改"></td></tr></table></form></div></div></div></div><!-- 引入bootstrjs部分开始 -->
<script src="/Components/rbac/Public/statics/js/jquery-1.10.2.min.js"></script>
<script src="/Components/rbac/Public/statics/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/Components/rbac/tpl/Public/js/base.js"></script><script>
// 添加菜单
function add(){
	$("input[name='name'],input[name='mca']").val('');
	$("input[name='pid']").val(0);
	$('#bjy-add').modal('show');
}

// 添加子菜单
function add_child(obj){
	var navId=$(obj).attr('navId');
	$("input[name='pid']").val(navId);
	$("input[name='name']").val('');
	$("input[name='mca']").val('');
	$("input[name='ico']").val('');
	$('#bjy-add').modal('show');
}

// 修改菜单
function edit(obj){
	var navId=$(obj).attr('navId');
	var navName=$(obj).attr('navName');
	var navMca=$(obj).attr('navMca');
	var navIco=$(obj).attr('navIco');
	$("input[name='id']").val(navId);
	$("input[name='name']").val(navName);
	$("input[name='mca']").val(navMca);
	$("input[name='ico']").val(navIco);
	$('#bjy-edit').modal('show');
}

</script></body></html>