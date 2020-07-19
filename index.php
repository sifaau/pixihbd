
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

  const container = new PIXI.Container();
  app.stage.addChild(container);

  PIXI.loader
  .add(psyduck_image)
  .add(nabila_image)
  .on("progress", loadProgressHandler)
  .load(open);


  //This `setup` function will run when the image has loaded
  function open() {

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
    bebek.on('pointerdown', delta=>goToUcapan(bebek,delta));

    //Add the cat to the stage
    app.stage.addChild(bebek);
    app.ticker.add(delta => gameLoop(bebek,delta));

    document.body.appendChild(app.view);

  }

  function goToUcapan(bebek,delta) {
    app.stage.removeChild(bebek);
    ucapan();
  }

  function gameLoop(bebek,delta){
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
    nabila.scale.x = 1.5;
    nabila.scale.y = 1.5;

    //Add the cat to the stage
    app.stage.addChild(nabila);
  }

  function loadProgressHandler() {
    console.log('loading');
    let basicText = new PIXI.Text('Loading...');
    basicText.x = app.screen.width / 2;
    basicText.y = 100;
  }

</script>
</body>
</html>
