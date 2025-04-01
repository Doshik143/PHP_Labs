<?php
namespace t5;
class Response {
    private $headers = [];
    private $statusCode = 200;
    /**
     * Встановлює HTTP-статус відповіді
     * @param int $code HTTP-код статусу
     */
    public function setStatus($code) {
        $this->statusCode = (int)$code;
        http_response_code($this->statusCode);
    }
    /**
     * Додає HTTP-заголовок до відповіді
     * @param string $header Рядок заголовка
     */
    public function addHeader($header) {
        $this->headers[] = $header;
    }
    /**
     * Надсилає відповідь з встановленими заголовками та вмістом
     * @param string $content Тіло відповіді
     */
    public function send($content) {
        if (ob_get_length() > 0) {
            ob_clean();
        }

        if (!headers_sent()) {
            foreach ($this->headers as $header) {
                header($header);
            }
        }

        echo $content;

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        }
    }
}