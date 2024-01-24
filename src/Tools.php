<?php
namespace NFHub\SpedNfse;

use Exception;
use NFHub\Common\Tools as ToolsBase;

/**
 * Classe Tools
 *
 * Classe responsável pela implementação com a API de SpedNfse do NFHub
 *
 * @category  NFHub
 * @package   NFHub\SpedNfse\Tools
 * @author    Gisele Mendes <gi dash mendes dot ap at hotmail dot com>
 * @copyright 2024 NFSERVICE
 * @license   https://opensource.org/licenses/MIT MIT
 */
class Tools extends ToolsBase
{
    /**
     * Calcula os totais de uma NFSe
     */
    function calculaNfse(string $company_cnpj, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post('/invoice-services/calculate', $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Transmite uma NFSe
     */
    function transmiteNfse(string $company_cnpj, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post('/invoice-services', $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Consulta uma NFSe
     */
    function consultaNfse(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->get("/invoice-services/$id", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca a DANFSe de uma NFSe
     */
    function imprimeNfse(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoice-services/$id/danfse", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca o XML de uma NFSe
     */
    function xmlNfse(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoice-services/$id/xml", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Realiza o cancelamento de uma NFSe
     */
    function cancelNfse(string $company_cnpj, int $id, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post("/invoice-services/$id/cancel", $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca o DANFSe com a marcação de cancelamento
     */
    function imprimeNfseCancel(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoice-services/$id/cancel/danfse", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca o RPS (Recibo Provisório de Serviço) da NFSe em processamento
     */
    function imprimeRps(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoice-services/$id/rps/pdf", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Consulta a homologação do município para saber se está disponível a emissão da NFSe e suas particularidades
     */
    function consultaHomologacaoNfse(string $company_cnpj, int $city_id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoice-services/cities/$city_id", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }
}
