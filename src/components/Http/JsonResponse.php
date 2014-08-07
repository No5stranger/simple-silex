<?php
namespace Myele\Component\Http;

use Symfony\Component\HttpFoundation\JsonResponse as BaseJsonResponse;

class JsonResponse extends BaseJsonResponse
{
    public function setData($data = array())
    {
        if (is_bool($data)) {
            $data = ['status' => 'ok', 'data' => ['success' => $data]];
        } elseif ($this->getStatusCode() >= 200 && $this->getStatusCode() < 300) {
            $data = ['status' => 'ok', 'data' => $data];
        } else {
            $data = ['status' => 'error', 'data' => $data];
        }
        $this->setstatusCode(200);
        $this->data = json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
        return $this->update();
    }

    public function isSuccessful()
    {
        return json_encode($this->getContent())->status === 'ok';
    }
}
