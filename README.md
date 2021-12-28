# whatsapp-mattermost
Converts a _Whatsapp_ chat into _Matterpost_ posts. It is a quick-and-dirty try, feel free to enhance it.


1. Export the _Whatsapp_ chat with media to a filesystem, which this tool can reach. The chat content will be stored as text file together with the media into a folder.

2. Before you can execute the tool, you have to setup the user/phone list for the current _Whatsapp_ chat.

```bash
cd whatsapp-mappermost
vim ./src/convert.php
```

Add new **user mapping** at line 21:

```php
$user->add("my Whatsapp user", "my Mattermost user");
$user->add("another Whatsapp user", "another Mattermost user");
```

The _Whatsapp_ user name you can find within the exported text file of the chat.

3. Often you refer some other chat members within a _Whatsapp_ post by the "@" sign. These references are made by the telephone number of the referenced user. So you have to add all the **telephone numbers** of the chat members at line 26:

```php
$phone->add("491635552056", "my Mattermost user");
$phone->add("491635552057", "another Mattermost user");
```

You have to look into the _Whatsapp_ chat, how the telephone numbers are used there. Within my chats they start with the **contry code** (49), followed by the **net code** (163), followed by the **user number** (5552056). Add the numbers exactly as defined within the chat export.

4. Change the _Mattermost_ **team name** and **channel name** at line 28 and modify the path the _Whatsapp_ chat on line 29.

5. Change the **destination path** for the `data.json` file, which the converter will generate at line 31.

6. Execute the tool with

```bash
cd whatsapp-mattermost
php ./src/convert.php
```

It writes some hints into the error log and stops on an error like "unknown user" or "unknown telephone number". Correct the errors within ./src/convert.php and try it again.

###Emojis

_Mattermost_ uses others Emoji names as _Whatsapp_. Within the _Whatsapp_ chat you can find Emojis as Unicode character sequence. A lot of Emoji mappings you can already find within the class `WhatsAppEmojiMap`. 

If your chat contains unmapped Emojis, you can use the error log of this tool (there you can see the Unicode sequence) and compare the associated _Whatsapp_ image of the Emoji with the _Mattermost_ Emoji images to find the `:emoji-name:`. Then add a new mapping like in `WhatsAppEmojiMap` and restart the converter tool.