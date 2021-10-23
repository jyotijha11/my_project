<html>
  <head> 
    <title>AJAX</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body> 
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="alert alert-danger" style="display:none">
        </div>

      <?php echo form_open('ajax-form-validate/post');?> 
        <div class="form-group">
          <label>Name:</label>
          <input type="text" name="name" class="form-control" placeholder="Name">
        </div>

        <div class="form-group">
          <strong>Email:</strong>
          <input type="text" name="email" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">
          <strong>Message:</strong>
          <textarea class="form-control" name="message" placeholder="Message"></textarea>
        </div>

        <div class="form-group">
          <button class="btn btn-primary btn-block btn-submit">Submit</button>
        </div>
      </form>
    </div>
    </div>
  </div>
   </body>


   <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-submit").click(function(e){
        e.preventDefault();
        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var message = $("textarea[name='message']").val();

        console.log($(this).closest('form').attr('action'));
          $.ajax({
              url: $(this).closest('form').attr('action'),
              type:$(this).closest('form').attr('method'),
              dataType: "json",
              data: {name:name, email:email, message:message},
              success: function(data) {
                  if($.isEmptyObject(data.error)){
                    $(".alert-danger").css('display','none');
                    alert(data.success);
                  }else{
                    $(".alert-danger").css('display','block');
                    $(".alert-danger").html(data.error);
                  }
              }
          });


      }); 


  });

   </script>


</html>