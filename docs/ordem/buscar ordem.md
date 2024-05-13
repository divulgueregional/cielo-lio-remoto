# VUSCAR ORDEM CLIELO-LIO

## Buscar ordem

Buscar uma ordem criada na maquina cielo-lio através do id.<br>
essa consulta possibilita ver quando o pagament foi realizado.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\CieloLioRemoto\CieloLioRemoto;

    $config = [
        'client-id' = '',
        'access-token' = '',
        'merchant-id' = '',
    ];
    $CieloLioRemoto =  new CieloLioRemoto($config);

    $id = '';//id gerado ao criar a ordem

    $response = $CieloLioRemoto->buscarOrdem($id);
    print_r($reponse);

```
