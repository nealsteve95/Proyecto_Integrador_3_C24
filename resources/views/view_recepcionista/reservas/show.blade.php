<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Step by step form</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'><link rel="stylesheet" href="/public/css/app.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html>
  <body>
<section id="step-form">
	<div class="container">
		<form id="msform" method="post"  enctype="multipart/form-data">
			<input type="hidden" name="form_uid" >
			<ul id="progressbar">
				<li class="active">Your Full Name</li>
				<li>Telephone Number</li>
				<li>Email Address</li>
				<li>Your Message</li>
			</ul>
			<fieldset class="tab">
				<h2 class="fs-title">
					<div class="number-border">1</div> Your Full <span>Name</span>
				</h2>
				<div class="input-container">
					<i class="fas fa-user"></i>
					<input type="text" name="first-name" placeholder="Your Full Name" id="field1" />
				</div>
				<input type="button" name="next" id="next-button-1" class="next action-button" value="Next" tab-number="1" />
			</fieldset>
			<fieldset class="tab two-butt-tab">
				<h2 class="fs-title">
					<div class="number-border">2</div> Telephone <span>Number</span>
				</h2>
				<div class="input-container">
					<i class="fas fa-phone"></i>
					<input type="text" name="telephone" placeholder="Telephone Number" id="field2" />
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" id="next-button-2" class="next action-button" value="Next" tab-number="2" />
			</fieldset>
			<fieldset class="tab two-butt-tab">
				<h2 class="fs-title">
					<div class="number-border">3</div> Email <span>Address</span>
				</h2>
				<div class="input-container">
					<i class="fas fa-envelope"></i>
					<input type="email" name="submit_by" placeholder="Email Address" id="field3" />
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" id="next-button-3" class="next action-button" value="Next" tab-number="3" />
			</fieldset>
			<fieldset class="tab textarea-butt-tab">
				<h2 class="fs-title">
					<div class="number-border">4</div> Your <span>Message</span>
				</h2>
				<div class="input-container">
					<i class="fas fa-comment-dots"></i>
					<textarea name="your-message" class="bigger-textarea" placeholder="Your Message" id="field4"></textarea>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="submit" name="submit" id="submit" class="submit action-button" value="Submit" />
			</fieldset>
		</form>
	</div>
	</a>
</section>
</body>
</html>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script><script  src="./script.js"></script>

</body>
</html>
