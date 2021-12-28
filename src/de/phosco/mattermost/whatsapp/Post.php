<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class Post {

    private $day;

    private $time;

    private $user;

    private $content;

    public function __construct(string $day, string $time, string $user, string $content) {

        $this->day = $day;
        $this->time = $time;
        $this->user = $user;
        $this->content = $this->processContent($content);
    }

    private function processContent(string $content): array {

        $res = array();
        foreach ($this->splitOnEmoji($content) as $entry) {

            if ($entry instanceof Text) {
                $res = array_merge($res, $this->stripMedia($entry));
                continue;
            }

            $res[] = $entry;
        }
        return $res;
    }

    private function splitOnEmoji(string $content): array {

        $res = array();

        $c = preg_replace('/\xf0\x9f\x8f\xbb|\xf0\x9f\x8f\xbc/', '', $content); // sex and skin color
        $c = preg_replace('/\xe2.{2}\xe2.{2}\xef.{2}/', '', $c);

        $parts = preg_split('/(\xf0\x9f.{2}|\xe2.{2}\xef.{2})/', $c, 2, PREG_SPLIT_DELIM_CAPTURE);
        if (count($parts) > 1) {
            $res[] = new Text($parts[0]);
            $res[] = new Emoji($parts[1]);
            $res = array_merge($res, $this->splitOnEmoji($parts[2]));
        } else {
            $parts = preg_split('/\@([0-9]{12,}) /', $c, 2, PREG_SPLIT_DELIM_CAPTURE);
            if (count($parts) > 1) {
                $res[] = new Text($parts[0]);
                $res[] = new PhoneNumber($parts[1]);
                $res = array_merge($res, $this->splitOnEmoji($parts[2]));
            } else {
                $res[] = new Text($c);
            }
        }

        return $res;
    }

    private function stripMedia(Text $content): array {

        $matches = array();
        if (preg_match('/(.*)\xe2\x80\x8e([^\s]*) \(.*\)/', $content->getContent(), $matches) === 1) {

            $res = array();
            if (!empty($matches[1])) {
                $res[] = new Text($matches[1]);
            }
            $res[] = new Media($matches[2]);
            return $res;
        }

        return array($content);
    }

    public function append(string $line) {

        $c = $this->processContent($line);
        $this->content = array_merge($this->content, array(new Text("\n")), $c);
    }

    public function getDay() {

        return $this->day;
    }

    public function getTime() {

        return $this->time;
    }

    public function getUser() {

        return $this->user;
    }

    public function getContent() {

        return $this->content;
    }
}
?>
