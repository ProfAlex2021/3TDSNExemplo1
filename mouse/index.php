<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exemplo 3TDSN - ETEC FP</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS do site -->
    <link href="../css/site.css" rel="stylesheet">

    <!-- Bootstrap core JS -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- JS para trabalhar com o formulário -->
    <script src="../js/mouse.js"></script>
</head>

<body>

    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Mouse</a>
                    </li>
                </ul>
            </nav>
            <h3 class="text-muted">Exemplo 3TDSN</h3>
        </div>



        <div class="row marketing">
            <div>
                <form>
                    <div class="form-group row">
                        <label class="col-1"></label>
                        <div class="col-8">
                            <input id="botoes" name="botoes" placeholder="Botões" type="number" min="3" max="15" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1"></label>
                        <div class="col-8">
                            <input id="marca" name="marca" placeholder="Marca" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1"></label>
                        <div class="col-8">
                            <input id="modelo" name="modelo" placeholder="Modelo" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1"></label>
                        <div class="col-8">
                            <input id="cor" name="cor" placeholder="Cor" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1"></label>
                        <div class="col-8">
                            <input id="formato" name="formato" placeholder="Formato" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4"></div>
                        <div class="col-8">
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-checkbox">
                                    <input name="cabo" id="cabo" type="checkbox" checked="checked" class="custom-control-input" value="1">
                                    <label for="cabo" class="custom-control-label">Cabo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4"></div>
                        <div class="col-8">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="wireless" id="wireless" type="checkbox" class="custom-control-input" value="1">
                                <label for="wireless" class="custom-control-label">Wireless</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" id="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="footer">
            <p>© Etec Fernando Prestes 2021</p>
        </footer>

    </div> <!-- /container -->


</body>

</html>