<?php
require('functions.php');
if(isset($_POST['id']))
{
  header('Content-Type: text/html;charset=utf-8');
  $src='http://cet.99sushe.com/s';
  $id=$_POST['id'];
  $name=$_POST['name'];
  $ch=curl_init();
  curl_setopt_array(
      $ch,
      array(
        CURLOPT_URL => $src,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => 'id='.$id.'&name='.mb_convert_encoding($name,'gbk','utf-8'),
        CURLOPT_REFERER=> 'http://cet.99sushe.com/'
      )
    );
    $content=curl_exec($ch);
  if(curl_errno($ch)==0){
    showscore($content,$id);
  }
  else
  {
  echo curl_error ($ch);
  }
}
else
{
?>
<form name='query' action="99sushe.php" method="post">
  <table style='margin:0 auto; line-height:25px;'>
    <tr>
      <td>准考证号:</td>
      <td><input name='id' type='text' /></td>
      <td>请输入15位准考证号</td>
    </tr>
    <tr>
    <td>姓名:</td>
    <td><input name='name' type='text' /></td>
    <td>请输入姓名前两字</td>
    </tr>
    <tr>
      <td colspan='3' align='center'><input type='submit' value='查询' /></td>
    </tr>
  </table>
</form>
<?php
}
?>