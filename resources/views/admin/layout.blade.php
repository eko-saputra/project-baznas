<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAZNAS KOTA DUMAI</title>
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/fc-4.2.1/r-2.4.0/datatables.min.css"/>
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
              @if($auth)
              <li class="nav-item">
                <span class="nav-link">
                        Welcome <b>{{$auth->name}}</b>
                    </span>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light btn btn-danger" href="{{url('/logout')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z"/>
                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                  </svg> Keluar
                </a>
                </li>
                @endif
            </ul>
          </div>
        </div>
      </nav>

    <div class="container mb-3" style="margin-top: 100px">
      <div class="row form-login rounded">
        <div class="container bg-warning">&nbsp;</div>
        <div class="col-lg-2 col-md-12 bg-success">
            <img src="{{asset('images/login-copy.webp')}}" width="100%">
            @if($auth->role == 'pimpinan' && $auth->jabatan == 'ketua')
            <div class="m-3 text-center">
              <a href="{{url('/users')}}" class="btn btn-warning px-3 button1">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Data Users</p>
            @endif

            @if($auth->role == 'pimpinan' && ($auth->jabatan == 'ketua' || $auth->jabatan == 'waka'))
            <div class="m-3 text-center">
              <a href="{{url('/pengajuan')}}" class="btn btn-light px-3 button2">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                  <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z"/>
                  <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Pengajuan</p>

            <div class="m-3 text-center">
              <a href="{{url('/survey')}}" class="btn btn-light px-3 button3">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Survey</p>
            @endif

            @if($auth->role == 'pimpinan')
            <div class="m-3 text-center">
              <a href="{{url('/pleno')}}" class="btn btn-light px-3 button4">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
                  <path d="M2 15.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v13.5zM8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Pleno</p>

            <div class="m-3 text-center">
              <a href="{{url('/pending')}}" class="btn btn-light px-3 button5">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-dash-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6 6a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Pending</p>

            <div class="m-3 text-center">
              <a href="{{url('/disetujui')}}" class="btn btn-light px-3 button6">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Disetujui</p>

            <div class="m-3 text-center">
              <a href="{{url('/ditolak')}}" class="btn btn-light px-3 button7">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-x-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Ditolak</p>
            @else
            <div class="m-3 text-center">
              <a href="{{url('/mustahik')}}" class="btn btn-light px-3 button8">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Data Mustahik</p>

            <div class="m-3 text-center">
              <a href="{{url('/survey')}}" class="btn btn-light px-3 button3">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Dokumentasi Survey</p>

            <div class="m-3 text-center">
              <a href="{{url('/password')}}" class="btn btn-light px-3 button9">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
              </a>
            </div>
            <p class="text-light text-center">Ubah Password</p>
            @endif
        </div>
        <div class="col-lg-10 col-md-12 p-3 bg-white">
          <div class="container border rounded shadow p-2">
            @yield('content')
          </div>
        </div>
        <div class="container bg-warning">&nbsp;</div>
    </div>
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
    
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/fc-4.2.1/r-2.4.0/datatables.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#mustahik').DataTable({
        responsive: true
      });
      } );

      $(document).ready( function () {
          $('#users').DataTable({
            responsive: true
          });
      } );

      $(document).ready( function () {
          $('#pending').DataTable({
            responsive: true
          });
      } );
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

	for(var i=1;i<=9;i++){
    VanillaTilt.init(document.querySelector(".button"+i), {
		max: 25,
		speed: 400
	});
  }

  $('#kecamatan').on('change', function(){
    const kecamatan = $('#kecamatan').val();
    console.log(kecamatan);
    var bukitkapur = ["Bagan Besar","Bukit Kayu Kapur","Bukit Nenas","Gurun Panjang","Kampung Baru"];
    var dumaibarat = ["Bagan Keladi","Pangkalan Sesai","Purnama","Simpang Tetap Darul Ichsan"];
    var dumaikota = ["Bintan","Dumai Kota","Laksamana","Rimba Sekampung","Sukajadi"];
    var dumaiselatan = ["Bukit Datuk","Bukit Timah","Bumi Ayu","Mekar Sari","Ratu Sima"];
    var dumaitimur = ["Bukit Batrem","Buluh Kasap","Jaya Mukti","Tanjung Palas","Teluk Binjai"];
    var medangkampai = ["Guntung","Mundam","Pelintung","Teluk Makmur"];
    var sungaisembilan = ["Bangsal Aceh","Basilam Baru","Batu Teritip","Lubuk Gaung","Tanjung Penyembal"];

    if(kecamatan == 1){
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>')
      for(var i=0;i<bukitkapur.length;i++){
        var implode = bukitkapur[i].split(' ').join('-');
      $('#kelurahan').append("<option value="+implode+">"+bukitkapur[i]+"</option>");
      }
    } else if(kecamatan == 2){
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaibarat.length;i++){
        var implode = dumaibarat[i].split(' ').join('-');
      $('#kelurahan').append("<option value="+implode+">"+dumaibarat[i]+"</option>");
      }
    } else if(kecamatan == 3){
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaikota.length;i++){
        var implode = dumaikota[i].split(' ').join('-');
      $('#kelurahan').append("<option value="+implode+">"+dumaikota[i]+"</option>");
      }
    } else if(kecamatan == 4){
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaiselatan.length;i++){
        var implode = dumaiselatan[i].split(' ').join('-');
      $('#kelurahan').append("<option value="+implode+">"+dumaiselatan[i]+"</option>");
      }
    } else if(kecamatan == 5){
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaitimur.length;i++){
        var implode = dumaitimur[i].split(' ').join('-');
      $('#kelurahan').append("<option value="+implode+">"+dumaitimur[i]+"</option>");
      }
    } else if(kecamatan == 6){
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<medangkampai.length;i++){
        var implode = medangkampai[i].split(' ').join('-');
      $('#kelurahan').append("<option value="+implode+">"+medangkampai[i]+"</option>");
      }
    } else if(kecamatan == 7){
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<sungaisembilan.length;i++){
        var implode = sungaisembilan[i].split(' ').join('-');
      $('#kelurahan').append("<option value="+implode+">"+sungaisembilan[i]+"</option>");
      }
    } else {
      $('#kelurahan').empty().append('<option value="">- Pilih Kelurahan -</option>')
    }
});
$('#kecamatan1').on('blur', function(){
    const kecamatan1 = $('#kecamatan1').val();
    console.log(kecamatan1);
    var bukitkapur = ["Bagan Besar","Bukit Kayu Kapur","Bukit Nenas","Gurun Panjang","Kampung Baru"];
    var dumaibarat = ["Bagan Keladi","Pangkalan Sesai","Purnama","Simpang Tetap Darul Ichsan"];
    var dumaikota = ["Bintan","Dumai Kota","Laksamana","Rimba Sekampung","Sukajadi"];
    var dumaiselatan = ["Bukit Datuk","Bukit Timah","Bumi Ayu","Mekar Sari","Ratu Sima"];
    var dumaitimur = ["Bukit Batrem","Buluh Kasap","Jaya Mukti","Tanjung Palas","Teluk Binjai"];
    var medangkampai = ["Guntung","Mundam","Pelintung","Teluk Makmur"];
    var sungaisembilan = ["Bangsal Aceh","Basilam Baru","Batu Teritip","Lubuk Gaung","Tanjung Penyembal"];

    if(kecamatan1 == 1){
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>')
      for(var i=0;i<bukitkapur.length;i++){
        var implode = bukitkapur[i].split(' ').join('-');
      $('#kelurahan1').append("<option value="+implode+">"+bukitkapur[i]+"</option>");
      }
    } else if(kecamatan1 == 2){
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaibarat.length;i++){
        var implode = dumaibarat[i].split(' ').join('-');
      $('#kelurahan1').append("<option value="+implode+">"+dumaibarat[i]+"</option>");
      }
    } else if(kecamatan1 == 3){
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaikota.length;i++){
        var implode = dumaikota[i].split(' ').join('-');
      $('#kelurahan1').append("<option value="+implode+">"+dumaikota[i]+"</option>");
      }
    } else if(kecamatan1 == 4){
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaiselatan.length;i++){
        var implode = dumaiselatan[i].split(' ').join('-');
      $('#kelurahan1').append("<option value="+implode+">"+dumaiselatan[i]+"</option>");
      }
    } else if(kecamatan1 == 5){
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<dumaitimur.length;i++){
        var implode = dumaitimur[i].split(' ').join('-');
      $('#kelurahan1').append("<option value="+implode+">"+dumaitimur[i]+"</option>");
      }
    } else if(kecamatan1 == 6){
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<medangkampai.length;i++){
        var implode = medangkampai[i].split(' ').join('-');
      $('#kelurahan1').append("<option value="+implode+">"+medangkampai[i]+"</option>");
      }
    } else if(kecamatan1 == 7){
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>');
      for(var i=0;i<sungaisembilan.length;i++){
        var implode = sungaisembilan[i].split(' ').join('-');
      $('#kelurahan1').append("<option value="+implode+">"+sungaisembilan[i]+"</option>");
      }
    } else {
      $('#kelurahan1').empty().append('<option value="">- Pilih Kelurahan -</option>')
    }
});
</script>
  </body>
</html>