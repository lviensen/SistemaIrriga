<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <script>
            $(document).ready(function () {
                $('select').material_select();
            });
        </script>
    </head>
    <body class="grey lighten-2">
        <?php include "aviso.php"; ?>
        <div class="row">
                <div class="navbar-fixed">
            <nav class="red darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="dados.php" class="brand-logo" style="margin-left: 5%;">Sistema Irriga</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="index.php"><i class="material-icons right">add</i>Cadastro</a></li>
                    <li><a href="dados.php"><i class="material-icons right">personal_video</i>Dados</a></li>
                  </ul>
                </div>
            </nav>
        </div>
            <center>
                <div class="section"></div>
                <div class="container" >
                    <div class="section">
                        <div class="nav-wrapper">
                            <h4 class="brand-logo center">Alteração de Dados</h4>
                        </div>
                    </div>
                    <div class="z-depth-1 grey lighten-4 row">
                        <form class="col s12 login-form" method="post" action="../controller/controla.php">
                            <div class='row'>
                                <div class='col s12'>
                                </div>
                            </div>
                            <input type="hidden" name="operacao" value="alterar"/>
                            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8">
                                    <i class="material-icons prefix">location_on</i>
                                    <input id="nome" type="text" class="validate" name="nome" required="required" value="<?php echo $_POST['nome'] ?>" >
                                    <label for="icon_prefix">Estação</label>
                                </div>
                                <div class="col s2"></div>
                            </div>
                            <?php
                                include "../dao/Dados.php";
                                
                                $dados = new Dados;
                                $resultado = $dados->mostrarDadosAlterar($_POST['id']);
                                
                                if($resultado){
                                    while($linha=mysqli_fetch_assoc($resultado)){
                                        $id = $linha['id'];
                                        $temperatura = $linha['temperatura'];
                                        $velocidade_vento = $linha['velocidade_vento'];
                                        $umidade = $linha['umidade'];
                                    }
                                }

                            ?> 
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8">
                                    <i class="material-icons prefix">blur_on</i>
                                    <input id="temperatura" type="number" class="validate" name="temperatura" required="required" value="<?php echo $temperatura ?>">
                                    <label for="icon_prefix">Temperatura</label>
                                </div>
                                <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">beach_access</i>
                                    <input id="velocidade_vento" type="number" class="validate" name="velocidade_vento" required="required" value="<?php echo $velocidade_vento ?>">
                                    <label for="icon_telephone">Velociade do Vento</label>
                                </div>
                            <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">ac_unit</i>
                                    <input id="umidade" type="number" class="validate" name="umidade" required="required" value="<?php echo $umidade ?>">
                                    <label for="icon_telephone">Umidade</label>
                                </div>
                            <div class="col s2"></div>
                            </div>                               
                            <center>                                
                                <div class='row'>
                                    <div class="col s2 offset-s5">
                                        <button type='submit' name='alterar' name="alterar" class='col s12 btn btn-small waves-effect waves-light btn'>Alterar</button>   
                                    </div>                                   
                                </div>
                            </center>                                                                                                                     
                        </form>
                        <div class='divider'></div>
                          <form method='post' action='../controller/controla.php'>
                            <input type='hidden' name='operacao' value='excluir'/>  
                            <input type='hidden' name='id' value="<?php echo $_POST['id'] ?>">
                            <div class='col-md-4'>    
                              <button class='btn waves-effect waves-light red' type='submit' name='action'>Excluir aula
                                <i class='material-icons right'>delete</i>
                              </button>
                            </div>  
                          </form>
                        </div> 
                    </div>
                </div>
            </center>
</div>

    </body>
</html>