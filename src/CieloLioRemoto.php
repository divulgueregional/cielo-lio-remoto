<?php

namespace Divulgueregional\cielolioremoto;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use JetBrains\PhpStorm\NoReturn;

class CieloLioRemoto
{
    protected $header;
    protected $headers;
    private $client;
    protected $optionsRequest = [];

    function __construct(array $config)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.cielo.com.br',
        ]);

        $this->optionsRequest = [
            'headers' => [
                'accept' => 'application/json',
                'client-id' => $config['client-id'],
                'access-token' => $config['access-token'],
                'merchant-id' => $config['merchant-id'],
                'Content-Type' => 'application/json',
            ],
        ];
    }

    ##############################################
    ######## ORDEM ###############################
    ##############################################
    public function criarOrdem($filter)
    {
        $options = $this->optionsRequest;
        $options['body'] = json_encode($filter);
        try {
            $response = $this->client->request(
                'POST',
                "/order-management/v1/orders",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao criar ordem: {$response}"];
        }
    }


    public function buscarOrdem(string $id)
    {
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/order-management/v1/orders/{$id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao buscar ordem: {$response}"];
        }
    }

    public function cancelarOrdem(string $id)
    {
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'DELETE',
                "/order-management/v1/orders/{$id}",
                $options
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao cancelar ordem: {$response}"];
        }
    }

    public function listarOrdem($filters)
    {
        $options = $this->optionsRequest;
        $options['query'] = $filters;
        try {
            $response = $this->client->request(
                'GET',
                "/order-management/v1/orders",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            // return $statusCode;
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao listar os pagamentos: {$response}"];
        }
    }
}
