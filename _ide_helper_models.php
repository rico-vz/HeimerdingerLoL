<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Champion
 *
 * @property int $id
 * @property int $champion_id
 * @property string $key
 * @property string $name
 * @property string $title
 * @property string $lore
 * @property array $roles
 * @property int $price_be
 * @property int $price_rp
 * @property string $resource_type
 * @property string $attack_type
 * @property string $adaptive_type
 * @property string $release_date
 * @property string $release_patch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $champion_ability_icon_e
 * @property-read mixed $champion_ability_icon_p
 * @property-read mixed $champion_ability_icon_q
 * @property-read mixed $champion_ability_icon_r
 * @property-read mixed $champion_ability_icon_w
 * @property-read mixed $champion_image
 * @property-read mixed $champion_image_loading
 * @property-read mixed $champion_image_tile
 * @property-read mixed $champion_square_image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChampionSkin> $skins
 * @property-read int|null $skins_count
 * @method static \Database\Factories\ChampionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Champion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Champion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Champion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereAdaptiveType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereAttackType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereChampionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereLore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion wherePriceBe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion wherePriceRp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereReleasePatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereResourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereRoles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Champion whereUpdatedAt($value)
 */
	class Champion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChampionSkin
 *
 * @property int $id
 * @property int $champion_id
 * @property int $full_skin_id
 * @property int $skin_id
 * @property string $skin_name
 * @property string|null $lore
 * @property string $availability
 * @property int $loot_eligible
 * @property int $rp_price
 * @property string $rarity
 * @property string $release_date
 * @property array $associated_skinline
 * @property int $new_effects
 * @property int $new_animations
 * @property int $new_recall
 * @property int $new_voice
 * @property int $new_quotes
 * @property array $voice_actor
 * @property array $splash_artist
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Champion $champion
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SkinChroma> $chromas
 * @property-read int|null $chromas_count
 * @property-read mixed $skin_image
 * @property-read mixed $skin_image_loading
 * @property-read mixed $skin_image_tile
 * @method static \Database\Factories\ChampionSkinFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereAssociatedSkinline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereChampionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereFullSkinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereLootEligible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereLore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereNewAnimations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereNewEffects($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereNewQuotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereNewRecall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereNewVoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereRarity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereRpPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereSkinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereSkinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereSplashArtist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChampionSkin whereVoiceActor($value)
 */
	class ChampionSkin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SkinChroma
 *
 * @property int $id
 * @property string $chroma_id
 * @property int $full_skin_id
 * @property string $skin_name
 * @property string $chroma_name
 * @property array $chroma_colors
 * @property string $chroma_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SkinChromaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma query()
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereChromaColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereChromaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereChromaImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereChromaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereFullSkinId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereSkinName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkinChroma whereUpdatedAt($value)
 */
	class SkinChroma extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

