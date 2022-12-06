<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAZNAS KOTA DUMAI</title>
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />

    <style>
        .bg1 {
            background-color: #075332;
        }
        .bg2 {
            background-color: #1e1e1e;
        }
        .navbar {
          transition: all 500ms ease-in-out;
        }
        .navbar > div {
          transition: all 1000ms ease-in-out;
        }
        .nav-link {
            margin-left: 5px;
            color: #fff;
        }
        .nav-link:hover {
            color: #fdcd0b;
        }
        .form-group {
          margin-bottom: 20px;
        }
      </style>
  </head>
  <body class="bg-dark">
    
    <!-- Tempat naro navbar disini -->
    <nav class="navbar navbar-expand-lg bg1 fixed-top shadow" id="navbar">
        <div class="container" id="navCont">
            <a class="navbar-brand" href="#"><img src="{{asset('images/logo.png')}}" width="50"></a>
            <img src="{{asset('images/logo-text.png')}}" width="100">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">DATA MUSTAHIK</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/login')}}">LOGIN</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container mb-3 bg-white" style="margin-top: 100px">
            @yield('content')
    </div>

    <footer>
        <div class="container-fluid bg-dark" id="footer">
            <div class="container text-white py-3">
                <div class="row">
                <div class="col text-center">
                    <img src="{{asset('images/logo.png')}}" width="50">
                    <h5>BAZNAS KOTA DUMAI</h5>
                    <h6 class="text-muted">Badan Amil Zakat Nasional</h6>
                    <p class="text-muted">Copyright &copy; Baznas Kota Dumai</p>
                    <p class="text-muted">Ver. 1.0</p>
                  </div>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#mustahik').DataTable();
      });
      </script>
      <script src="{{asset('dist/js/tilt.js')}}"></script>
    <script>
        // panggil navbar
const navBar = document.getElementById("navbar");
const navCont = document.getElementById("navCont");

// buat function scroll
function scroll() {
  let calc = window.scrollY;
  if (calc > 0) {
    navBar.classList.replace("bg1", "bg2");
    navBar.classList.replace("navbar-light", "navbar-dark");
  } else if (calc <= 0) {
    navBar.classList.replace("bg2", "bg1");
    navBar.classList.replace("navbar-dark", "navbar-light");
  }
}

//panggil saat init
scroll();

// panggil saat discroll
window.onscroll = () => {
  scroll();
};

    </script>

<script type="text/javascript">
	for(var i=1;i<=4;i++){
    VanillaTilt.init(document.querySelector(".button"+i), {
		max: 25,
		speed: 400
	});
  }
</script>
  </body>
</html>