<?php
    session_start();

    if(!isset($_SESSION['$saida1'])){
        $_SESSION['$saida1'] = 0;
    }

    if(!isset($_SESSION['$saida2'])){
        $_SESSION['$saida2'] = 0;
    }

    if(!isset($_SESSION['$saida3'])){
        $_SESSION['$saida3'] = 0;
    }
    if(!isset($_SESSION['$saida4'])){
        $_SESSION['$saida4'] = 0;
    }

    if(!isset($_SESSION['$W1'])){
        $_SESSION['$W1'] = null;
    }

    if(!isset($_SESSION['$W2'])){
        $_SESSION['$W2'] = null;
    }
    if(!isset($_SESSION['$b'])){
        $_SESSION['$b'] = null;
    }

    if(!isset($_SESSION['net'])){
        $_SESSION['net'] = null;
    }

?>

<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="utf-8">
        <title>Regra de Hebb</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container h-100">
			<div class="row justify-content-center">
				<form class="form-horizontal" enctype="multipart/form-data" action="treinar.php" method="POST">
				    <div class="form-group text-center">
                        <br>
						<h2>Regra de Hebb<h2>
				    </div>
                    <div class="row">
                        <div class="form-group col-md-6 text-center">
                            <div class="col text-center h4">
                                Tabela Verdade
                            </div>

                            <div class="col">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>X1</th>
                                            <th>X2</th>
                                            <th>Y</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <input class="form-check-input" type="checkbox" disabled> </td>
                                            <td> <input class="form-check-input" type="checkbox" disabled> </td>
                                            <td> <input class="form-check-input" name="saida1" type="checkbox" <?php if($_SESSION['$saida1'] == 1) { echo "checked='checked'";} ?> value="1"> <br></td>
                                        </tr>
                                        <tr>
                                            <td> <input class="form-check-input" type="checkbox" disabled> </td>
                                            <td> <input class="form-check-input" type="checkbox" checked="checked" disabled> </td>
                                            <td> <input class="form-check-input" name="saida2" type="checkbox" <?php if($_SESSION['$saida2'] == 1) { echo "checked='checked'";} ?> value="1"> <br></td>
                                        </tr>
                                        <tr>
                                            <td> <input class="form-check-input" type="checkbox" checked="checked" disabled> </td>
                                            <td> <input class="form-check-input" type="checkbox" disabled> </td>
                                            <td> <input class="form-check-input" name="saida3" type="checkbox" <?php if($_SESSION['$saida3'] == 1) { echo "checked='checked'";} ?> value="1"> <br></td>
                                        </tr>
                                        <tr>
                                            <td> <input class="form-check-input" type="checkbox" checked="checked" disabled> </td>
                                            <td> <input class="form-check-input" type="checkbox" checked="checked" disabled> </td>
                                            <td> <input class="form-check-input" name="saida4" type="checkbox" <?php if($_SESSION['$saida4'] == 1) { echo "checked='checked'";} ?> value="1"> <br></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group col-md-6 text-center">

                            <div class="form-group col-md-12 text-center">
                                <div class="col text-center h4">
                                    Peso
                                </div>

                                <div class="col">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>W1</th>
                                                <th>W2</th>
                                                <th>B</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <input class="form-control" type="text" value=" <?php echo $_SESSION['$W1']; ?> "> </td>
                                                <td> <input class="form-control" type="text" value=" <?php echo $_SESSION['$W2']; ?> "> </td>
                                                <td> <input class="form-control" type="text" value=" <?php echo $_SESSION['$b']; ?> "> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>
                            <div class="form-group col-md-12 text-center">
                                <div class="col text-center h4">
                                    Teste
                                </div>

                                <div class="col">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <b>Y</b> </td>
                                                <td> <input class="form-control" type="text" value=" <?php echo $_SESSION['net'][0]; ?> "> </td>
                                                <td> <input class="form-control" type="text" value=" <?php echo $_SESSION['net'][1]; ?> "> </td>
                                                <td> <input class="form-control" type="text" value=" <?php echo $_SESSION['net'][2]; ?> "> </td>
                                                <td> <input class="form-control" type="text" value=" <?php echo $_SESSION['net'][3]; ?> "> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success">Treinar</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
    </body>
</html>

<?php session_destroy(); ?>
