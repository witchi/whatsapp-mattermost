<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class JsonLConverter {

    private $team;

    private $channel;

    public function __construct(string $team, string $channel) {

        $this->team = $team;
        $this->channel = $channel;
    }

    public function toJsonL(WhatsAppUserMap $userMap, WhatsAppPhoneMap $phoneMap, WhatsAppEmojiMap $emojiMap,
            WhatsAppChat $chat): string {

        $json = array(array("type" => "version", "version" => 1));
        $template = array("type" => "post", "post" => array("team" => $this->team, "channel" => $this->channel));

        foreach ($chat->getPosts() as $post) {

            $jsonPost = $template;
            $jsonPost["post"]["user"] = $userMap->get($post->getUser());

            $msg = "";
            foreach ($post->getContent() as $content) {
                if ($content instanceof Text) {
                    $msg .= $content->getContent();
                }
                if ($content instanceof Emoji) {
                    $msg .= ($this->endsWith($msg, " ") ? "" : " ") . $emojiMap->get($content->getBinary()) . " ";
                }
                if ($content instanceof PhoneNumber) {
                    $msg .= ($this->endsWith($msg, " ") ? "" : " ") . '@' . $phoneMap->get($content->getContent()) .
                            " ";
                }
            }

            $jsonPost["post"]["message"] = $msg;
            $jsonPost["post"]["create_at"] = $this->toUnixTime($post->getDay(), $post->getTime());

            $media = array();
            foreach ($post->getContent() as $content) {

                if ($content instanceof Media) {
                    $media[] = array("path" => $chat->getMediaFolder() . "/" . $content->getContent());
                }
            }
            if (count($media) > 0) {
                $jsonPost["post"]["attachments"] = $media;
            }

            $json[] = $jsonPost;
        }

        $res = "";
        foreach ($json as $obj) {
            $res .= "\n" . json_encode($obj);
        }

        return substr($res, 1);
    }

    private function endsWith(string $haystack, string $needle): bool {

        $length = strlen($needle);
        if (!$length) {
            return true;
        }
        return substr($haystack, -$length) === $needle;
    }

    private function toUnixTime(string $day, string $time): int {

        // dd.mm.yy hh:mi -> Y-m-d H:i:s
        $val = "20" . substr($day, 6, 2) . "-" . substr($day, 3, 2) . "-" . substr($day, 0, 2) . " " . $time . ":00";
        // error_log("$day $time -> $val");
        return strtotime($val) * 1000;
    }
}
?>
