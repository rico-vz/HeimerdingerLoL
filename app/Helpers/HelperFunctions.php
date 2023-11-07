<?php

function getRoleIcon($roleName)
{
    $roleIcons = [
        'Toplane' => 'gm-top.png',
        'Jungle' => 'gm-jungle.png',
        'Midlane' => 'gm-mid.png',
        'Botlane' => 'gm-bot.png',
        'Support' => 'gm-support.png',
    ];

    return asset('img/' . $roleIcons[$roleName]);
}
