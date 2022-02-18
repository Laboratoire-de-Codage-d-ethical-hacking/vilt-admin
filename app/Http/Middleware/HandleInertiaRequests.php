<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'appName' => config('app.name'),
            'nav' => [],
            'dropdown' => [
                [
                    "title" => "Profile",
                    "icon" => "bx-user",
                    "route" => "profile.show"
                ],
                [
                    "title" => "API Tokens",
                    "icon" => "bx-check-shield",
                    "route" => "api-tokens.index"
                ],
            ],
            'menu' => [
                [
                    "name" => "main",
                    "menu" => [
                        [
                            "title" => "Dashboard",
                            "icon" => "bxs-home",
                            "route" => "dashboard"
                        ],
                    ]
                ],
                [
                    "name" => "settings",
                    "menu" => [
                        [
                            "title" => "Themes",
                            "icon" => "bxs-brush",
                            "route" => "themes"
                        ],
                        [
                            "title" => "Plugins",
                            "icon" => "bxs-plug",
                            "route" => "plugins"
                        ],
                        [
                            "title" => "Commands",
                            "icon" => "bxs-terminal",
                            "route" => "commands"
                        ],
                        [
                            "title" => "Translations",
                            "icon" => "bx-globe",
                            "route" => "translations"
                        ],
                        [
                            "title" => "Backup",
                            "icon" => "bxs-share",
                            "route" => "backup"
                        ],
                        [
                            "title" => "Access Control",
                            "icon" => "bxs-user-check",
                            "route" => "acl"
                        ],
                        [
                            "title" => "Log",
                            "icon" => "bx-history",
                            "route" => "log"
                        ],
                        [
                            "title" => "Settings",
                            "icon" => "bxs-cog",
                            "route" => "settings"
                        ]
                    ]
                ]
            ]
        ]);
    }
}
