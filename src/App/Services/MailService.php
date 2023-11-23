<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class MailService
{
    private array $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=utf-8'
    ];
    public function __construct(
        private $subject,
        private $to,
        private $from,
        private $message
    ) {
        $this->headers[] = "To: $this->to";
        $this->headers[] = "From: $this->from";
    }
    public function formatHeader()
    {
        $formattedHeader = implode('\r\n', $this->headers);
        return $formattedHeader;
    }
    public function formatMessage()
    {
        $formattedMessage = wordwrap($this->message, 70);
        return $formattedMessage;
    }
    public function send()
    {
        mail($this->to, $this->subject, $this->formatMessage(), $this->formatHeader());
    }
    public function header()
    {
        return $this->formatHeader();
    }
}
