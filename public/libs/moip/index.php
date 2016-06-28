<?php

/**
  include_once 'examples.php';

  exampleBasicInstructions();
  exampleFull();
  exampleQueryParcels();
 * 
 */
include_once "autoload.inc.php";

$moip = new Moip();
$moip->setEnvironment('test');
$moip->setCredential(array(
    'key'   => 'XDHESTECLYOMABBAICPKHYVGTI5W5UWXR4FML4H5',
    'token' => 'MX21QGKCA4TMPS5F3HHCZYDYRYQMVO9M'
));

$moip->setUniqueID('ABC'.rand(10000,20000));
$moip->setValue('100.00');
$moip->setReason('Razão / Motivo do pagamento');

$moip->setPayer(array('name' => 'Nome Sobrenome',
    'email' => 'email@cliente.com.br',
    'payerId' => 'id_usuario',
    'billingAddress' => array('address' => 'Rua do Zézinho Coração',
        'number' => '45',
        'complement' => 'z',
        'city' => 'São Paulo',
        'neighborhood' => 'Palhaço Jão',
        'state' => 'SP',
        'country' => 'BRA',
        'zipCode' => '01230-000',
        'phone' => '(11)8888-8888')));
$moip->validate('Identification');

$moip->send();

$response = $moip->getAnswer()->response;
$error= $moip->getAnswer()->error;
$token = $moip->getAnswer()->token;
$payment_url = $moip->getAnswer()->payment_url;

//var_dump($response);
//var_dump($error);
var_dump($token);
var_dump($payment_url);

?>

<html>
    <head>
        <title>Checkout Transparente - Boleto</title>
        <meta name="author" content="Moip Pagamentos S/A" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

        <script type='text/javascript' src='https://desenvolvedor.moip.com.br/sandbox/transparente/MoipWidget-v2.js' charset='ISO-8859-1'></script>

        <script type="text/javascript">
            var funcaoSucesso = function(data){
                alert('Sucesso\n' + JSON.stringify(data));
                window.open(data.url);
            };

            var funcaoFalha = function(data) {
                alert('Falha\n' + JSON.stringify(data));
            };

            pagarBoleto = function() {
                var settings = {
                    "Forma": "BoletoBancario"
                }
                MoipWidget(settings);
            }
        </script>
    </head>
    <body>
        <div id="MoipWidget"
             data-token="<?php echo $token; ?>"
             callback-method-success="funcaoSucesso"
             callback-method-error="funcaoFalha">
         </div>
        <button id="pagarBoleto" onclick="pagarBoleto()"> Imprimir Boleto </button>
    </body>
    <script type='text/javascript' src='<?php echo $payment_url; ?>' charset=ISO-8859-1"></script>
</html>