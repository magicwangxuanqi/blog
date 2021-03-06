<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url();?>">
    <title>博客设置/分类管理 <?php echo $this->session->userdata('uname');?>的博客 - SYSIT个人博客</title>
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <script type="text/javascript" src="assets/js/jquery-1.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery_002.js"></script>
    <script type="text/javascript" src="assets/js/oschina.js"></script>
    <style type="text/css">
        body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}
    </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
    <div id="OSC_Banner">
        <div id="OSC_Slogon"><?php echo $this->session->userdata('uname');?>'s Blog</div>
        <div id="OSC_Channels">
            <ul>
                <li><a href="javascript:;" class="project"><?php echo $this->session->userdata(umood);?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div><!-- #EndLibraryItem --><div id="OSC_Topbar">
        <div id="VisitorInfo">
            当前访客身份：
            <?php echo $this->session->userdata('uname');?> [ <a href="User/unindex">退出</a> ]
            <span id="OSC_Notification">
			<a href="Blog/inbox" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
																				</span>
        </div>
        <div id="SearchBar">
            <form action="javascript:;">
                <input name="user" value="154693" type="hidden">
                <input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
                <input class="SUBMIT" value="搜索" type="submit">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div id="OSC_Content">
        <div id="AdminScreen">
            <div id="AdminPath">
                <a href="Blog/index">返回我的首页</a>&nbsp;»
                <span id="AdminTitle">博客设置/分类管理</span>
            </div>
            <div id="AdminMenu"><ul>
                    <li class="caption">个人信息管理
                        <ol>
                            <li><a href="Blog/inbox">站内留言(0/1)</a></li>
                            <li><a href="Blog/profile">编辑个人资料</a></li>
                            <li><a href="Blog/chpwd">修改登录密码</a></li>
                            <li><a href="Blog/userSettings">网页个性设置</a></li>
                        </ol>
                    </li>
                </ul>
                <ul>
                    <li class="caption">博客管理
                        <ol>
                            <li><a href="Blog/newBlog">发表博客</a></li>
                            <li><a href="Blog/blogCatalogs">博客设置/分类管理</a></li>
                            <li><a href="Blog/blogs">文章管理</a></li>
                            <li><a href="Blog/blogComments">博客评论管理</a></li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div id="AdminContent">
                <div class="MainForm BlogCatalogManage">
                    <form id="CatalogForm" action="Blog/editCatalog" method="post">
                        <h3> 修改博客分类 </h3>
                        <div id="error_msg" class="error_msg" style="display:none;"></div>
                        <label>分类名称:</label><input id="txt_link_name" name="name" value="<?php echo $amd->NAME;?>" size="15" tabindex="1" type="text">
                        <label>排序值:</label><input name="sort_order" value="<?php echo $amd->CATALOG_ID;?>" size="3" type="text">
                        <span class="submit">
                          <input value="修改&nbsp;»" tabindex="3" class="BUTTON SUBMIT" type="submit">
                          <input value="取消" class="BUTTON" onclick="location.href='Blog/blogCatalogs';" type="button">
                        </span>
                    </form>
                    <form class="BlogCatalogs">
                        <h3>博客分类 <span>(点击分类名编辑)</span></h3>
                        <table cellpadding="1" cellspacing="1">
                            <tbody><tr>
                                <th>序号</th>
                                <th>分类名</th>
                                <th>文章</th>
                                <th>操作</th>
                            </tr>
                            <?php
                            //$val->CATALOG_ID
                            $i=0;
                            foreach($cata as $val) {
                                if($this->session->userdata('uid')==$val->USER_ID){
                                    $i=$i+1;
                                    ?>
                                    <tr id="<?php echo $i;?>">
                                        <td class="idx"><?php echo $i;?></td>
                                        <td class="name">
                                            <a href="Blog/editCatalog?id=<?php echo $val->CATALOG_ID;?>" title="点击修改博客分类">
                                                <?php echo $val->NAME;?>
                                            </a>
                                        </td>
                                        <td class="num"><?php echo $val->BLOG_COUNT;?></td>
                                        <td class="opts">
                                            <a href="Blog/editCatalog?id=<?php echo $val->CATALOG_ID;?>" title="点击修改博客分类">修改</a>
                                            <a href="javascript:;" class="blogdel" id="<?php echo $val->CATALOG_ID;?>">删除</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody></table>
                    </form>
                </div>
                </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script>
    $('.SUBMIT').click(function(){
        var arr=[];
        $editname=$('input[name="name"]').val();
        $editorder=$('input[name="sort_order"]').val();
        arr.push($editname,$editorder);
        $.post('Blog/editCatalog',{'editarr':arr},function(data){
            $('input[name="name"]').html(arr[0]);
            $('input[name="sort_order"]').html(arr[1]);
        },'json');
    })

</script>
</body></html>