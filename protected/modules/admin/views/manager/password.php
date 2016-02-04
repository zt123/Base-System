<form action="/admin/manager/mypass" method="post" class="form-horizontal well">
	<div class="control-group">
		<label class="control-label" for="input01">原密码:</label>
		<div class="controls">
			<input type="password" name='Passwd[old]' class="input-xlarge" id="input01">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="input02">新密码:</label>
		<div class="controls">
			<input type="password" name='Passwd[new]' class="input-xlarge" id="input02">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="input03">重复新密码:</label>
		<div class="controls">
			<input type="password" name='Passwd[repeat]' class="input-xlarge" id="input03">
		</div>
	</div>
	<div class="form-actions">
		<input name="submit" type="submit" class="btn" value="提交">
	</div>
</form>
<script>

// $(function(){
// 	$("input[name='oldpass']").blur(function(){
// 		validateResult = true;
// 		$(this).validate(['required','passwd']);
// 		if(validateResult)
// 			checkPass();
// 	});
// 	$("input[name='password']").blur(function(){
// 		$(this).validate(['required','passwd']);
// 	});
// 	$("input[name='repass']").blur(function(){
// 		$("input[name='password']").blur();
// 		$(this).validate(['required','passwd']);
// 		if(validateResult){
// 			var p = $("input[name='password']").val();
// 			var n = $(this).val();
// 			if(p != n){
// 				showAfterMsg(this,"两次密码不一致",false);
// 				validateResult =false;
// 			}
// 			else {
// 				showAfterMsg(this,"",true);
// 				validateResult =true;
// 			}
// 		}
// 	});
// 	$('form').submit(function(){
// 		validateResult = true;
// 		$("input[name='oldpass']").blur();
// 		$("input[name='password']").blur();
// 		$("input[name='repass']").blur();
// 		return validateResult;
// 	});
	
// });
// function checkPass(){
// 	validateResult =true;
// 	var pass = $("input[name='oldpass']").val();
// 	var id = $("input[name='manager_id']").val();
// 	$.ajax({
//       type: "post",
//       url: "/admin/manager/checkpass",
//       data: "manager_id="+id+"&pass="+pass,
//       async:false,
//       success: function(msg){
//         if( 1 == msg) {
        	 
//            showAfterMsg($("input[name='oldpass']"),"",true);
// 		   validateResult = true;
//         } else{
//            showAfterMsg($("input[name='oldpass']"),"密码错误",false);
//            validateResult = false;
//         }
//       }
//   });
// }
</script>