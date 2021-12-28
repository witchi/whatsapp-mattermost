<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class WhatsAppUserMap {

    private $map;

    public function __construct() {

        $this->map = array();
    }

    public function add(string $waUser, string $mmUser): void {

        $this->map[$waUser] = $mmUser;
    }

    public function get(string $waUser): ?string {

        if (isset($this->map[$waUser])) {
            return $this->map[$waUser];
        }
        throw new \InvalidArgumentException("Unknown user " . $waUser);
    }

    public function count(): int {

        return count($this->map);
    }
}
?>
