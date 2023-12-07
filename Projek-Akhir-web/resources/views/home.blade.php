<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek Akhir WEB | Dasboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
      <nav class="navbar" style="background-color: #BBAB8C; position: sticky; top: 0; z-index: 1000;">
        <div class="container-fluid">

          <img src="img/logo.png" alt="Logo" class="logo-img">
          <a class="navbar-brand text-white" href="#">HOME</a>
          <a class="navbar-brand text-white" href="#about">ABOUT</a>
          <a class="navbar-brand text-white" href="#benefit">SERVICE</a>
          <a class="navbar-brand text-white" href="#contact">CONTACT</a>

          <form class="d-flex mt-4 ms-auto">
          </form>
        </div>
      </nav>

<div class="container mt-5">
  <div class="custom-image-container">
    <img src="img/tutor.jpg" class="img-fluid custom-image" alt="Web Tutoring Image">
    <div>
      <h2 class="mt-5">Welcome to E-Learning</h2>
      <p class="lead">Find the best courses to enhance your skills</p>
      <!-- Learn More button -->
      <form class="d-flex ml-auto">
        <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
      </form>
    </div>
  </div>
</div><br><br>

{{-- about --}}
<section id="about" class="about">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="mb-4">About Us</h2>
        <p class="lead">
          Welcome to E-Learning, your trusted platform for high-quality online courses.
          We are committed to providing excellent education to help you enhance your skills and achieve your learning goals. <br>
          <br>Our experienced instructors bring a wealth of knowledge and expertise,
          ensuring that you receive valuable insights and hands-on experience in each course.
          Whether you are a beginner looking to start your learning journey or an experienced professional
          aiming to upskill, we have courses tailored for everyone.
        </p>
      </div>
      <div class="col-md-5">
        <div class="about-video">
          <iframe width="490" height="310" src="https://www.youtube.com/embed/viHILXVY_eU?si=-gwKAOI5hY6eUL7F" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="benefit" id="benefit" style="margin-top: 20px; margin-bottom: 20px;">
  <div class="col-md-12 text-center">
    <h2>Benefits of Joining E-Learning</h2>
  </div>

  <div class="col-md-6 mx-auto">
    <div class="card2 mb-3">
      <img src="img/k1.png" class="card-img-top" alt="Image 1" style="width: 100px;">
      <div class="card-body">
        <h5 class="card-title">Access to Diverse Educational Resources</h5>
        <p class="card-text">Get access to a wide array of educational materials designed to meet your diverse educational learning preferences.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 mx-auto">
    <div class="card2 mb-3">
      <img src="img/k2.png" class="card-img-top" alt="Image 2" style="width: 100px;">
      <div class="card-body">
        <h5 class="card-title">Trusted content</h5>
        <p class="card-text">Created by experts, E-Learning's library of trusted practice and lessons covers math, science, and more. Always free for learners and teachers.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 mx-auto">
    <div class="card2 mb-3">
      <img src="img/k3.png" class="card-img-top" alt="Image 4" style="width: 100px;">
      <div class="card-body">
        <h5 class="card-title">Tools to empower teachers</h5>
        <p class="card-text">With E-Learning, teachers can identify gaps in their students' understanding, tailor instruction, and meet the needs of every student.</p>
      </div>
    </div>
  </div>
</div>


<div class="container" id="popular">
  <h2 class="text-center text-dark mt-6 ">5 Most Popular Courses</h2>
  <hr>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($courses->take(5) as $course)
        <div class="col">
            <div class="card custom-card-color">
                <img src="{{ Storage::url($course->gambar) }}" class="card-img-top" alt="{{ $course->nama }}" width="100%" height="300">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ $course->nama }}</h5>
                    <p class="card-text">{{ $course->deskripsi }}</p>
                    <a href="{{ route('login') }}" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

    <!-- Call-to-Action section -->
    <section id="cta" class="mt-5">
      <div class="container">
        <h2 class="text-center text-dark">Ready to Boost Your Skills?</h2>
        <p class="text-center">Explore our courses and start your learning journey today!</p>
        <div class="text-center">
          <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Get Started</a>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="card3 text-center">
        <div class="tree-image">
          <img src="img/daunpohon.png" alt="Tree Image">
        </div>
        <div class="card3-header">
            E-Learning
        </div>
        <div class="tree-image">
          <img src="img/akarpohon.png" alt="Tree Image">
        </div>
        <div class="card3-body">
          <h5 class="card3-title">Contact Us</h5>
          <p class="card3-text">For more information please contact us, we are here for you!</p>
          <div class="ikon">
            <a href="https://maps.app.goo.gl/YTSHrF7YHf1sjqau9">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z"/>
                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
              </svg>
            </a>
            <a href="mailto:zabryna.andiny@gmail.com">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
              </svg>
            </a>
            <a href="https://www.instagram.com/andinyzzz">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
              </svg>
            </a>
            <a href="https://www.youtube.com">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
              <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408z"/>
            </svg>
            </a>
            <a href="https://web.whatsapp.com">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg>
            </a>
            <a href="https://www.tiktok.com">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
              <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
            </svg>
            </a>
            <a href="https://web.telegram.org">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
            </svg>
            </a>
            <a href="https://www.facebook.com">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg>
            </a>
          </div>
        </div>
      </div>
    </section>

    <div class="col-1">
        <p class="text-center mt-3">
            <a href="/" class="text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                    class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16" style="fill: #BBAB8C;">
                    <path
                        d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z" />
                </svg>
            </a>
        </p>
    </div>

    <footer class="footer">
      &copy; 2023 Projek Akhir WEB - H071221066
  </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      </body>
  </html>
