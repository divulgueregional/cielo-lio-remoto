# CRIAR ORDEM CLIELO-LIO

## Criar ordem

Gerar uma ordem e vai aparecer como pedido na maquina cielo-lio.<br>

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\CieloLioRemoto\CieloLioRemoto;

    $config = [
        'client-id' = '',
        'access-token' = '',
        'merchant-id' = '',
    ];
    $CieloLioRemoto =  new CieloLioRemoto($config);

    $hoje = date('Y-m-d');
    $hora = date('H:i:s');
    $filter = [
        'id' => $dados->fatura_id,//id do documento
        'number' => $dados->fatura_id,//numero documento
        'reference' => "fatura {$dados->fatura_id}",//referente do documento
        'status' => "ENTERED",
        'created_at' => "{$hoje}T{$hora}.824Z",
        'updated_at' => "{$hoje}T{$hora}.824Z",
        'items' => [
            [
                "sku" => "string",
                "skuType" => "string",
                "name" => "conbrança pdv",
                "description" => "conbrança pdv",
                "unit_price" => $dados->valor,//valor sem ponto 1 real = 100
                "quantity" => 1,
                "unit_of_measure" => "EACH",
                "details" => "string",
                "created_at" => "{$hoje}T{$hora}.824Z",
                "updated_at" => "{$hoje}T{$hora}.824Z"
            ]
        ],
        'notes' => "string",
        "transactions" => [
            [
                "id" => "string",
                "transaction_type" => "PAYMENT",
                "status" => "CONFIRMED",
                "description" => "string",
                "terminal_number" => 2,
                "card" => [
                    "brand" => "",//"VISA"
                    "bin" => 0,
                    "last" => 0
                ],
                "number" => 0,
                "authorization_code" => 0,
                "payment_product" => [
                    "number" => 0,
                    "name" => "string",
                    "sub" => [
                        "number" => 0,
                        "name" => "string"
                    ]
                ],
                "amount" => "string",
                "created_at" => "{$hoje}T{$hora}.824Z",
                "updated_at" => "{$hoje}T{$hora}.824Z"
            ]
        ],
        "price" => $dados->valor,
        "remaining" => 0
    ];

    $response = $CieloLioRemoto->criarOrdem($filter);
    print_r($reponse);

```
