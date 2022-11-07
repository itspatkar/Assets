<!DOCTYPE html>
<html>
<head>
	<title>TMDB | Contact Form</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<style>
		body {
    width: 100%;
    min-height: 100vh;
    background-image:url("IMAGES/SL-121019-25870-21.jpg");
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
}
.container{
	position: absolute;
	top:10%;
}
.logo{
			position:absolute;
			top:5%;
			left:6%;
		}
     .logo a{
             color: #fff;
             font-size: 30px;
             font-weight: 600;
             text-decoration: none;
            }
			body{
            background-image: url("img/SL-121019-25870-21.jpg") ;}
			
	</style>
</head>
<body>
<div class="logo">
        <a href="index.php">TMDB</a>
      </div>
	<div class="container py-3">
	<div class="row">
		<div class="col-md-12"> 
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card card-outline-secondary">
			<div class="card-header">
						<h3 class="mb-0">Contact Form</h3>
					</div>
					<div class="card-body">
								<form autocomplete="off" class="form" role="form" method="post" action="sendmail.php">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Full Name</label>
							<div class="col-lg-9">
							<input class="form-control" type="text" value="" placeholder="Enter Full name" name="full_name" required>
					</div>
						</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label form-control-label">Mobile No.</label>
							<div class="col-lg-9">
							<input class="form-control" type="text" value="" placeholder="Enter Mobile Number" name="mobile_number" required>
					</div>
							</div>
						<div class="form-group row">
						<label class="col-lg-3 col-form-label form-control-label">Email</label>
						<div class="col-lg-9">
						<input class="form-control" type="text" value="" placeholder="Enter Email" name="email" required>
					</div>
						</div>
					<div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label">Message</label>
						<div class="col-lg-9">
					<textarea class="form-control"  placeholder="Write your message" name="message" required></textarea>
								</div>
						</div>
					<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label"></label>
						<div class="col-lg-9">
							<input class="btn btn-primary" type="submit" name="btnsubmit" value="Send">
						</div>
					</div>

		</form>
				</div>
		</div>
		</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>