<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript">
          $(".button-collapse").sideNav();
          $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
          });
        </script>
        <script type="text/javascript" src="../js/javascriptPesquisar.js"></script>
        <style>
          #botaoVisualizar{
            border: none;
          }
        </style>
    </head>
    <body class="grey lighten-2">
        <div class="navbar-fixed">
            <nav class="red darken-4 z-depth-3">
                <div class="nav-wrapper">
                  <a href="dados.php" class="brand-logo" style="margin-left: 5%;">Sistema Irriga</a>
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php"><i class="material-icons right">add</i>Cadastro</a></li>
                    <li class="active"><a href="dados.php"><i class="material-icons right">personal_video</i>Dados</a></li>
                  </ul>
                </div>
            </nav>
        </div>
        <div class="divider"></div>
        <div class="section">
            <div class="nav-wrapper">
                <h4 class="brand-logo center">Dados Coletados</h4>
            </div>
        </div>
        <div class="container">
          <div class="section">
            <div class="row">
              <div class="col-md-12">
                <ul class="collection with-header">
                  <div class="divider"></div>
                  <div class="container">
                    <div class="section">
                      <div class="row">
                        <div class="col-md-12">
                          <ul class="collection with-header">
                      <ul class='resultado'><br>        
                      </ul>
                      <div class="divider"></div>
                      <div class="divider"></div>
                            <?php
                              include "../dao/Estacoes.php";
                              
                              $estacoes = new Estacoes;
                              
                              $resultado = $estacoes->mostrarEstacoes();
                              
                              if($resultado){
                                while($linha=mysqli_fetch_assoc($resultado)){ ?><?php 
                                  $nome=$linha['nome'];
                                  $id=$linha['id']; ?>

                                  <form method="post" action="./dadosEstacao.php">
                                    <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <li class="collection-item"><div><?php echo $nome; ?><button type="submit" id="botaoVisualizar"  class="secondary-content tooltipped white" data-position="bottom" data-delay="50" data-tooltip="Ver Professores"><i class="material-icons orange-text">visibility</i> </button></div></li></form><?php                        
                                }
                              }
                              ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                    <!--<table class="bordered">
                      <thead>
                        <tr>
                            <th>Estação</th>
                            <th>Temperatura</th>
                            <th>Velocidade Vento</th>
                            <th>Umidade</th>
                            <th>Data</th>
                            <th>Opções</th>
                        </tr>
                      </thead>
                      <?php
                        //include "../dao/Dados.php";
                        
                        //$dados = new Dados;
                        
                        //$resultado = $dados->mostrarDados();
                        
                        //if($resultado){
                          //while($linha=mysqli_fetch_assoc($resultado)){  
                            //$nome=$linha['nome'];
                            //$id=$linha['id']; 
                            //$temperatura=$linha['temperatura'];
                            //$velocidade_vento=$linha['velocidade_vento'];
                            //$umidade=$linha['umidade'];
                            //$data=$linha['data'];

                            ?>
                            <tbody>
                              <tr>
                                <td><?php //echo $nome; ?></td>
                                <td><?php //echo $temperatura; ?></td>
                                <td><?php //echo $velocidade_vento; ?></td>
                                <td><?php //echo $umidade; ?></td>
                                <td><?php //echo $data; ?></td>
                                <td><?php //echo $temperatura; ?></td>
                              </tr>
                              
                            </tbody>    <?php                        
                            //}
                            //}
                      ?> -->

                    </table>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>