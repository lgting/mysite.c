<!DOCTYPE HTML>
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
    table#stuRecordTable{width:600px;margin:40px auto;text-align: center;}
    table#stuRecordTable tr{height:30px;}
</style>
<script type="text/javascript">
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

    function doOperator(){

        var updates =$(".update");
        var dels =$(".del");
        for (var i = 0; i < dels.length; i++) {
            dels[i].onclick =   function(){
                if(confirm("是否确定删除？")){  //提示是否删除
                    //var row = this.parentNode.parentNode; //取到tr对象
                    //row.parentNode.removeChild(row);  //移除tr
                    $("#stuRecordTable").deleteRow(this.parentNode.parentNode.rowIndex);
                }
            }
            updates[i].onclick = function(){
                var operatorCell = this.parentNode.parentNode.getElementsByTagName("td")[1]; //取到要操作的td对象
                //1.修改按钮上有两个功能：修改，确定修改
                if(this.value == "修改"){
                    this.value = "确定";
                    operatorCell.innerHTML ="<input value='"+operatorCell.innerHTML+"'/>";//把内容变成文本框
                    //做修改操作
                }else{
                    operatorCell.innerHTML =operatorCell.getElementsByTagName("input")[0].value;//把文本框变成内容
                    this.value = "修改";
                    //做确定修改
                }
            }
        }
    }
    function addRow(){
        var rs = $("#stuRecordTable").rows;  //table取到所有的行
        var insertR = $("#stuRecordTable").insertRow(rs.length-1); //给表格添加一行(不包单元格)
        //insertR.innerHTML = rs[1].innerHTML;    
        var c1 = insertR.insertCell(0);       
        c1.innerHTML = "yc" +Math.round(Math.random() * 101);
        var c2 = insertR.insertCell(1);
        c2.innerHTML = Math.round(Math.random() * 101);
        var c3 = insertR.insertCell(2);
        c3.innerHTML ='<input type="button" value="删除" class="del"/><input type="button" value="修改" class="update"/>';

        doOperator();

        var cs = rs[1].cells; //取到当前行的所有单元格
        //alert(cs[1].innerHTML);
    }
</script>
<title>分类设置</title>
</head>
  <body>
  <!-- 显示已有分类，及包含内容，并具有增加，删除分类功能， -->
  		<table id="stuRecordTable" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>分类id</th> 
            <th>名称</th>
            <th>操作</th>
        </tr>
        <tr>
            <td>1</td>
            <td>study</td>
            <td><input type="button" value="删除" class="del"/>
            <input type="button" value="修改" class="update"/></td>
        </tr>
        <tr>
            <td>2</td>
            <td>literature</td>
            <td><input type="button" value="删除" class="del"/>
            <input type="button" value="修改" class="update"/></td>
        </tr>
        <tr>
            <td colspan="3">
            <input type="button" value="添加" onclick="addRow()"/></td>
        </tr>
    </table>
  </body>
</html>
