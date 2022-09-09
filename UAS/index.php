<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    @import url(css/root.css);
    @import url(css/navbar-index.css);
    @import url(css/index.css);

    .img-logo {
      filter: invert(27%) sepia(100%) saturate(1197%) hue-rotate(330deg) brightness(80%) contrast(93%);
    }
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/TextPlugin.min.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <div class="container">
    <div class="navbar-container">
      <div class="img-logo">
        <a href="index.php"> <img src="img/logo.svg"></a>
      </div>
      <div class="text-navbar">
        <a href="reservasi.php">reservasi now</a>
      </div>
    </div>

    <div class="main-container" style="height: 100vh;">
      <div class="text-container">
        <div class="text-header" style="margin-left: 50px;">
          <h2>welcome</h2>
        </div>
        <div class="text-body">
          <p1></p1>
          <div class="img-back-jair">
            <img src="img/jair1.svg" />
          </div>
        </div>
      </div>
      <div class="color-overlay"></div>
      <video controls autoplay play volume muted loop class="back-video">
        <source src="video/timelapse-batur.mp4" type="video/mp4">
        </source>
      </video>
      <div class="text-reserve">
        <div class="text-reserve-header">
          <a href="reservasi.php">
            <h2>reserve your table</h2>
          </a>
        </div>
      </div>
    </div>
    <div class="main-container">
      <div class="box" style="width: 100%;">
        <div class="menu-text-header">
          <h2>our menu</h2>
        </div>
        <div class="menu-container">
          <div class="menu-card">
            <div class="card-header">
              <h1>MUJAIR NYAT - NYAT</h1>
            </div>
            <ul>
              <li>Mujair nyat - nyat</li>
              <li>Nasi putih</li>
              <li>Sayur pelecing</li>
              <li>Sambal</li>
              <li>Sayur undis</li>
            </ul>
          </div>
          <div class="menu-card">
            <div class="card-header">
              <h1>MUJAIR GORENG</h1>
            </div>
            <ul>
              <li>Mujair goreng</li>
              <li>Nasi putih</li>
              <li>Sayur pelecing</li>
              <li>Sambal</li>
              <li>Sayur undis</li>
            </ul>
          </div>
          <div class="menu-card">
            <div class="card-header">
              <h1>MUJAIR BAKAR</h1>
            </div>
            <ul>
              <li>MUJAIR BAKAR</li>
              <li>Nasi putih</li>
              <li>Sayur pelecing</li>
              <li>Sambal</li>
              <li>Sayur undis</li>
            </ul>
          </div>
          <div class="menu-card">
            <div class="card-header">
              <h1>MUJAIR GORENG
                SAMBAL MATAH</h1>
            </div>
            <ul>
              <li>Mujair goreng sambal matah</li>
              <li>Nasi putih</li>
              <li>Sayur pelecing</li>
              <li>Sayur undis</li>
              <li>Sambal matah</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <div class="box2">
        <div class="text-content">
          <div class="text-content-header">
            <h2>DINING // TAKEOUT & DELIVERY</h2>
          </div>
          <div class="text-content-body" style="margin-right: 10px;">
            <p2>Jl. Tirta Geduh, Bebalang, Kec. Bangli, Kabupaten Bangli, Bali 80614</p2>
            <br>
            <p2>+62 813 3785 7401</p2>
            <br>
            <p2>rmpakbagong@gmail.com</p2>
            <br>
            <br>
            <br>
            <p2>Mon, Tue, Wed, Thu, Fri, Sat, Sun 09:am - 07:00pm</p2>
          </div>
          <div class="img-tulang">
            <img src="img/tulangjair1.svg" alt="">
          </div>
        </div>
        <div class="maps">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.5243266155476!2d115.35522219454342!3d-8.44828184044985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd219c30a22a64f%3A0xb3485e6aaba0e396!2sRM%20Pak%20Bagong!5e0!3m2!1sid!2sid!4v1623043465663!5m2!1sid!2sid" allowfullscreen="" loading="lazy" class="maps-content"></iframe>
        </div>
      </div>
    </div>

    <div class="footer-container">
      <div class="text-container-footer">
        <div class="text-footer">
          <a href="index.php">
            <p>rm. pak bagong</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="navbar-scroll.js"> </script>
<script>
  gsap.registerPlugin(TextPlugin);
  gsap.to("p1", {
    duration: 50,
    text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, accusamus ipsam sapiente est deleniti similique iste rem tempora, esse id consequatur natus ad magnam doloribus repellendus assumenda perspiciatis reiciendis. Dolor sunt nihil veniam laudantium quia debitis minus odit explicabo aliquam temporibus, ipsum necessitatibus magnam, impedit fuga tenetur doloremque neque earum, placeat non sint alias. Quod, error vero? Blanditiis sit earum natus fuga repellendus, dolores nisi minima amet, error, nulla vero iure. Minus assumenda possimus exercitationem dolore! Ex vel suscipit aperiam amet perspiciatis accusantium adipisci sint incidunt nam ducimus, nostrum, dolores praesentium libero eum, iusto pariatur odio dolor voluptatem eaque quibusdam.",
  });
</script>

</html>