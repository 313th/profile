<?php

return[
    "groups" =>[
        [
            "name" => "profile",
            "title" => "کاربران",
            "icon" => "users",
            "arrangement" => "2",
            "permissions" => "profile.view|profile.create|profile.update|profile.delete",
            "items" => [
                [
                    "name" => "profile.view",
                    "title" => "همه کاربران",
                    "icon" => "circle-o",
                    "arrangement" => "1",
                    "permissions" => "profile.view|profile.create|profile.update|profile.delete",
                    "route" => "admin.profile.index",
                ],
                [
                    "name" => "profile.create",
                    "title" => "کاربر جدید",
                    "icon" => "circle-o",
                    "arrangement" => "2",
                    "permissions" => "profile.create",
                    "route" => "admin.profile.create",
                ],
                [
                    "name" => "profile.create",
                    "title" => "کاربر جدید",
                    "icon" => "circle-o",
                    "arrangement" => "2",
                    "permissions" => "profile.create",
                    "route" => "admin.profile.create",
                ],
            ],
        ]
    ]
];
