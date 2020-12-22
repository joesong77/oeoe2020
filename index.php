
<html>

<head>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/style.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    

</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="login-reg-panel"style=" background:#14274E;">>
		<div class="login-info-box">

			<p>Ready to save ANYone</p>
			<label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>
							
	
		<form method="Post" action="member.php">					
		<div class="white-panel">
			<div class="login-show">
				<h2>登入</h2>
				<input type="text" placeholder="帳號" name="account">
				<input type="password" placeholder="密碼" name="password">
				<input type="submit" name="login"  value="登入">
		
			
			</div>
			<div style="float:left;">
			<img src="img/logo.png" style="width:35%">
             </div>

			
        </from>    
			
		</div>
	</div>
</body> 
<script>
$(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
  
});
</script>

    
</html> 