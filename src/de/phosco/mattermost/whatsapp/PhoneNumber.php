<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class PhoneNumber implements PostContent {

    private $number;

    public function __construct(string $number) {

        $this->number = $number;
    }

    public function getContent(): string {

        return $this->number;
    }
}
?>
