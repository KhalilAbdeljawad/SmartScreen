<?php

?>
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
        
    </head>
        
<body>
<div class="container">

    <h1 class="pb-5">Enter a product</h1>
    <div class="inner contact">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- Form Area -->
        <div class="contact-form">
            <!-- Form -->
            <form id="contact-us" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                <!-- Left Inputs -->
                <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                    <!-- Name -->
                    <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                    <!-- Email -->
                    <input type="file" name="image" id="image" required="required" class="form" placeholder="image" />
                    <!-- Subject -->
                    <input type="number" name="price" id="price" required="required" class="form" placeholder="Price" />
                </div><!-- End Left Inputs -->
                <!-- Right Inputs -->
                <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                    <!-- Message -->
                    <textarea name="description" id="description" class="form textarea"  placeholder="Description of the product"></textarea>
                </div><!-- End Right Inputs -->
                <!-- Bottom Submit -->
                <div class="relative fullwidth col-xs-12">
                    <!-- Send Button -->
                    <button type="submit" id="submit" name="submit" class="form-btn semibold">Send Message</button> 
                </div><!-- End Bottom Submit -->

                <!-- Clear -->
                <div class="clear"></div>
            </form>

            <!-- Your Mail Message -->
            <div class="mail-message-area">
                <!-- Message -->
                <div class="alert gray-bg mail-message not-visible-message">
                    <strong>Thank You !</strong> Your email has been delivered.
                </div>
            </div>

        </div> <!-- End Contact Form Area -->
    </div><!-- End Inner -->
</div>

</body>

</html>
