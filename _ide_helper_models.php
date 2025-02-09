<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Academics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Academics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Academics query()
 * @method static \Illuminate\Database\Eloquent\Builder|Academics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Academics whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Academics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Academics whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Academics whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Academics whereUpdatedAt($value)
 */
	class Academics extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property array|null $image
 * @property int|null $news_id
 * @property int|null $notices_id
 * @property int|null $messages_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Gallery> $photos
 * @property-read int|null $photos_count
 * @method static \Database\Factories\GalleryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereMessagesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereNoticesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 */
	class Gallery extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MessageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NewsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 */
	class News extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NoticesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Notices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notices query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notices whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notices whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notices whereUpdatedAt($value)
 */
	class Notices extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ResultsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Results newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Results newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Results query()
 * @method static \Illuminate\Database\Eloquent\Builder|Results whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Results whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Results whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Results whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Results whereUpdatedAt($value)
 */
	class Results extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property string|null $email
 * @property string|null $contact_numbers
 * @property string|null $address
 * @property int|null $establishment_year
 * @property string|null $description
 * @property string|null $phone_numbers
 * @property string|null $website_url
 * @property int|null $number_of_students
 * @property int|null $number_of_staffs
 * @property string|null $programs_offered
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereContactNumbers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereEstablishmentYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereNumberOfStaffs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereNumberOfStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails wherePhoneNumbers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereProgramsOffered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolDetails whereWebsiteUrl($value)
 */
	class SchoolDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * 
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

