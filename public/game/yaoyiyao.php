<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>摇一摇</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/life.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="/front/js/html5shiv.js"></script>
      <script src="/front/js/respond.min.js"></script>
    <![endif]-->
    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/shake.js"></script>
  </head>
  <body>
  
  </body>
<script type="text/javascript">     
window.onload = function() {

	window.addEventListener('shake', shakeEventDidOccur, false);
	
	//define a custom method to fire when shake occurs.
	function shakeEventDidOccur () {
	
		//put your own code here etc.
		if (confirm("Undo?")) {
                                alert(1);
		}
	}
};
</script>
</html>