<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>刮刮卡</title>
    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/wScratchPad.min.js"></script>
     <script type="text/javascript">     
        $('#elem').wScratchPad({
          bg: '/front/image/bg-green.png',
          fg: '/front/image/card-bannerbg.png',
          'cursor': 'url("/front/image/coin.png") 5 5, default',
          scratchMove: function (e, percent) {
            
          }
        });
</script>
  </head>
  <body>
      
      <div id="elem"></div>
  </body>
   
</html>