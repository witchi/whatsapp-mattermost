<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class Text implements PostContent {

    private $text;

    public function __construct(string $text) {

        $this->text = $text;
    }

    public function getContent(): string {

        return $this->text;
    }
}
?>
