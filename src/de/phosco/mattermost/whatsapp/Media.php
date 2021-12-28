<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class Media implements PostContent {

    private $link;

    public function __construct(string $link) {

        $this->link = $link;
    }

    public function getContent(): string {

        return $this->link;
    }
}
?>
