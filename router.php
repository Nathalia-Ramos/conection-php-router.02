<?php
/**************
 * obejtivo : arquivo de rota para segmentar as açoes emcaminhadas pelo view(front-end)
 *    esse arquivo sera responsavel por encaminhar a solicitaçao para a controller
 * 
 * autor : marcus-spinder
 * 
 * data : 04/03/22
 * 
 * versao : 1.0
 * 
/***************/


$action = (string)null;
$componente = (string)null;




/*validando se o metodo do index é post ou get*/  /* o post vai pegar so os dados do usuario */  /*o get chamar a controller que tem aver com os dados do user (se ele quer insiri/deletar/ comer kkkkkk etc...)*/
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $componente = strtoupper($_GET['componente']);       
    $action = strtoupper($_GET['action']);


    //estrura condicional para avalidar quem esta solicitando  algo
       switch($componente){

            case 'CONTATOS' ;
               
              require_once('./controller/ControllerContatos.php');

                        if($action == 'INSERIR'){


                         $resposta =  inserirContatos($_POST);                                // esta colocando o return do inserirContatos na variavel %resposta

                               if(is_bool($resposta)){                                       // verificando se o return é booleano 
                                  echo("<script>
                                         alert('REGISTRO INSIRIDO COM SUCESSO');
                                         window.location.href = 'index.php';
                                         </script>");

                               }elseif(is_array($resposta)){                                      // (se nao) / verificando se o return é um arrey

                                echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back();
                                </script>");

                               }

                              break;
                        }
            
    }
}

?>