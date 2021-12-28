#!/usr/bin/php
<?php
declare(strict_types = 1);

use de\phosco\mattermost\whatsapp\WhatsAppChat;
use de\phosco\mattermost\whatsapp\JsonLConverter;
use de\phosco\mattermost\whatsapp\WhatsAppUserMap;
use de\phosco\mattermost\whatsapp\WhatsAppPhoneMap;
use de\phosco\mattermost\whatsapp\WhatsAppEmojiMap;

require_once __DIR__ . "/../vendor/autoload.php";

function write2disk(string $file, string $json): void {

    $handle = fopen($file, "w");
    fputs($handle, $json);
    fclose($handle);
}

$user = new WhatsAppUserMap();
$user->add("André Rothe", "myuser");
// TODO: add more users here

$phone = new WhatsAppPhoneMap();
$phone->add("491635552056", "myuser");
// TODO: add more phone numbers here

$json = (new JsonLConverter("my-team", "town-square"))->toJsonL($user, $phone, new WhatsAppEmojiMap(),
        new WhatsAppChat("/path/to/WhatsAppChat.txt"));

write2disk("/path/to/data.jsonl", $json);

?>
