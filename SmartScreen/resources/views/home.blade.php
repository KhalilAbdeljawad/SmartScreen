<html lang="en" class="">
<head>
	
	<script src="https://static.codepen.io/assets/editor/live/console_runner-1df7d3399bdc1f40995a35209755dcfd8c7547da127f6469fd81e5fba982f6af.js"></script><script src="https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js"></script><meta charset="UTF-8"><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico"><link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111"><link rel="canonical" href="https://codepen.io/Flat-Pixels/pen/qQParK">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="{{ url('css/main.css') }}">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ url('js/main.js') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
  
<body>

	<div class="row p-5"  >
		<div class="col-5" id="frame">
			<div class="card">
				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="{{ url('img/products/27.jpg') }}" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{ url('img/products/28.jpg') }}" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{ url('img/products/29.jpg') }}" alt="Third slide">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-2" >

			<button style="margin-top: 200px" type="text" id="run_button" name="goHome" class="form-btn semibold">
				<i class="fa fa-arrow-left"></i>
				Run</button>
		</div>
		<div class="col-5 align-content-center m5"  >
			<div class="row">
				<div class="col-12">
					<h3 class="pb-5">Input JSON object here:</h3>
					<textarea placeholder="JSON Object" rows = "23" cols = "50" name="comment[text]" id="comment_text" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
[
	{
		"name": "time",
		"value": "12"
	},
	
	{
		"name": "date",
		"value": "2019-07-13"
	},
	
	{
		"name": "temperature",
		"value": "30"
	},
	{
		"name": "time",
		"value": "10"
	}
]
					</textarea>

				</div>
			</div>

		</div>
	</div>

<script>
	document.addEventListener('DOMContentLoaded', function(e) 
	//$(document).ready(function()
	{
		$("#run_button").click(function (e) 
		{
			var josn_data = $(comment_text).val();

			$.post("{{ route('get-products') }}", { josn_data:josn_data }, function (data, status) {
				
				response = JSON.parse(data)
			})
		});
	}, false);
</script>

</body>

</html>
