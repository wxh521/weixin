<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>2048</title>

  <link href="/front/css/2048/main.css" rel="stylesheet" type="text/css">
  <link rel="apple-touch-icon" href="/front/css/image/apple-touch-icon.png">
  <link rel="apple-touch-startup-image" href="/front/css/image/apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone 5+ -->
  <link rel="apple-touch-startup-image" href="/front/css/image/apple-touch-startup-image-640x920.png"  media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone, retina -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div class="container">
    <div class="heading">
      <a class="restart-button">新游戏</a>
      <div class="scores-container">
        <div class="score-container">0</div>
        <div class="best-container" style="display:none;">0</div>
      </div>
    </div>

    <div class="game-container">
      <div class="game-message">
        <p></p>
        <div class="lower">
	        <a class="keep-playing-button">继续</a>
          <a class="retry-button">重玩</a>
        </div>
      </div>

      <div class="grid-container">
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
      </div>

      <div class="tile-container">

      </div>
    </div>
  </div>

  <script src="/front/js/2048/bind_polyfill.js"></script>
  <script src="/front/js/2048/classlist_polyfill.js"></script>
  <script src="/front/js/2048/animframe_polyfill.js"></script>
  <script src="/front/js/2048/keyboard_input_manager.js"></script>
  <script src="/front/js/2048/html_actuator.js"></script>
  <script src="/front/js/2048/grid.js"></script>
  <script src="/front/js/2048/tile.js"></script>
  <script src="/front/js/2048/local_storage_manager.js"></script>
  <script src="/front/js/2048/game_manager.js"></script>
  <script src="/front/js/2048/application.js"></script>
</body>
</html>
