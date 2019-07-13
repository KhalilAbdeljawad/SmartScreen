<html lang="en" class=""><head><script src="https://static.codepen.io/assets/editor/live/console_runner-1df7d3399bdc1f40995a35209755dcfd8c7547da127f6469fd81e5fba982f6af.js"></script><script src="https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js"></script><meta charset="UTF-8"><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico"><link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111"><link rel="canonical" href="https://codepen.io/Flat-Pixels/pen/qQParK">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <style class="cp-pen-styles">*,
    *::before,
    *::after { box-sizing: border-box; }
    
    html,
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      align-items: center;
      
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
    
      background-color: #3c3c3c;
    }
    
    
    .card {
      position: relative;
      
      width: 500px;
      height: 1200px;
      overflow: hidden;
    
      
      
      border-radius: 5px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }
    
    /*Light blue cover above the slide show*/
    .card::after {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      z-index: 900;
    
      display: block;
      width: 100%;
      height: 100%;
    
      background-color: rgba(140, 22, 115, 0.2);
    }
    
    .card_part {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 7;
    
      display: flex;
      align-items: center;
      width: 100%;
      height: 100%;
      
      -webkit-transform: translateX( 700px );
      
              transform: translateX( 700px );
      background-image: url( https://github.com/Flat-Pixels/assets_hosting/blob/master/picture_slides/1.jpg?raw=true );
      
      -webkit-animation: opaqTransition 28s cubic-bezier(0, 0, 0, 0.97) infinite;
      
              animation: opaqTransition 28s cubic-bezier(0, 0, 0, 0.97) infinite;
    }
    
    
    .card_part.card_part-two {
      z-index: 6;
      background-image: url( https://github.com/Flat-Pixels/assets_hosting/blob/master/picture_slides/2.jpg?raw=true );
      -webkit-animation-delay: 7s;
              animation-delay: 7s;
    }
    
    .card_part.card_part-three {
      z-index: 5;
      background-image: url( https://github.com/Flat-Pixels/assets_hosting/blob/master/picture_slides/3.jpg?raw=true );
      -webkit-animation-delay: 14s;
              animation-delay: 14s;
    }
    
    .card_part.card_part-four {
      z-index: 4;
      background-image: url( https://github.com/Flat-Pixels/assets_hosting/blob/master/picture_slides/4.jpg?raw=true );
      -webkit-animation-delay: 21s;
              animation-delay: 21s;
    }
    
    
    @-webkit-keyframes opaqTransition {
      3% { -webkit-transform: translateX( 0 ); transform: translateX( 0 ); }
      25% { -webkit-transform: translateX( 0 ); transform: translateX( 0 ); }
      28% { -webkit-transform: translateX( -700px ); transform: translateX( -700px ); }
      100% { -webkit-transform: translateX( -700px ); transform: translateX( -700px ); }
    }
    
    
    @keyframes opaqTransition {
      3% { -webkit-transform: translateX( 0 ); transform: translateX( 0 ); }
      25% { -webkit-transform: translateX( 0 ); transform: translateX( 0 ); }
      28% { -webkit-transform: translateX( -700px ); transform: translateX( -700px ); }
      100% { -webkit-transform: translateX( -700px ); transform: translateX( -700px ); }
    }</style></head><body>
    <div class="card">
    <div class="card_part card_part-one">
    </div>
    
    <div class="card_part card_part-two">
    </div>
    
    <div class="card_part card_part-three">
    </div>
    
    <div class="card_part card_part-four">
    </div>
    </div>
    </body></html>