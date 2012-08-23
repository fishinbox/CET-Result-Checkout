<?php
function get_testtype($tid) {
    if(strlen($tid) == 15){
        switch (substr($tid,9, 1)) {
            case "1": return "英语四级";
            case "2": return "英语六级";
            case "3": return "日语四级";
            case "4": return "日语六级";
            case "5": return "德语四级";
            case "6": return "德语六级";
            case "7": return "俄语四级";
            case "8": return "俄语六级";
            case "9": return "法语四级";
            default: return "";
        }
    }
    return "";
}
function showscore($score,$testid){
    $name = "";
    $school = "";
    if(strlen($score) > 1){
        $sarray =explode (',', $score);
        if (count($sarray) >= 8) {
            $name = $sarray[7];
            $school = $sarray[6];
        }
        else if(count($sarray) >= 4){
            $name = $sarray[3];
            $school = $sarray[2];
        }
    }
    $resulthtml = "<div id='score_result'><h1>2012年6月考试成绩查询结果：</h1><div id='score_inner'>";
	$resulthtml .= "<dl>";
	if(name != "") $resulthtml .= "<dt class='dtleft'>考生姓名：</dt><dd class='ddright'>".mb_convert_encoding($name,'utf-8','gbk')."</dd>";
	if(school != "") $resulthtml .= "<p><dt class='dtleft'>学校：</dt><dd class='ddright'>" .mb_convert_encoding($school,'utf-8','gbk') . "</dd>";
	$resulthtml .= "<p><dt class='dtleft'>考试类别：</dt><dd class='ddright'>";
	if(score != "") $resulthtml .= get_testtype($testid);
	$resulthtml .= "</dd><dt></dt><dd style='height:0px;overflow:hidden;clear:both;'></dd>";
	$resulthtml .= "<dt class='dtleft'>准考证号：</dt><dd class='ddright'>";
	if(score != "") $resulthtml .= $testid;
	$resulthtml .= "</dd></dl><ul>";
	if(score == "") {
	    $resulthtml .= "<li style='height:60px;'>无法找到对应的分数<br/><label style='font-weight:bold'>请确认你输入的准考证号及姓名无误</label></li>";
	}
	else if(strlen($score) == 1){
	    $err = parseInt($score);
	    switch(err)
	    {
	        case 1:
	        {
	            $resulthtml .= "<li style='height:60px;'>无法找到对应的分数<br/><label style='font-weight:bold'>无效的来源</label></li>";
	            break;
	        }
	        case 2:
	        {
	            $resulthtml .= "<li style='height:60px;'>无法找到对应的分数<br/><label style='font-weight:bold'>数据传输错误，请重新尝试</label></li>";
	            break;
	        }
	        case 3:
	        {
	            $resulthtml .= "<li style='height:60px;'>无法找到对应的分数<br/><label style='font-weight:bold;font-size:12px;'>请确认你已安装并启动了<a href='http://cet.99sushe.com/faq/index.html' target='_blank' style='text-decoration: underline; color: blue;'>查询加密锁(点击下载)</a></label></li>";
	            break;
	        }
	        case 4:
	        {
	            $resulthtml .= "<li style='height:60px;'>无法找到对应的分数<br/><label style='font-weight:bold'>请确认你输入的准考证号及姓名无误</label></li>";
	            break;
	        }
	        default:
	        {
	            $resulthtml .= "<li style='height:60px;'>无法找到对应的分数<br/><label style='font-weight:bold'>请确认你输入的准考证号及姓名无误</label></li>";
	            break;
	        }
	    }
	}
	else {
	    if (count($sarray) >= 8) {
	        $resulthtml .= "<li><div class='lileft'>您的成绩总分：</div><div class='liright' style='font-weight:bold;'>" . $sarray[5] . "</div></li>";
	        $resulthtml .= "<li><div class='lileft'>听力：</div><div class='liright'>" . $sarray[1] ."</div></li>";
	        $resulthtml .= "<li><div class='lileft'>阅读：</div><div class='liright'>" . $sarray[2] . "</div></li>";
	        $resulthtml .= "<li><div class='lileft'>综合：</div><div class='liright'>" . $sarray[3] . "</div></li>";
	        $resulthtml .= "<li><div class='lileft'>写作：</div><div class='liright'>" . $sarray[4] . "</div></li>";
	    }
	    else if (count($sarray)>= 4) {
	        $resulthtml .= "<li><div class='lileft'>您的成绩总分：</div><div class='liright' style='font-weight:bold;'>" . $sarray[1] . "</div></li>";
	    }
	    else {
	        $resulthtml .= "<li><div class='lileft'>您的口语等级为：</div><div class='liright' style='font-weight:bold;'>" . $sarray[1] . "</div></li>"; 
	    }
	}
	$resulthtml .= "</ul><div style='text-align:center;'>姓名中的生僻字可能无法正常显示,以成绩单为准</div></div>";
	$resulthtml .= "<p class='lang' style='margin-top:-10px;text-align:center;'><input id='btn' type='button' value='返回' onclick='history.back()' /></p>";
	$resulthtml .= "</div>";
    echo $resulthtml;
}
?>