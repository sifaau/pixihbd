
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hello Nabila</title>
  <style>* {padding: 0; margin: 0}</style>
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.1.3/pixi.min.js"></script>
<body>
  <script type="text/javascript">
  // let app;
  // window.onload = function (){
  let psyduck_image = 'psd.png';
  let nabila_image = 'nab2.png';
  var max = getRndInteger(6, 9);
  var muterke = getRndInteger(4, 6);

  var textArray = [
    'Psyduck : "CATCH ME AGAIN Nab..!!!"\nPsyduck : "LOL"',
    'Psyduck : "CATCH ME NAB...!!',
    'Psyduck : "CATCH MEEEEEEEEE...!!"',
    'Psyduck : "YEAY...!!\nPsyduck : "CATCH ME...!!\nPsyduck : "CATCH ME...!!"',
    'Psyduck : "CATCH MEEE...!!"',
    'Psyduck : "WKWKWKWKWKWK.."',
    'Psyduck : "LOL.."',
    'Psyduck : "NABILAA..!"\nPsyduck : "NABILAA...!!!"',
  ];

  let type = "WebGL"
  if(!PIXI.utils.isWebGLSupported()){
    type = "canvas"
  }

  PIXI.utils.sayHello(type);

  //Aliases for loader
  let Application = PIXI.Application,
  loader = PIXI.loader,
  resources = PIXI.loader.resources, // resources
  Sprite = PIXI.Sprite; // sprites

  //Create a Pixi Application
  let app = new PIXI.Application({
    // width: 800,         // default: 800
    // height: 1000,        // default: 600
    antialias: true,    // default: false
    transparent: false, // default: false
    resolution: 1,       // default: 1
    forceCanvas: true,
  });

  app.renderer.backgroundColor = 0xF4ACB7;
  app.renderer.view.style.position = "absolute";
  app.renderer.view.style.display = "block";
  app.renderer.autoResize = true;
  app.renderer.resize(window.innerWidth, window.innerHeight);

  document.body.appendChild(app.view);

  const container = new PIXI.Container();
  app.stage.addChild(container);

  let loading;

  init();

  function init(){

    loading = new PIXI.Text('Loading...', { stroke: 0xff2200 });
    loading.x = app.screen.width / 2;
    loading.y = app.screen.height / 2;
    container.pivot.x = loading.width / 2;
    container.pivot.y = loading.height / 2;
    app.stage.addChild(loading);


    PIXI.loader
    .add(psyduck_image)
    .add(nabila_image)
    .on("progress", loadProgressHandler)
    .on("complete", delta =>loadComplete(loading,delta))
    .load(open);
  }

  //This `setup` function will run when the image has loaded
  function open() {

    touchme = new PIXI.Text('Psyduck : "TOUCH ME..."', { stroke: 0xff2200 });
    touchme.x = 100;
    touchme.y = 300;
    container.pivot.x = touchme.width / 2;
    container.pivot.y = touchme.height / 2;
    app.stage.addChild(touchme);

    //Create the cat sprite
    let bebek = new Sprite(resources[psyduck_image].texture);

    bebek.anchor.set(0.5);
    //Change the sprite's position
    bebek.x = app.screen.width / 2;
    bebek.y = app.screen.height / 2;

    container.pivot.x = bebek.width / 2;
    container.pivot.y = bebek.height / 2;

    // cat.width = 300;
    // cat.height = 500;

    bebek.scale.x = 0.5;
    bebek.scale.y = 0.5;

    bebek.vy = 0;
    bebek.vx = 10;

    // Opt-in to interactivity
    bebek.interactive = true;
    // Shows hand cursor
    bebek.buttonMode = true;
    // Pointers normalize touch and mouse
    bebek.on('pointerdown', delta=>goToUcapan(bebek,touchme,delta));

    //Add the cat to the stage
    app.stage.addChild(bebek);
    app.ticker.add(delta => bounce(bebek,delta));
  }

  function goToUcapan(bebek,touchme,delta) {
    app.stage.removeChild(bebek);
    app.stage.removeChild(touchme);
    catchme();
  }

  function bounce(bebek,delta){
    let location = app.screen.height / 2;
    bebek.y += bebek.vy;
    bebek.vy += 0.8;
    bebek.rotation = 0;
    if (bebek.y > (location+20) ){
      bebek.vy *= -0.8;
      bebek.y += bebek.vy;
      bebek.rotation = 0.025;
    }
  }

  function catchme(){

    catchme = new PIXI.Text('Psyduck : "Hai Nabila..."\nPsyduck : "CATCH ME...!!"', { stroke: 0xff2200 });
    catchme.x = 100;
    catchme.y = app.screen.height / 2;
    container.pivot.x = catchme.width / 2;
    container.pivot.y = catchme.height / 2;
    app.stage.addChild(catchme);

    let bebek2 = new Sprite(resources[psyduck_image].texture);
    bebek2.width = 100;
    bebek2.height = 160;

    bebek2.x = Math.random() * app.screen.width / 3;
    bebek2.y = Math.random() * app.screen.height / 2;

    bebek2.rotation = 0.5;

    // Opt-in to interactivity
    bebek2.interactive = true;
    // Shows hand cursor
    bebek2.buttonMode = true;
    // Pointers normalize touch and mouse
    bebek2.on('pointerdown', tangkep );

    app.stage.addChild(bebek2);

    var hitung = 0;
    function tangkep(){
      var random = Math.random();
      var random2 = Math.random();
      console.log(random);
      console.log(random2);
      console.log(app.screen.width);
      console.log(app.screen.height);
      var new_x =  random * app.screen.width / 1.1;
      var new_y =  random2 * app.screen.height / 1.1;
      if ( new_x > ( app.screen.width - 100) || new_x < 50 ){
        var new_x = 50;
      }
      if ( new_y > (app.screen.height - 100) || new_y < 50 ){
        var new_y = 155;
      }
      console.log(new_x);
      console.log(new_y);
      bebek2.x = new_x;
      bebek2.y = new_y;
      hitung++;
      console.log(hitung);

      if ( hitung > 0 ){
        var randomText = Math.floor(Math.random()*textArray.length);
        updateText(textArray[randomText]);
      }

      if ( hitung === muterke ){
        app.ticker.add((delta) => {
          bebek2.rotation += 0.002;
        });
        bebek2.anchor.x = 0.5;
        bebek2.anchor.y = 0.5;
      } else {
        var rotat = bebek2.rotation;
        console.log('rot '+rotat);
        if ( rotat === 0.5 ){
          bebek2.rotation = -0.5;
        }
        if ( rotat === -0.5 ){
          bebek2.rotation = 0.5;
        }
      }

      function updateText(message) {
        app.stage.removeChild(catchme);
        catchme = new PIXI.Text(message, { stroke: 0xff2200 });
        catchme.x = 100;
        catchme.y = app.screen.height / 2;
        container.pivot.x = catchme.width / 2;
        container.pivot.y = catchme.height / 2;
        app.stage.addChild(catchme);
      }

      console.log('max= '+max);
      if ( hitung > max ){
        app.stage.removeChild(bebek2);
        app.stage.removeChild(catchme);
        ucapan();
        terbang2();
      }
    }

  }

  function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
  }




  function ucapan() {
    //Create the cat sprite
    let nabila = new Sprite(resources[nabila_image].texture);

    nabila.anchor.set(0.5);
    //Change the sprite's position
    nabila.x = app.screen.width / 2;
    nabila.y = app.screen.height / 2;

    container.pivot.x = nabila.width / 2;
    container.pivot.y = nabila.height / 2;

    // cat.width = 300;
    // cat.height = 500;
    nabila.scale.x = 1.4;
    nabila.scale.y = 1.4;

    //Add the cat to the stage
    app.stage.addChild(nabila);
  }

  function loadProgressHandler() {
    console.log('loading');
  }
  function loadComplete(loading,delta){
    loading.visible = false;
  }

  function terbang2(){
    const aliens = [];

    const totalDudes = 10;

    for (let i = 0; i < totalDudes; i++) {
      // create a new Sprite that uses the image name that we just generated as its source
      const dude = new Sprite(resources[psyduck_image].texture);

      // set the anchor point so the texture is centerd on the sprite
      dude.anchor.set(0.5);

      // set a random scale for the dude - no point them all being the same size!
      dude.scale.set(0.8 + Math.random() * 0.3);

      // finally lets set the dude to be at a random position..
      dude.x = Math.random() * app.screen.width;
      dude.y = Math.random() * app.screen.height;

      // dude.tint = Math.random() * 0xFFFFFF;

      // create some extra properties that will control movement :
      // create a random direction in radians. This is a number between 0 and PI*2 which is the equivalent of 0 - 360 degrees
      dude.direction = Math.random() * Math.PI * 2;

      // this number will be used to modify the direction of the dude over time
      dude.turningSpeed = Math.random() - 0.8;

      // create a random speed for the dude between 2 - 4
      dude.speed = 2 + Math.random() * 2;

      // finally we push the dude into the aliens array so it it can be easily accessed later
      aliens.push(dude);
      dude.interactive = true;
      // Shows hand cursor
      dude.buttonMode = true;
      // Pointers normalize touch and mouse
      dude.on('pointerdown', removedude );
      app.stage.addChild(dude);
      function removedude(){
        app.stage.removeChild(dude);
      }

    }

    // create a bounding box for the little dudes
    const dudeBoundsPadding = 100;
    const dudeBounds = new PIXI.Rectangle(-dudeBoundsPadding,
      -dudeBoundsPadding,
      app.screen.width + dudeBoundsPadding * 2,
      app.screen.height + dudeBoundsPadding * 2);

      app.ticker.add(() => {
        // iterate through the dudes and update their position
        for (let i = 0; i < aliens.length; i++) {
          const dude = aliens[i];
          dude.direction += dude.turningSpeed * 0.01;
          dude.x += Math.sin(dude.direction) * dude.speed;
          dude.y += Math.cos(dude.direction) * dude.speed;
          dude.rotation = -dude.direction - Math.PI / 2;

          // wrap the dudes by testing their bounds...
          if (dude.x < dudeBounds.x) {
            dude.x += dudeBounds.width;
          } else if (dude.x > dudeBounds.x + dudeBounds.width) {
            dude.x -= dudeBounds.width;
          }

          if (dude.y < dudeBounds.y) {
            dude.y += dudeBounds.height;
          } else if (dude.y > dudeBounds.y + dudeBounds.height) {
            dude.y -= dudeBounds.height;
          }
        }
      });


    }

    </script>
  </body>
  </html>
