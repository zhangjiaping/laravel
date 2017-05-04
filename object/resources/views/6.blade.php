<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset='utf-8'>
		<meta name='csrf-token' content="{{ csrf_token() }}">
		<style type="text/css">
			
		</style>
	</head>
	<body>
		<form action='demo.php' method='post'>
			<select id='cid' name='city1[]'>
				<option>--请选择--</option>
			</select>
			<input type='submit'>
		</form>
	</body>
	<script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
	<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url:'/ajaxdemo/get',
			type:'get',
			async:true,
			data:{upid:0},
			dataType:'json',
			success:function(data)
			{
				// console.log(data);
				//遍历从数据库查出来的数据，生成option选项追加到select里
				for (var i = 0; i < data.length; i++) {
					$('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
				};
			},
			error:function()
			{
				alert('ajax请求失败');
			}
		});

		//给所有的select标签绑定change事件
		$('select').live("change",function(){
			//干掉当前你选择的select标签后面的select标签
			$(this).nextAll('select').remove();
			//判断你选择是不是--请选择--
			if($(this).val() != '--请选择--'){
				//因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
				var ob = $(this);
				$.ajax({
					url:'/ajaxdemo/post',
					type:'post',
					async:true,
					data:{upid:$(this).val()},
					dataType:'json',
					success:function(data)
					{
						// console.log(data);
						//判断是不是最后一级城市，最后一级城市查数据库length==0
						if(data.length>0){
							//生成一个新的select标签
							var select = $("<select name='city1[]'><option>--请选择--</option></select>");
							//遍历从数据库查出来的数据，生成option选项追加到select里
							for (var i = 0; i < data.length; i++) {
								$(select).append("<option value="+data[i].id+">"+data[i].name+"</option>");
							};
							//外部插入到前一个select后面
							ob.after(select);
						}
					},
					error:function()
					{
						alert('ajax请求失败');
					}
				});
			}
		});
		
	</script>
</html>	