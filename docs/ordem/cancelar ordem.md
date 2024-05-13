# CANCELAR ORDEM CLIELO-LIO

## Cancelar ordem

Carncelar uma ordem criada na maquina cielo-lio.<br>

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

    $response = $CieloLioRemoto->cancelarOrdem($id);
    print_r($reponse);

```
