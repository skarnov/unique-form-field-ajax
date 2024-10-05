<?php
    error_reporting(E_ALL);
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "db_tests";
    $conn = new mysqli($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Ajax Form Field Unique</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="pt-3 pb-3" style="border-bottom: 1px solid black">Ajax Form Field Unique</h1>
                    <form>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <small id="emailHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" id="mobile" class="form-control">
                            <small id="mobileHelp" class="form-text"></small>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <nav class="navbar fixed-bottom">
            <?php
            if ($conn->connect_error) {
                ?>    
                <div class="alert alert-danger" role="alert">
                    <?php echo 'Connection is not Established' ?>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo 'Connection Established' ?>
                </div>
                <?php
            }
            ?>
        </nav>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(function () {
                $('#email').blur(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'emailCheck.php',
                        data: $('form').serialize(),
                        success: function (data)
                        {
                            $('#emailHelp').html(data);
                        }
                    });
                });
                $('#mobile').blur(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'mobileCheck.php',
                        data: $('form').serialize(),
                        success: function (data)
                        {
                            $('#mobileHelp').html(data);
                        }
                    });
                });
            });
        </script>
    </body>
</html>