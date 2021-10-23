<!DOCTYPE html>
<html lang="en">
<head>
  <title>  Login - Dashboard </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
html,body{
background-image: url('https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569__480.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 125%;
font-family: 'Numans', sans-serif;
}
h2 
{
  font-size: 3rem;
  color: cadetblue;
  margin-left: auto;
  margin-right: 64px;
}
.form-content input[type=text], .form-content input[type=password], .form-content input[type=email], .form-content select 
{
  width: 10% auto;
  padding: 15px 20px;
  text-align: center;
  border: 1;
  outline: 0;
  border-radius: 28px;
  background-color: #fff;
  font-size: 25px;
  font-weight: 300;
  color: #8D8D8D;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  margin-top: 15px;
}
.form-content .form-items {
  background-image: url('https://i.pinimg.com/originals/af/8d/63/af8d63a477078732b79ff9d9fc60873f.jpg');
    border: 3px solid #040404;
    padding: 5px;
    display: inline-block;
    width: 50%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: center;
    margin-left: 354px;
    -webkit-transition: all 0.4s ease;
}
.card {
   border: 3px solid #040404;
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    width: 470px;
    margin-left: -111px;
    word-wrap: break-word;
    background-color: #ffffff1f;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
</style>
</head>
<body>
<div class="row">
  <div class="form-holder">
    <div class="form-content">
      <div class="form-items">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <div class="card-body p-4 p-md-5">
                <h2> Login  </h2>
                <?php if(!empty($this->session->flashdata('message'))){$this->session->flashdata('message'); } ?>
                  <form action="<?php echo site_url('orders/login'); ?>" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="E-mail" name="frm[email]">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="frm[password]">
                    </div>
                    <input type="submit" name="submit" class="btn btn-success btn-block">
                  </form>
                  <div class="login-footer">
                     <p> Forgot <a href="forgot.php  "> Password? </a></p>
                     <p> Don't have an account? <a href="index"> Sign up </a> </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
