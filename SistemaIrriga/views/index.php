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
            <center>
                <div class="section"></div>
                <div class="container" >
                    <nav class=" red darken-4 z-depth-3">
                        <div class="nav-wrapper">
                            <a href="index.html" class="brand-logo center">Sistema Irriga</a>
                        </div>
                    </nav>
                    <div class="section">
                        <div class="nav-wrapper">
                            <h4 class="brand-logo center">Cadastro de Dados</h4>
                        </div>
                    </div>
                    <div class="z-depth-1 grey lighten-4 row">
                        <form class="col s12 login-form" method="post" action="../controller/controla.php">
                            <div class='row'>
                                <div class='col s12'>
                                </div>
                            </div>
                            <input type="hidden" name="operacao" value="incluir"/>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <select name="estacao_id" required="required">
                                        <option value="" disabled selected>Estação</option>
                                            <?php
                                                include "../dao/Estacoes.php";
                                                $estacoes = new Estacoes;
                                                $resultado = $estacoes->mostrarEstacoes();
                                                if($resultado){
                                                    while($linha=mysqli_fetch_assoc($resultado)){
                                                        $nome=$linha['nome']; 
                                                        $estacao_id=$linha['id'];?>
                                                            <option value="<?php echo $estacao_id ?>"><?php echo $nome; ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>    
                                    </select>                                            
                                </div>
                            <div class="col s2"></div>
                            </div> 
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8">
                                    <i class="material-icons prefix">blur_on</i>
                                    <input id="temperatura" type="number" class="validate" name="temperatura" required="required">
                                    <label for="icon_prefix">Temperatura</label>
                                </div>
                                <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">beach_access</i>
                                    <input id="velocidade_vento" type="number" class="validate" name="velocidade_vento" required="required">
                                    <label for="icon_telephone">Velociade do Vento</label>
                                </div>
                            <div class="col s2"></div>
                            </div>
                            <div class="row">
                                <div class="col s2"></div>
                                <div class="input-field col s12 m6 l8 ">
                                    <i class="material-icons prefix">ac_unit</i>
                                    <input id="umidade" type="number" class="validate" name="umidade" required="required">
                                    <label for="icon_telephone">Umidade</label>
                                </div>
                            <div class="col s2"></div>
                            </div>                               
                            <center>                                
                                <div class='row'>
                                    <div class="col s2 offset-s5">
                                        <button type='submit' name='incluir' name="incluir" class='col s12 btn btn-small waves-effect waves-light btn'>Cadastrar</button>   
                                    </div>                                   
                                </div>
                            </center>                                                                                                                     
                        </form>
                    </div>
                </div>
            </center>
</div>

    </body>
</html>