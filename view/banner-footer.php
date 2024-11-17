<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .banner-container{
          margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .slider{
        width: 100vw;
        height: 80vh;
        border-radius: 10px;
        overflow: hidden;
      }

      .slides{
        width: 100vw;
        height: 80vh;
        display: flex;
      }

      .slides input{
        display: none;
      }

      .slide{
        width: 100%;
        transition: 2s;
      }

      .slide img{
        width: 100vw;
        height: auto;
      }
      .navigation-manual{
        position: absolute;
        width: 100vw;
        margin-top: -40px;
        display: flex;
        justify-content: center;
      }

      .manual-btn{
        border: 2px solid #40D3DC;
        padding: 5px;
        border-radius: 10px;
        cursor: pointer;
        transition: 1s;
      }

      .manual-btn:not(:last-child){
        margin-right: 40px;
      }

      .manual-btn:hover{
        background: #40D3DC;
      }

      #radio1:checked ~ .first{
        margin-left: 0;
      }

      #radio2:checked ~ .first{
        margin-left: -100vw;
      }

      #radio3:checked ~ .first{
        margin-left: -200%;
      }

      #radio4:checked ~ .first{
        margin-left: -300%;
      }


      .navigation-auto{
        display: flex;
        width: 100vw;
        justify-content: center;
      }

      .navigation-auto div{
        border: 2px solid #40D3DC;
        padding: 5px;
        border-radius: 10px;
        transition: 1s;
      }

      .navigation-auto div:not(:last-child){
        margin-right: 40px;
      }

      #radio1:checked ~ .navigation-auto .auto-btn1{
        background: #40D3DC;
      }

      #radio2:checked ~ .navigation-auto .auto-btn2{
        background: #40D3DC;
      }

      #radio3:checked ~ .navigation-auto .auto-btn3{
        background: #40D3DC;
      }

      #radio4:checked ~ .navigation-auto .auto-btn4{
        background: #40D3DC;
      }
      
    </style>
</head>
<body>
    <container class="banner-container hidden">
    <div class="slider">
      <div class="slides">
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <div class="slide first">
          <img src="img/1.webp" alt="">
        </div>
        <div class="slide">
          <img src="img/2.webp" alt="">
        </div>
        <div class="slide">
          <img src="img/3.webp" alt="">
        </div>
        <div class="slide">
          <img src="img/4.webp" alt="">
        </div>
       <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
      </div>
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
    </div>
    </container>
    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 3000);
    </script>

  </body>
</html>