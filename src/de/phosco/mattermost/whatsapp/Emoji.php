<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class Emoji implements PostContent {

    private $emoji;

    private $bin;

    public function __construct(string $emoji) {

        $this->emoji = $emoji;
        $this->bin = unpack('H*', $emoji);
        error_log("an Emoji " . $emoji . $this->bin[1]);
    }

    public function getContent(): string {

        return $this->emoji;
    }

    public function getBinary(): string {

        return $this->bin[1];
    }
}
?>
