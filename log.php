<?php
header('content-type:text/html;charset=utf-8');
$log=fopen('../logs/access.log','r');
while ($row = fgets($log)) {
@$row = explode(' ',$row);
@$n = $row[8]?$row[8]:0;
if($n == 200){
echo "IP--".$row[0]."---状态值 : <font color='green'>".$n."</font>----时间： ".$row[3]."<br>";
}else{
@$a = explode('/',$row[6]);
@$b = substr($row[6],-3);
@$c = substr($row[6],-4);
if($a[0] == '' && $a[1] == 'appxm'&&$b != '.js'&&$c!='.css'&&$c!='.jpg'&&$c!='.gif'&&$c!='jpeg'){
echo "<font color='red'>IP: ".$row[0]."--时间： ".$row[3]."--请求方式： ".$row[5]."  --请求地址：".$row[6]."--状态值 ： ".$row[8]."</font><br>";
}else{
echo $row[0]."----时间： ".$row[3]."----状态值 ： ".$n."<br>"."  --请求地址：".$row[6];
}
}
}
