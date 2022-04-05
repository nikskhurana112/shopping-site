<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <form action="{{route('contact.create')}}" id="myform" method="POST">
            <div class="row">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="col-md-12">
                    <label for="">Age</label>
                    <input type="number" class="form-control" name="age">
                </div>


                <div class="col-md-12">
                    <label for="">phone</label>
                    <input type="tel" name="phone" maxlength="10" minlength="10" class="form-control">
                </div>

           


                <div class="col-md-12 mt-2">
                    <button class="g-recaptcha btn btn-primary" 
                            data-sitekey="6LfqXGEdAAAAAKgZzWNEmuPbUXVz3CSoHd4PnS9k" 
                            data-callback='myCapReady' 
                            data-action='submit'>Submit</button>
                            
                </div>

            </div>
        </form>
    </div>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function myCapReady(token) {
          document.getElementById("myform").submit();
        }
      </script>
     
</body>

</html>