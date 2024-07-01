<?php

namespace App\Policies;

use App\Models\SummonerEmote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SummonerEmotePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, SummonerEmote $summonerEmote): bool {}

    public function create(User $user): bool {}

    public function update(User $user, SummonerEmote $summonerEmote): bool {}

    public function delete(User $user, SummonerEmote $summonerEmote): bool {}

    public function restore(User $user, SummonerEmote $summonerEmote): bool {}

    public function forceDelete(User $user, SummonerEmote $summonerEmote): bool {}
}
