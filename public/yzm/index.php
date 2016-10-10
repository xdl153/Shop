<!DOCTYPE html>
<html>
<head>
<script src="./jquery-1.8.3.min.js"></script>
<body>
	<form method="POST" action="./pd.php">
		<input type="text" id="sj">
		<input type="button" id="btn" value="获取验证码" onclick="settime(this);yzm();" /><br><br>
		<input type="text" name="code"><input type="submit" value="判断">
	</form>
</body>
<script type="text/javascript"> 
var countdown=60; 
function settime(obj) {
    if (countdown == 0) { 
        obj.removeAttribute("disabled");    
        obj.value="获取验证码"; 
        countdown = 60;
		return;
    } else { 
        obj.setAttribute("disabled", true); 
        obj.value="重新发送(" + countdown + ")"; 
        countdown--; 
    } 
	setTimeout(function(){
		settime(obj)
	},1000)
}
function yzm(){
	var sj=$("#sj").val();
	$.ajax({
		url:'./yzm.php',
		type:'post',
		async:true,
		data:{id:sj},
		dataType:'json',
		success:function(data){
			if(data>0){
				alert('发送成功!');
			}
		},
		error:function(){
			alert('失败');
		}
	})
}
</script>
</html>