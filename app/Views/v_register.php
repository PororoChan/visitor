<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register | Stisla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/components.css') ?>">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url('public/assets/img/stisla-fill.svg') ?>" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary ">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div id="msg">

                            </div>
                            <div class="card-body">
                                <form id="form-regist" method="POST">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="uname">Username</label>
                                            <input id="uname" type="text" class="form-control" name="uname">
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm" class="d-block">Password Confirmation</label>
                                            <input id="confirm" type="password" class="form-control" name="confirm">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                                <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="button" id="btn-regist" class="btn btn-primary btn-lg btn-block">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/stisla.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#btn-regist').click(function() {
                var data = $('#form-regist').serialize();
                var msg = "";

                $('#btn-regist').html("<i class='fas fa-spinner fa-pulse text-white'>");

                $.ajax({
                    url: "<?= base_url('register/add') ?>",
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(res) {
                        msg = "Berhasil Register";
                        if (res.success == '1') {
                            $('#pesan').removeClass('alert alert-danger');
                            $('#pesan').addClass('alert alert-success');
                            window.location.href = "<?= base_url('login') ?>";
                        } else {
                            $('#pesan').addClass('alert alert-danger');
                            msg = "Data yang dimasukkan salah";
                        }

                        $('#uname').val("");
                        $('#password').val("");
                        $('#confirm').val("");
                        $('#pesan').html(msg);
                        $('#btn-regist').html("Register");
                    }
                })
            })
        })
    </script>
</body>

</html>