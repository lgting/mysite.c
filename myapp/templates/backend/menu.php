a<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="keywords" content="皈依山人">
    <meta name="description" content="皈依山人的网站后台管理系统。">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
  <style type="text/css">
    *{
    padding:0px;
    margn:0px;
    }
    table#stuRecordTable{width:95%;margin:0 auto;text-align: center;}
    table#stuRecordTable tr{height:35px;}
</style>
<script type="text/javascript"><!--
    function $(eleStr){
        switch(eleStr.substr(0,1)){
        case "#":
            return document.getElementById(eleStr.substr(1));
            break;
        case ".":
            return document.getElementsByClassName(eleStr.substr(1));
            break;
        case "_":
            return document.getElementsByName(eleStr.substr(1));
            break;
        default:
            return document.getElementsByTagName(eleStr);
        break;
        }
    }

    onload = function(){

        doOperator();       
    }
     function myrefresh()
                    {
                       window.location.reload();
                    }

    function doOperator(){

        var updates =$(".update");
        var dels =$(".del");
        var cancels=$(".cancel");
        /*ajax*/
        var xmlhttp;
         if(window.XMLHttpRequest)
                    {
                        xmlhttp = new XMLHttpRequest();
                    } else{
                        //code for IE5 IE6
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
        var confirm_adds = $(".confirm_add");
        for (var i = 0; i < dels.length; i++) {
            dels[i].onclick =   function(){
                if(confirm("是否确定删除？")){  //提示是否删除
                    //var row = this.parentNode.parentNode; //取到tr对象
                    //row.parentNode.removeChild(row);  //移除tr
                    var menuid = this.parentNode.parentNode.getElementsByTagName('input')[0].value;
                    //创建xmlhttp request对象;
                   
                      // IE浏览器
                  /* if(ActiveXObject){
                         // 微软目前AJAX最新版本
                        var xmlhttp = new ActiveXObject("Msxm12.XMLHTTP.6.0"); 
                    }else{
                        // 主流浏览器
                        var xmlhttp = new XMLHttpRequest();
                     }*/
                    
                    xmlhttp.onreadystatechange=function()
                    {
                        if(xmlhttp.readyState == 4)
                        {
                            //请求成功后做的事情
                               /*输入的文本填到表格中*/
                               //还要手动强制类型转换才能正确判断一下我也醉了
                               if(  xmlhttp.status == 200 )
                               {
                            	   if( Boolean(xmlhttp.responseText) == false ){
                                       alert('删除失败了，爸爸 '+typeof(xmlhttp.responseText));
                                      }else{
                                       alert("删除成功了，爸爸"+xmlhttp.responseText);
                                      }
                                      myrefresh();//刷新和自动删除 那个好呢，刷新可以排序
                                }else{
										alert("一般是500错误哦，检查附加表，先删除附加表中的数据");
                                }
                              
                        }
                    }
                    /*当多个变量考虑用json 或xml 格式化传输数据*/
                    /*还有就是发生错误是的回应也因该定义好*/
                    xmlhttp.open("POST",'del_menu',true);
                    xmlhttp.setRequestHeader("cache-control","no-cache");
                    xmlhttp.setRequestHeader("contentType","text/html;charset=uft-8") ;//指定发送的编码
                    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
                    info = "menuid="+menuid;

                    xmlhttp.send(  info );

						window.location.reload();
//                    $("#stuRecordTable").deleteRow(this.parentNode.parentNode.rowIndex);
                }
            }
            updates[i].onclick = function(){
                var operatorCell = this.parentNode.parentNode.getElementsByTagName("td"); //取到要操作的td对象
                //1.修改按钮上有两个功能：修改，确定修改
                if(this.value == "修改"){
                    this.value = "确定";
                    for(var i=0;i<operatorCell.length-1;i++)
                    {
                    operatorCell[i].innerHTML ="<input value='"+operatorCell[i].innerHTML+"'/>";//把内容变成文本框
                    }
                    //做修改操作2
                }else{
                    var data = new Array();
                     for(var i=0;i<operatorCell.length-1;i++)
                    {
                        if(i=== 0){
                    data['menuid'] = this.parentNode.parentNode.getElementsByTagName('input')[0].value;
                        }
                    data[i] =operatorCell[i].getElementsByTagName("input")[0].value;
                    }
                    this.value = "修改";
                    //做确定修改

                    xmlhttp.onreadystatechange=function()
                    {
                        if(xmlhttp.readyState == 4 )
                        {
                            //请求成功后做的事情
                               /*输入的文本填到表格中*/
                               //还要手动强制类型转换才能正确判断一下我也醉了
                               if(xmlhttp.status == 200){
                                alert("修改成功了，爸爸"+xmlhttp.responseText);
                                myrefresh();
                                
                               }else{
                                alert('修改失败了，爸爸 '+xmlhttp.responseText);
                                myrefresh();
                               }
                        }
                    }
                    /*当多个变量考虑用json 或xml 格式化传输数据*/
                    /*还有就是发生错误是的回应也因该定义好*/
                    xmlhttp.open("POST",'update_menu',true);
                    xmlhttp.setRequestHeader("cache-control","no-cache");
                    xmlhttp.setRequestHeader("contentType","text/html;charset=uft-8") ;//指定发送的编码
                    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
                    info = "menuid="+data['menuid']+"&name="+data[0]+"&template_name="+data[1]+"&intro="+data[2]+"&order_id="+data[3];

                    xmlhttp.send(  info );
                }
            }
        }   
        for(var i = 0;i<confirm_adds.length;i++){
            confirm_adds[i].onclick = function(){
                if(confirm("确认添加吗？"))
                {
                    //ajax发送表单中的数据
                    //如果成功
                //按钮表为删除 修改
                    //首先采集数据这边要ajax传送
                    var data = new Array();
                    //得到td节点
                    var operatorCell = this.parentNode.parentNode.getElementsByTagName("td");
                    for(var i=0;i<operatorCell.length-1;i++)
                    {
                     if(i==2){
                        //第三个标签是textarea另外处理
                            data[i] = operatorCell[i].getElementsByTagName("textarea")[0].value;;//把内容变成文本框

                        }else{

                            data[i] = operatorCell[i].getElementsByTagName("input")[0].value;;//把内容变成文本框
                        }   
                    }
                  
                      // IE浏览器
                  /* if(ActiveXObject){
                         // 微软目前AJAX最新版本
                        var xmlhttp = new ActiveXObject("Msxm12.XMLHTTP.6.0"); 
                    }else{
                        // 主流浏览器
                        var xmlhttp = new XMLHttpRequest();
                     }*/
                    
                    xmlhttp.onreadystatechange=function()
                    {
                        if(xmlhttp.readyState == 4 )
                        {
                            //请求成功后做的事情
                               /*输入的文本填到表格中*/
                               //还要手动强制类型转换才能正确判断一下我也醉了
                               if(xmlhttp.status == 200){
                                     if( Boolean(xmlhttp.responseText) == false ){
                                    alert('添加失败了，爸爸 '+typeof(xmlhttp.responseText));
                                   }else{
                                    alert("添加成功了，爸爸"+xmlhttp.responseText);
                                   }
                                   myrefresh();
                                 for(var i=0;i<operatorCell.length-1;i++)
                                    {
                                        if(i==2){
                                        //第三个标签是textarea另外处理
                                            operatorCell[i].innerHTML = operatorCell[i].getElementsByTagName("textarea")[0].value;;//把内容变成文本框
                                        }else{

                                            operatorCell[i].innerHTML = operatorCell[i].getElementsByTagName("input")[0].value;;//把内容变成文本框
                                        }
                                    }
                               }else{
                                alert('添加失败了，失败了，爸爸 一般是500错误'+typeof(xmlhttp.responseText));
                                myrefresh();
                               }
                              
                        }

                    }
                    /*当多个变量考虑用json 或xml 格式化传输数据*/
                    /*还有就是发生错误是的回应也因该定义好*/
                    xmlhttp.open("POST",'add_menu',true);
                    xmlhttp.setRequestHeader("cache-control","no-cache");
                    xmlhttp.setRequestHeader("contentType","text/html;charset=uft-8") ;//指定发送的编码
                    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
                    info = "name="+data[0]+"&template_name="+data[1]+"&intro="+data[2]+"&order_id="+data[3];

                    xmlhttp.send(  info );
                }else{
                    //删除刚才输入框
                    $("#stuRecordTable").deleteRow(this.parentNode.parentNode.rowIndex);
                }
                this.parentNode.innerHTML = '<input type="button" value="删除" class="del"/><input type="button" value="修改" class="update"/>';
                doOperator();       

            }         
        }
         for (var i = 0; i < cancels.length; i++) {
            cancels[i].onclick =   function(){
                if(confirm("确定不填加了吗，爸爸？")){  //提示是否删除
                    //var row = this.parentNode.parentNode; //取到tr对象
                    //row.parentNode.removeChild(row);  //移除tr
                    $("#stuRecordTable").deleteRow(this.parentNode.parentNode.rowIndex);
                }
            }
        }
    }
    function addRow(){
        var rs = $("#stuRecordTable").rows;  //table取到所有的行
        var insertR = $("#stuRecordTable").insertRow(rs.length-1); //给表格添加一行(不包单元格)
        //insertR.innerHTML = rs[1].innerHTML;    
        var c1 = insertR.insertCell(0);       
        c1.innerHTML = "<input type='text' name='栏目名' value=''>"
        var c2 = insertR.insertCell(1);
        c2.innerHTML = "<input type='text' name='tempateName' value=''>";
        var c3 = insertR.insertCell(2);
        c3.innerHTML = "<textarea rows='2' cols='25' name='intro' value=''></textarea>";
        var c4 = insertR.insertCell(3);
        c4.innerHTML = "<input type='text' name='sortId' value=''>";
        var c5 = insertR.insertCell(4);
        c5.innerHTML ='<input type="button" value="取消" class="cancel"/><input type="button" value="确认" class="confirm_add"/>';

        doOperator();

        var cs = rs[1].cells; //取到当前行的所有单元格
        //alert(cs[1].innerHTML);
    }
--></script>
<title>菜单增加</title>
</head>
  <body>
  <!-- 显示已有分类，及包含内容，并具有增加，删除分类功能， -->
        <table id="stuRecordTable" border="1" cellpadding="0" cellspacing="0">
        <tr><th  colspan="5">栏目表</th></tr>
        <tr>
            <input type="hidden" name="menuid" value="">
            <th>栏目名</th> 
            <th>template name</th>
            <th>intro</th>
            <th>排序id(从小到大,不可相等)</th>
            <th>操作</th>
        </tr>
      <!--   <tr>     循环输出模板
            <td>最近更新</td>
            <td>index</td>
            <td>各分类的最近更新文章</td>
            <td>0</td>
            <td><input type="button" value="删除" class="del"/>
            <input type="button" value="修改" class="update"/></td>
        </tr> -->
        <?php 
            $res='';
            foreach($query as $val){
                foreach($val as $k=>$cell){
                    if($k=='idmenu'){$res .='<tr><input type="hidden" name="menuid" value="'.$cell.'">';continue;}
                    $res .= '<td>'.$cell.'</td>';
                }
                $res = $res.'<td><input type="button" value="删除" class="del"/>
            <input type="button" value="修改" class="update"/></td></tr>';
            /*echo ' <tr>  
            <td>'.$val[0].'</td>
            <td>'.$val[1].'</td>
            <td>'.$val[2].'</td>
            <td>'.$val[3].'</td>
            <td><input type="button" value="删除" class="del"/>
            <input type="button" value="修改" class="update"/></td>';*/
            }
            echo $res;
         ?>
        <tr>
            <td colspan="5">
            <input type="button" value="添加" onclick="addRow()"/>&nbsp;&nbsp;<input type="button" value="刷新" onclick="myrefresh()"/></td>
        </tr>
    </table>
  </body>
</html>
