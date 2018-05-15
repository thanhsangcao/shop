
<div id="login" class="col-md-4 col-sm-12 col-xs-12">
	<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đăng nhập</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
  
    <div class="form-login">
    	<h2 class="title">Đăng nhập thành viên</h2>
		<label for="uname"><b>Email</b></label>
		<input type="email" placeholder="Enter Username" name="uname" required>

		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" required>
		<label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      	</label>
		<button type="submit">Login</button>
		<button type="button"  id="dk">Đăng ký thành viên</button>
    </div>

    <div class="form-login" >
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
  
    <div class="form-login">
    	<h2 class="title">Đăng ký thành viên</h2>
		<label for="uname"><b>Email</b></label>
		<input type="email" placeholder="Enter Username" name="uname" required>

		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" id="pass" required>
		<label for="psw"><b>Confirm Password</b></label>
		<input type="password" placeholder="Enter Password" id="confirm_pass" required>
		<span id='message'></span>
		<button type="submit" id="signup" >Xác nhận</button>
		<label>
    </div>

    <div class="form-login" >
		<button type="button"  id="back" class="cancelbtn">Quay lại</button>
		<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

	var signup = document.getElementById('id02');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == signup) {
	        modal.style.display = "none";
	    }
	}

	$(document).ready(function(){
		$("#dk").on("click",function(){
		$("#id02").show();
		$("#id01").hide();
		});
		
		$("#back").on("click",function(){
		$("#id02").hide();
		$("#id01").show();
		});

		$('#pass, #confirm_pass').on('keyup', function () {
		  if ($('#pass').val() == $('#confirm_pass').val()) {
		  	
		    $('#message').html('Matching').css('color', 'green');
		  } else 
		    $('#message').html('Not Matching').css('color', 'red');
		});
	});

</script>
</div>