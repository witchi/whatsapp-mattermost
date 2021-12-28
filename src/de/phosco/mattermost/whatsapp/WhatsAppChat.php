<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class WhatsAppChat {

    private $chat;

    public function __construct(string $chatFile) {

        $this->chatDir = dirname($chatFile);
        $this->chat = $this->import($chatFile);
    }

    private function import(string $chatFile): array {

        $handle = fopen($chatFile, "r");

        $res = array();
        $post = null;

        while ($line = fgets($handle)) {

            // if line matches expression, new Post has been found
            $matches = array();
            if (preg_match('/(\d{2}\.\d{2}\.\d{2}), (\d{2}:\d{2}) - ([^:]*): (.*)/', $line, $matches) === 1) {

                if ($post !== null) {
                    $res[] = $post;
                }

                $day = $matches[1];
                $time = $matches[2];
                $user = $matches[3];
                $content = $matches[4];
                $post = new Post($day, $time, $user, $content);
                continue;
            }

            if ($post !== null) {
                $post->append($line);
            }
        }

        if ($post !== null) {
            $res[] = $post;
        }

        fclose($handle);
        return $res;
    }

    public function getPosts(): array {

        return $this->chat;
    }

    public function getMediaFolder(): string {

        return $this->chatDir;
    }
}
?>
