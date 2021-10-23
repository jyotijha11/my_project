<script >
$(document).ready(function(evt){
$("#sendmessage").click(function(evt){
	evt.preventDefault();
	    var valid;	
	    valid = validateContact();
	    if(valid) {
	        jQuery.ajax({
	            url: "email.php",
	            data:'demo-name='+$("#demo-name").val()+'&demo-email='+
	            $("#demo-email").val()+'&demo-message='+
	            $("#demo-message").val(),
	            type: "POST",
	            success:function(data){
	                $("#mail-status").html(data);
	            },
	            error:function (){}
	        });
	    }
	    
	});
});
</script>