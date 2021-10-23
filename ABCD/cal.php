<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Form design using bootstrap
	</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
	<!-- First Row -->
	<div class="row">
	
		<div class="col-sm-6">
			<img width="100%" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg">
		</div>
		<div class="col-sm-6">
			<img width="100%" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg">
		</div>
	</div>

	<!-- Second row -->
	<div class="row">
		<div class="col-sm-6">
			<div class="result">Result will be shown here</div>
		 <?php 
			 if(isset($_POST["first_form"]))
	            {
	                $name = $_POST['name'];
	                $email = $_POST['email'];
	                $phone = $_POST['phone'];
	                $message = $_POST['message'];
	                echo "Name :- :".$name. "<br>";
	                echo "Email :- :".$email. "<br>";
	                echo "Phone :- :".$phone. "<br>";
	 				echo "Message :- :".$message. "<br>";
	            }  
         ?>
			<form method="post" action="">
				<div id="contact-form" class="form-container" data-form-container>
				<div class="row">
					<div class="form-title">
						<span>Contact Us</span>
					</div>
				</div>
			<div class="input-container">
				<div class="row">
					<span class="req-input" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Input Your First and Last Name."> </span>
						<input type="text" data-min-length="8" placeholder="Full Name" name="name" value="<?php if(isset($name)){ echo $name; } ?>">
					</span>
				</div>
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Your Email."> </span>
						<input type="email" placeholder="Email" name="email" value="<?php if(isset($email)){ echo $email; } ?>">
					</span>
				</div>
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Your Phone Number."> </span>
						<input type="tel" placeholder="Phone Number" name="phone"value="<?php if(isset($phone)){ echo $phone; } ?>">
					</span>
				</div>
				<div class="row">
					<span class="req-input message-box">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Include a Message."> </span>
						<textarea name="message" type="textarea" data-min-length="10" value="<?php if(isset($message)){ echo $message; } ?>" placeholder="Message"></textarea>
				</div>
				<div class="row submit-row">
					<button type="submit" name="first_form" class="btn btn-block submit-form">Submit</button>
				</div>
			</div>
			</div>
			</form>
		</div>
		
		<div class="col-sm-6">
			<div class="result">Result will be shown here</div>
			<?php 
			if(isset($_POST['submit']))
			{
				$testing = $_POST['testing'];
				$post = $_POST['post'];
				echo "Post Contents".$testing."<br>";
				echo "Valid contents".$post . "<br>";
			}
			?>
			<form method="post" action="">
			<div id="contact-form" class="form-container" data-form-container style="color: rgb(46, 125, 50); background: rgb(200, 230, 201);">
			<div class="row">
				<div class="form-title">
					<span> Create Post </span>
				</div>
			</div>
			<div class="input-container">
				<div class="row">
					<span class="req-input valid" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Input your post title."> </span>
						<input type="text" data-min-length="8" placeholder="Post Title" name="testing" value="<?php if(isset($testing)){ echo $testing ; } ?>" >
					</span>
				</div>
			
				<div class="row">
					<span class="req-input message-box valid">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Post Contents."> </span>
						<textarea type="textarea" data-min-length="10" name="post"  value="<?php if(isset($post )){ echo $post  ; } ?>" placeholder="Post Contents">Valid contents </textarea>
				</div>
				<div class="row submit-row">
					<button type="submit"  name="submit" class="btn btn-block submit-form valid">Submit</button>
				</div>
			</div>
			</div>
			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(function(){
  
    $('[data-toggle="tooltip"]').tooltip(); 
	
	$(".req-input input, .req-input textarea").on("click input", function(){
		validate($(this).closest("[data-form-container]"));
	});
    
	//This is for the on blur, if the form fields are all empty but the target was one of the fields do not reset to defaul state
	var currentlySelected;
	$(document).mousedown(function(e) {
        currentlySelected = $(e.target);
    });
	
	//Reset to form to the default state of the none of the fields were filled out
	$(".req-input input,  .req-input textarea").on("blur", function(e){
		var Parent = $(this).closest("[data-form-container]");
		//if the target that was clicked is inside this form then do nothing
		if(typeof currentlySelected != "undefined" && currentlySelected.parent().hasClass("req-input") && Parent.attr("id") == currentlySelected.closest(".form-container").attr("id"))
			return;
		
		var length = 0;
		Parent.find("input").each(function(){
			length += $(this).val().length;
		});
		Parent.find("textarea").each(function(){
			length += $(this).val().length;
		});
		if(length == 0){
			var container = $(this).closest(".form-container");
			resetForm(container);
		}
	});
	
	$(".create-account").on('click', function(){
		if($(".confirm-password").is(":visible")){
			$(this).text("Create an Account");
			$(this).closest("[data-form-container]").find(".submit-form").text("Login");
			$(".confirm-password").parent().slideUp(function(){
				validate($(this).closest("[data-form-container]"));
			});
		} else {
			$(this).closest("[data-form-container]").find(".submit-form").text("Create Account");
			$(this).text("Already Have an Account");
			$(".confirm-password").parent().slideDown(function(){
				validate($(this).closest("[data-form-container]"));
			});
		}
		
	});
	
	$("[data-toggle='tooltip']").on("mouseover", function(){
		console.log($(this).parent().attr("class"));
		if($(this).parent().hasClass("invalid")){
			$(".tooltip").addClass("tooltip-invalid").removeClass("tooltip-valid");
		} else if($(this).parent().hasClass("valid")){
			$(".tooltip").addClass("tooltip-valid").removeClass("tooltip-invalid");
		} else {
			$(".tooltip").removeClass("tooltip-invalid tooltip-valid");
		}
	});
	
})

function resetForm(target){
	var container = target;
	container.find(".valid, .invalid").removeClass("valid invalid")
	container.css("background", "");
	container.css("color", "");
}

function setRow(valid, Parent){
	var error = 0;
	if(valid){
		Parent.addClass("valid");
		Parent.removeClass("invalid");
	} else {
		error = 1;
		Parent.addClass("invalid");
		Parent.removeClass("valid");
	}
	return error;
}

function validate(target){
	var error = 0;
	target.find(".req-input input, .req-input textarea, .req-input select").each(function(){
		var type = $(this).attr("type");
		
		if($(this).parent().hasClass("confirm-password") && type == "password"){
			var type = "confirm-password"; 
		}
		
		var Parent = $(this).parent();
		var val = $(this).val();
		
		if($(this).is(":visible") == false)
			return true; //skip iteration
		
		switch(type) {
			case "confirm-password":
				var initialPassword = $(".input-password input").val();
				error += setRow(initialPassword  == val && initialPassword.length > 0, Parent);
				break;
			case "password":
			case "textarea":
			case "text":
				var minLength = $(this).data("min-length");
				if(typeof minLength == "undefined")
					minLength = 0;
				error += setRow(val.length >= minLength, Parent);
				break; 
			case "email":
				error += setRow(validateEmail(val), Parent);
				break;
			case "tel":
				error += setRow(phonenumber(val), Parent);
				break;			
		}	
	});
	
	var submitForm = target.find(".submit-form");
	var formContainer = target;
	var formTitle = target.find(".form-title");
	if(error == 0){
		formContainer.css("background", "#C8E6C9");
		formContainer.css("color", "#2E7D32");
		submitForm.addClass("valid");
		submitForm.removeClass("invalid");
        return true;
	} else {		
		formContainer.css("background", "#FFCDD2");
		formContainer.css("color", "#C62828");
		submitForm.addClass("invalid");
		submitForm.removeClass("valid");
        return false;
	}
}
function phonenumber(inputtxt) {  
	if(typeof inputtxt == "undefined")
		return;
	var phoneno = /^\d{10}$/;  
	if((inputtxt.match(phoneno))) {  
		return true;  
	}  
	else {  
		return false;  
	}  
}  

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
</script>
</body>
</html>