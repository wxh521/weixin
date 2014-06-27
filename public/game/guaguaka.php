<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>刮刮卡</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/life.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="/front/js/html5shiv.js"></script>
      <script src="/front/js/respond.min.js"></script>
    <![endif]-->
    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
  </head>
  <body>
      
      <canvas/> 
  </body>
    <script type="text/javascript">     
(function(bodyStyle){         
	bodyStyle.mozUserSelect = 'none';         
	bodyStyle.webkitUserSelect = 'none';           
	var img = new Image();         
	var canvas = document.querySelector('canvas');         
	canvas.style.backgroundColor='transparent';         
	canvas.style.position = 'absolute';           
	img.addEventListener('load',function(e){  
		var ctx;
		var w = img.width, h = img.height;             
		var offsetX = canvas.offsetLeft, offsetY = canvas.offsetTop;             
		var mousedown = false;               
		function layer(ctx){                 
			ctx.fillStyle = 'gray';                 
			ctx.fillRect(0, 0, w, h);             
		}   
		function eventDown(e){                 
			e.preventDefault();                 
			mousedown=true;             
		}   
		function eventUp(e){                 
			e.preventDefault();                 
			mousedown=false;             
		}               
		function eventMove(e){                 
			e.preventDefault();                 
			if(mousedown){                     
				if(e.changedTouches){                         
					e=e.changedTouches[e.changedTouches.length-1];                     
				}                     
				var x = (e.clientX + document.body.scrollLeft || e.pageX) - offsetX || 0,                         
				y = (e.clientY + document.body.scrollTop || e.pageY) - offsetY || 0;                     
				with(ctx){                    
					beginPath()                     
					arc(x, y, 15, 0, Math.PI * 2);                         
					fill();                     
				}                
			}             
		}               
		canvas.width=w;             
		canvas.height=h;             
		canvas.style.backgroundImage='url('+img.src+')';             
		ctx=canvas.getContext('2d');             
		ctx.fillStyle='transparent';             
		ctx.fillRect(0, 0, w, h);             
		layer(ctx);               
		ctx.globalCompositeOperation = 'destination-out';               
		canvas.addEventListener('touchstart', eventDown);             
		canvas.addEventListener('touchend', eventUp);             
		canvas.addEventListener('touchmove', eventMove);             
		canvas.addEventListener('mousedown', eventDown);             
		canvas.addEventListener('mouseup', eventUp);             
		canvas.addEventListener('mousemove', eventMove);       
	});
	
	img.src = '/front/image/life_helper_weixin.jpg';

})(document.body.style);
</script>
</html>