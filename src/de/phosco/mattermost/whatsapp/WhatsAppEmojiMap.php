<?php
declare(strict_types = 1);

namespace de\phosco\mattermost\whatsapp;

class WhatsAppEmojiMap {

    private $map;

    public function __construct() {

        $this->map = array();
        $this->add('f09fa5b6', ':cold_face:');
        $this->add('f09fa4a3', ':rolling_on_the_floor_laughing:');
        $this->add('f09fa493', ':nerd_face:');
        $this->add('f09f918d', ':+1:');
        $this->add('f09fa5b4', ':woozy_face:');
        $this->add('f09f988e', ':sunglasses:');
        $this->add('f09fa5ba', ':pleading_face:');
        $this->add('f09fa4af', ':exploding_head:');
        $this->add('f09fa4ac', ':face_with_symbols_on_mouth:');
        $this->add('f09fa4ae', ':face_vomiting:');
        $this->add('f09fa799', ':male_mage:');
        $this->add('f09fa5b3', ':partying_face:');
        $this->add('f09f9898', ':kissing_heart:');
        $this->add('f09f98a2', ':cry:');
        $this->add('f09f989f', ':worried:');
        $this->add('f09f9881', ':grin:');
        $this->add('f09f989c', ':stuck_out_tongue_winking_eye:');
        $this->add('f09f98a0', ':angry:');
        $this->add('f09f98a4', ':triumph:');
        $this->add('f09f98a1', ':rage:');
        $this->add('f09fa4a7', ':sneezing_face:');
        $this->add('f09f8db9', ':tropical_drink:');
        $this->add('f09fa5b0', ':smiling_face_with_3_hearts:');
        $this->add('f09f9882', ':joy:');
        $this->add('f09f92a9', ':hankey:');
        $this->add('f09fa5b1', ':yawning_face:');
        $this->add('f09fa494', ':thinking_face:');
        $this->add('f09fa9b3', ':shorts:');
        $this->add('f09f98ad', ':sob:');
        $this->add('f09fa5b5', ':hot_face:');
        $this->add('f09f92b8', ':money_with_wings:');
        $this->add('f09f989d', ':stuck_out_tongue_closed_eyes:');
        $this->add('f09f8db7', ':wine_glass:');
        $this->add('f09f909d', ':bee:');
        $this->add('f09fa582', ':clinking_glasses:');
        $this->add('f09f918c', ':ok_hand:');
        $this->add('f09f9889', ':wink:');
        $this->add('f09f9982', ':slightly_smiling_face:');
        $this->add('f09f91b9', ':japanese_ogre:');
        $this->add('f09f98b3', ':flushed:');
        $this->add('f09f9885', ':sweat_smile:');
        $this->add('f09f988f', ':smirk:');
        $this->add('f09f9984', ':face_with_rolling_eyes:');
        $this->add('f09f92aa', ':muscle:');
        $this->add('f09f998b', ':raising_hand:');
        $this->add('f09f9883', ':smiley:');
        $this->add('f09fa4a8', ':face_with_raised_eyebrow:');
        $this->add('f09fa4ad', ':face_with_hand_over_mouth:');
        $this->add('f09f989b', ':stuck_out_tongue:');
        $this->add('f09f98ac', ':grimacing:');
        $this->add('f09f90b0', ':rabbit:');
        $this->add('f09f918b', ':wave:');
        $this->add('f09f988a', ':blush:');
        $this->add('f09f998a', ':speak_no_evil:');
        $this->add('f09f9989', ':hear_no_evil:');
        $this->add('f09f9988', ':see_no_evil:');
        $this->add('f09f98a5', ':disappointed_relieved:');
        $this->add('f09f90b7', ':pig:');
        $this->add('f09fa790', ':face_with_monocle:');
        $this->add('f09f9888', ':smiling_imp:');
        $this->add('f09fa4ab', ':shushing_face:');
        $this->add('f09f9290', ':bouquet:');
        $this->add('f09f8c88', ':rainbow:');
        $this->add('f09fa595', ':carrot:');
        $this->add('f09fa5a6', ':broccoli:');
        $this->add('f09f8cbd', ':corn:');
        $this->add('f09fa4aa', ':zany_face:');
        $this->add('f09f91bf', ':imp:');
        $this->add('f09fa4b7', ':man-shrugging:');
        $this->add('f09f91a8', ':blond-haired-man:'); // ?
        $this->add('f09f94a7', ':wrench:');
        $this->add('f09f8d9e', ':bread:');
        $this->add('f09f9983', ':upside_down_face:');
        $this->add('f09f9aa6', ':traffic_light:');
        $this->add('f09f9a80', ':rocket:');
        $this->add('f09f90b6', ':dog:');
        $this->add('f09f98a8', ':fearful:');
        $this->add('f09f9895', ':confused:');
        $this->add('f09f98a9', ':weary:');
        $this->add('f09f9093', ':rooster:');
        $this->add('f09fa59a', ':egg:');
        $this->add('f09f98b1', ':scream:');
        $this->add('f09fa4a6', ':man-facepalming:');
        $this->add('f09f98a7', ':anguished:');
        $this->add('f09f9884', ':smile:');
        $this->add('f09f908c', ':snail:');
        $this->add('f09f8f83', ':runner:');
        $this->add('f09f918f', ':clap:');
        $this->add('f09f8dbe', ':champagne:');
        $this->add('f09f8dba', ':beer:');
        $this->add('f09f8dbb', ':beers:');
        $this->add('f09f8db8', ':cocktail:');
        $this->add('f09fa583', ':tumbler_glass:');
        $this->add('f09fa4a9', ':star-struck:');
        $this->add('f09f98b0', ':cold_sweat:');
        $this->add('f09f98b7', ':mask:');
        $this->add('f09fa492', ':face_with_thermometer:');
        $this->add('f09f908d', ':snake:');
        $this->add('f09f98af', ':hushed:');
        $this->add('f09f98aa', ':sleepy:');
        $this->add('f09fa495', ':face_with_head_bandage:');
        $this->add('f09f98ab', ':tired_face:');
        $this->add('f09fa4a0', ':face_with_cowboy_hat:');
        $this->add('f09fa792', ':child:');
        $this->add('f09fa793', ':older_adult:');
        $this->add('f09f9887', ':innocent:');
        $this->add('e298baefb88f', ':relaxed:');
        $this->add('e29895efb88f', ':coffee:');
        $this->add('e29b88efb88f', ':thunder_cloud_and_rain:');
        $this->add('e298b9efb88f', ':white_frowning_face:');
        $this->add('f09fa5b8', ':disguised_face:');
        $this->add('f09f9893', ':sweat:');
        $this->add('f09fa5b2', ':smiling_face_with_tear:');
        $this->add('f09f989a', ':kissing_closed_eyes:');
        $this->add('f09fa497', ':hugging_face:');
        $this->add('f09f9886', ':laughing:');
        $this->add('f09f9880', ':grinning:');
        $this->add('f09f9981', ':slightly_frowning_face:');
    }

    public function add(string $waEmoji, string $mmEmoji): void {

        $this->map[$waEmoji] = $mmEmoji;
    }

    public function get(string $waEmoji): ?string {

        if (isset($this->map[$waEmoji])) {
            return $this->map[$waEmoji];
        }
        throw new \InvalidArgumentException("Unknown emoji " . $waEmoji);
    }

    public function count(): int {

        return count($this->map);
    }
}
?>
