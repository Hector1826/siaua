<body class="hold-transition sidebar-mini">
    <!-- Main content -->
    <div class="card card-navy">
        <section class="content login-page">

            <!-- Default box -->
            <div class="card card-navy">
                <div class="card-header"> </div>
                <div class="card-body row">
                    <div class="col-7 text-center d-flex align-items-center justify-content-center">
                        <img src="public/assets/img/logo_siaua.png" alt="IMG SIAUA" class="product-image">
                    </div>
                    <div class="col-5 justify-content-center">
                        <h2 class="text-center mb-3 mt-5"><strong>S I A U A</strong></h2>
                        <hr>
                        <form id="formLogin" name="formLogin" action="#" method="post" autocomplete="off">

                            <label class="mt-4" for="txt_user">Ingresa tu nombre de usuario: </label>

                            <div class="input-group mb-4 mt-1">
                                <input id="txt_user" name="txt_user" type="text" class="form-control"
                                    placeholder="Usuario" autocomplete="FALSE" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <label for="txt_user">Ingresa tu contraseña: </label>
                            <div class="input-group mb-5 mt-1">
                                <input id="txt_pass" name="txt_pass" type="password" class="form-control"
                                    placeholder="Contraseña" autocomplete="FALSE" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-12">
                                    <button onclick="simularAcceso(false)" type="submit" class="btn btn-block btn-outline-primary">Ingresar</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer"> </div>
            </div>


        </section>
    </div>
    <!-- /.content -->
    <script type="text/javascript" src="app/view/scripts/usuario.js"></script>