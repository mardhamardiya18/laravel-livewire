<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Comment Livewire</title>
    @livewireStyles
    @livewireScripts
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>

  <nav class="nav d-flex justify-content-center">
    <a class="nav-link" href="/">DATA</a>
    <a class="nav-link " href="/comment">COMMENT</a>
  </nav>

    <div class="container pt-5">
      <div class="row">
        <div class="col-md-5">
          @livewire('tikets')
        </div>
        <div class="col-md-7">
          @livewire('index-comments')
        </div>
      </div>
    </div>
   
    

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        window.addEventListener('swal:modal', event =>{
          swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
          });
        });
      </script>
</body>
</html>