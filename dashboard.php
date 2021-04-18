<html>
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <script src="game.js"></script>
      <link rel="shortcut icon" href="resources/favicon.ico" type="image/x-icon">  
      <title>Conway's Game of Life</title>
  </head>

    <?php 
        $user = $_GET["uname"]; 
    ?>

    <body onload="setupGame()">
      <div class="navbar">
        <div style="margin-left: 1%; float: left">
            <a class="button" href="home.html">Logout</a>
          </div>
          
      </div>
      <div id="title">
          <h2><?php echo $user; ?>'s Game of Life</h2>
      </div>
      
      <div id="buttonsAndGame">

          <div id="buttonRow">

            <img src="resources/circle.gif" alt="circle" id="gif">
            <h4 id="generation">Generation 0</h4>

            <div id="left-col">
                <button class="button" onclick="startLoop()">
                    Start
                </button>
                <button class="button" onclick="endLoop()">
                    Stop
                </button>
                <button class="button" onclick="reset()">
                    Reset
                </button>
            </div><br> <br>
            <div id="right-col">
                <button class="button" onclick="increment()">
                    Increment 1 generation
                </button>
                <button class="button" onclick="twenty_three_increments(0)">
                    Increment 23 generations
                </button>
                <div class="dropdown">

                    <button class="button" id="dropbutton">Patterns</button>
                    <div class="dropdown-content">

                        
                        <div class="dropdown2">
                            <button class="button" id="still">Still life</button>
                            <div class="dropdown-content-still">
                                <button class="smallbutton" onclick="block()">The Block</button>
                                <button class="smallbutton" onclick="boat()">The Boat</button>
                                <button class="smallbutton" onclick="loaf()">The Loaf</button>
                                <button class="smallbutton" onclick="beehive()">The Beehive</button>
                            </div>
                        </div>

                        <div class="dropdown3">
                            <button class="button" id="osc">Oscillators</button>
                            <div class="dropdown-content-osc">
                                <button class="smallbutton" onclick="blinker()">The Blinker</button>
                                <button class="smallbutton" onclick="beacon()">The Beacon</button>
                                <button class="smallbutton" onclick="toad()">The Toad</button>
                                <button class="smallbutton" onclick="pulsar()">The Pulsar</button>
                            </div>
                        </div>

                        <div class="dropdown4">
                            <button class="button" id="ship">Glider/Ships</button>
                            <div class="dropdown-content-ship">
                                <button class="smallbutton" onclick="glider()">The Glider</button>
                                <button class="smallbutton" onclick="spaceship()">The Ship</button>
                            </div>
                        </div>

                    </div>

                </div>
              </div>
              
              <div class="audio">
                  <br>
                  <audio autoplay controls loop>
                      <source src="resources\daft.mp3" type="audio/mp3">
                  </audio>
              </div>

          </div>
      
          <div id="gameDiv">
              <div id="gameBoard"> 
              </div>
          </div>

      </div>
      

      <div> <!--Validation footer-->
          <div id="w3c"><br><br>
              <a href="https://google.com" target="_blank"><img src="resources/w3-html.png" alt="Valid HTML"/></a>
              <a href="https://google.com" target="_blank"><img src="resources/w3-css.png" alt="Valid CSS"/></a>
          </div>
      </div>
    </body>
            <!-- links for later, these arent the validation for this site
                html - https://html5.validator.nu/?doc=https%3A%2F%2Fcodd.cs.gsu.edu%2F%7Eamustafa3%2Fhw%2Fhw4%2Findex.html
                css - https://jigsaw.w3.org/css-validator/validator?uri=https%3A%2F%2Fcodd.cs.gsu.edu%2F%7Eamustafa3%2Fhw%2Fhw4%2Findex.html&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=en 
            -->


</html>