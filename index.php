<?php
	if(!isset($_SESSTION['sessioned']))
	{
		session_start();
		$_SESSION['sessioned']=true;
	}
?>
<button onclick="location='/99sushe.php'">我想通过99宿舍查询</button>
<br />
<button onclick="location='/chsi.php'">我想通过学信网查询</button>
<p>欲求源代码，<a href='https://github.com/fishinbox/CET-Result-Checkout'>请见【本项目GitHub版本链接】</a></p>