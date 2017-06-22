<!DOCTYPE html>
<html>
<head>
    <title>总分类</title>
    <meta charset="utf-8">
    <!--[if lt IE9]> 
<script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
<![endif]-->
<style type="text/css">
/*html5*/
article,aside,dialog,footer,header,section,footer,nav,figure,menu{display:block}
    *{border:0px;padding:0px;margin:0px;}
    header{text-align:center; font-size:30px;}
    footer{text-align:center;}
    div{height:30px;}
    div span{ width:33.3333%; line-height:30px;display: inline-block;text-align:center;vertical-align: middle}
    button{width:40px;height:20px;}
    button:hover{cursor:pointer}
</style>
<script type="text/javascript"><!--
        /*ajax*/
    var xmlhttp
    if(window.XMLHttpRequest)
	{
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

    function $(eleStr)
    {
        switch(eleStr.substr(0,1))
        {
            case '#':
                return document.getElementById(eleStr.substr(1));
                break;
            case ".":
                return document.getElementsByClassName(eleStr.substr(1));
                break;
            case "_" :
                return document.getElementByName(eleStr.substr(1));
                break;
            default:
                return document.getElementsByTagName(eleStr);
        }

    }
    window.onload = function(){      
        operate();
       }
    function operate(){
        //改变颜色
        var row = $('.row');
        for(var i =0;i<row.length;i++)
        {
            row[i].style.backgroundColor = '#' + Math.round(Math.random()*1000000);
        }

        var del = $('.del');
        for(var i = 0;i<del.length;i++)
        {
			//传要删除的id，删除成功则刷新页面
            del[i].onclick = function(){
                xmlhttp.onreadystatechange = function(){
                    	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    	{
                        	alert(xmlhttp.responseText);
                        	window.location.reload();
                        	
                        }
                    }
                span = this.parentNode.parentNode.getElementsByTagName("span");
                data = "categoryid="+span[0].innerHTML;
                xmlhttp.open("post","/index.php/backend/index/category/del",true);
                
                xmlhttp.setRequestHeader("cache-control","no-cache");
                xmlhttp.setRequestHeader("contentType","text/html;charset=uft-8") ;//指定发送的编码
                xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
                xmlhttp.send(data);
                //this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
            }
        }
        var update = $('.update');
        for(var i = 0;i<update.length;i++)
        {
            update[i].onclick = function(){
                var a = this.parentNode.parentNode.getElementsByTagName('span');                
                for (var i = 0; i < a.length; i++) {
                    if(i == 1)
                    {
                        a[i].innerHTML = "<input type='text' name='update' value='"+a[i].innerHTML+"'>";
                    }
                    if(i == 2)
                    {
                        a[i].innerHTML = '<button class = "confirm">确定</button>';
                    }
                    var confirm = $('.confirm');
                    for(var j = 0;j<confirm.length;j++)
                    {
                        confirm[j].onclick = function()
                        {
                            var a = this.parentNode.parentNode.getElementsByTagName('span');

                            var data = "categoryid="+a[0].innerHTML+"&name="+a[1].getElementsByTagName('input')[0].value;
                         
                                 /* ajax */
                           xmlhttp.onreadystatechange = function(){
                               if(xmlhttp.readyState==4 && xmlhttp.status == 200)
                               {
                                   alert(xmlhttp.responseText);
//                                   for (var i = 0; i < a.length; i++) {
//                                       
//                                       if(i == 1)
//                                       {
//                                          
//                                           a[i].innerHTML = "input.value";
//                                       }
//                                       if(i == 2)
//                                       {
//                                           a[i].innerHTML = '<button type="button" class="del">删除</button>&nbsp;&nbsp;<button type="button" class="update">修改</button>';
//                                       }
//                                   }
                                   window.location.reload();
                               }
                           }
                         
                           xmlhttp.open("post","/index.php/backend/index/category/update",true);
                           
                           xmlhttp.setRequestHeader("cache-control","no-cache");
                           xmlhttp.setRequestHeader("contentType","text/html;charset=uft-8") ;//指定发送的编码
                           xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
                           xmlhttp.send(data);                          
                        }
                    }
                }
            }
        }
    
        var confirms = $('.confirm');
        for(var i = 0;i<confirms.length;i++)
        {
            confirms[i].onclick =function()
            {
                /*格式化添加的数据*/
                span = this.parentNode.parentNode.getElementsByTagName("span");
                data1 = "id="+span[0].innerHTML+"&categoryName="+span[1].getElementsByTagName('input')[0].value;
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState==4&&xmlhttp.status == 200)
                    {
                         alert('ajax传值成功'+xmlhttp.responseText); 
                         window.location.reload();  
                    }
                }
               xmlhttp.open("POST","/index.php/backend/index/category/add",true);
               xmlhttp.setRequestHeader("cache-control","no-cache");
               xmlhttp.setRequestHeader("contentType","text/html;charset=uft-8") ;//指定发送的编码
               xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
               xmlhttp.send( data1 );
                /*ajax传值，成功的话把值写入元素中*/
                
            }
        }
        var cancel = $('.cancel');
        for(var i = 0;i<cancel.length;i++)
        {
            cancel[i].onclick = function()
            {
                this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
            }
        }
        
    }
    function addRow()
        {
            var createEle = document.createElement('div');
            createEle.className = 'row';
            a = document.getElementsByTagName('section')[0];
            a.appendChild(createEle);
            a.lastChild.innerHTML = '<span></span><span><input type="text" placeholder="请输入分类名称" name=""></span><span><bu'+
                'tton type="button" class ="cancel" >取消</button>&nbsp;&nbsp;<button class = "confirm">确定</button></span>';
           operate();
        }
       


    --></script>
</head>
<body>
<?php var_dump($query);?>
<header>总分类一览表</header>
<section>
    <div class='row'><span>分类id</span><span>分类名称</span><span>操作</span></div>
    <?php foreach($query as $v): ?>

        <div class='row'><span><?=$v->idcategory;?></span><span><?=$v->name;?></span><span><button type='button' class='del'>删除</button>&nbsp;&nbsp;<button type="button" class='update'>修改</button></span></div>

    <?php endforeach;?>

          
</section>
          
<footer><button type="button" onclick ="addRow()">添加</button></footer>
</body>
</html>