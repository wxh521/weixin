<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>canvas</title>
</head>

<body> 

<canvas/> 

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
					arc(x, y, 5, 0, Math.PI * 2);                         
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
	
	img.src = 'http://www.baidu.com/img/bdlogo.gif';

})(document.body.style);
</script>
	
</body>
</html> 