<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>menu_category</title>
<style>
  table,th,td,tr{border:2px solid black;font-size:20px}
  table{width:100%;text-align:center;}
  tr{height:40px;}
  td{ width:33%;}
  table{ 
table-layout:fixed; 
empty-cells:show; 
border-collapse: collapse; 
margin:0 auto; 
} 
td{ 
height:30px; 
} 
h1,h2,h3{ 
font-size:12px; 
margin:0; 
padding:0; 
} 
.table{ 
border:1px solid #cad9ea; 
color:#666; 
} 
.table th { 
background-repeat:repeat-x; 
height:30px; 
} 
.table td,.table th{ 
border:1px solid #cad9ea; 
padding:0 1em 0; 
} 
.table tr.alter{ 
background-color:#f5fafe; 
} 
    select{
               width                    : 14em;
               height                   : 3.2em;
               padding                  : 0.2em 0.4em 0.2em 0.4em;
               vertical-align           : middle;
               border                   : 1px solid #e9e9e9;
               -moz-border-radius       : 0.2em;
               -webkit-border-radius    : 0.2em;
               border-radius            : 0.2em;
               box-shadow               : inset 0 0 3px #a0a0a0;
               -webkit-appearance       : none;
               -moz-appearance          : none;
               appearance               : none;
               /* sample image from the webinfocentral.com */
             /*  background               : url(http://webinfocentral.com/Images/favicon.ico) 95% / 10% no-repeat #fdfdfd;*/
               font-family              : Arial,  Calibri, Tahoma, Verdana;
               font-size                : 1.1em;
               color                    : #000099;
               cursor                   : pointer;
            }
            select  option
            {
                font-size               : 1em;
                padding                 : 0.2em 0.4em 0.2em 0.4em;
            }
            select option[selected]{ font-weight:bold}
            select option:nth-child(even) { background-color:#f5f5f5; }
            select:hover
            {
                color                   : #101010;
                border                  : 1px solid #cdcdcd;
            }    
            select:focus {box-shadow: 0 0 2px 1px #404040;}
            .button{cursor:pointer}
</style>
<script>
	var xmlhttp
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest;
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	window.onload = function(){
		var button = document.getElementsByClassName('button');
			for(var i =0;i<button.length;i++)
			{
				button[i].onclick = function(){
					
						alert('delete');
					}
			}
		//在添加时首先验证表单
		add = document.getElementById('add');
			add.onclick = function(){
					var select = this.parentNode.parentNode.getElementsByTagName("td");
					if(!select[0].getElementsByTagName('select')[0].value){
							alert('爸爸，请选择菜单');					
					}else if (!select[1].getElementsByTagName('select')[0].value){
						alert('爸爸，请选择分类');					
					}else{
						//这里ajax
						
					    xmlhttp.onreadystatechange = function(){
	                    	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	                    	{
	                        	alert(xmlhttp.responseText);
	                        	window.location.reload();
	                        	
	                        }
	                    }
		             	var data = "menuid="+ select[0].getElementsByTagName('select')[0].value+"&categoryid="+select[1].getElementsByTagName('select')[0].value;
		                xmlhttp.open("post","/index.php/backend/index/menu_category/add",true);    
		                xmlhttp.setRequestHeader("cache-control","no-cache");
		                xmlhttp.setRequestHeader("contentType","text/html;charset=uft-8") ;//指定发送的编码
		                xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
		                xmlhttp.send(data);
					}
				
				}
		}
			
	
</script>
</head>
<body>
<?php
echo '<pre>';
var_dump($menu_category);
echo "</pre></br><br>";
var_dump($category);
?>
  <table>
  			<!-- 要把数据格式化成 menu  --categoty    父子级的二为数组   -->
                <caption>菜单分类表</caption>
		<tr><th>menu_name</th> <th>catetory</th> <th>operate</th></tr>
		
		 
		 <?php 
		 		if(is_array($menu_category))
		 		{
		 		foreach($menu_category as $k=>$v)
				{
					foreach($v as $k1=>$v1){
						if( $k1 == 0 ){
							$count = count($v);
							echo <<<EOT
<tr><td rowspan="$count">$k</td> <td>$v1</td> <td><input type="button" value="删除" class="button" id="del">
<input type="hidden" value="菜单分类条目id"></td> </tr
EOT;
						}else{
									echo <<<STR
									<tr><td style="display:none;">$k</td> <td>$v1</td> <td><input type="button" value="删除" class="button" id="del"></td> </tr>
STR;
						}
					}
		 		}
				
	
					
				}
		 ?>
		 
		
		<tr>
		  <td>
			  <select id="select">
			  		  <option disable selected value>请选择菜单</option>
			  		  <?php 
			  		  	foreach($menu as $v){
			  		  		echo '<option value ="'.$v->idmenu.'">'.$v->name.'</option>';
			  		  	}
			  		  ?>
			  </select>
		  </td>
		  <td>
			  <select class="select">
			  		  <option disable selected value>请选择分类</option>
					  <?php 
			  		  	foreach($category as $v){
			  		  		echo '<option value ="'.$v->idcategory.'">'.$v->name.'</option>';
			  		  	}
			  		  ?>
			  </select>
		  </td>
		  <td><input type="button" value="增加分类" class="button" id="add"></td>
                </tr>
	</table>

</body>
</html>
