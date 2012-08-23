<?
require('simple_html_dom.php');
if(isset($_POST['zkzh']))
{
  $src='http://www.chsi.com.cn/cet/query';
  $id=$_POST['zkzh'];
  $name=$_POST['xm'];
  $ch=curl_init();
  curl_setopt_array(
      $ch,
      array(
        CURLOPT_URL => $src.'?zkzh='.$id.'&xm='.$name,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => false,
        CURLOPT_REFERER=> 'http://www.chsi.com.cn/cet/'
      )
    );
    $content=curl_exec($ch);
  if(curl_errno($ch)==0){
    $html = new simple_html_dom();
    $html->load($content);
    $table=$html->find('table[class=cetTable]',0);
    $text=$table->outertext;
    $html->clear();
    $table->clear();
    echo $text;
    echo '<br />';
    echo "<p class='lang' style='margin-top:-10px;text-align:center;'><input id='btn' type='button' value='返回' onclick='history.back()' /></p>";
  }
  else
  {
  echo curl_error ($ch);
  }
}
else
{
?>

<form method="post" name="form1" id="form1" action="chsi.php">
  <table border="0" align="center" cellpadding="0" cellspacing="5" style="margin:0 auto; line-height:25px;">
    <tr>
      <td align="right">准考证号：</td>
      <td align="left"><input name="zkzh" value="" id="zkzh" type="text" size="18" maxlength="15" /></td>
      <td align="left" style="color:#666;">请输入15位准考证号</td>
    </tr>
    <tr>
      <td align="right">姓名：</td>
      <td align="left"><input name="xm" value="" id="xm" type="text" size="18" maxlength="50"/></td>
      <td align="left" style="color:#666;">姓名超过3个字，可只输入前3个</td>
    </tr>
    
    <tr>
      <td colspan="3" align="center"><input type="submit" value="查询" /></td>
    </tr>
  </table>
</form>
<?
}
?>