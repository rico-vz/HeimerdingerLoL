<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\SummonerEmote;
use App\Policies\SummonerEmotePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        SummonerEmote::class => SummonerEmotePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
