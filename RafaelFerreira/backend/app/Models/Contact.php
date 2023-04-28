<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * 
 * @property int $id
 * @property string|null $contact
 * @property int $contact_type_id
 * @property int|null $users_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ContactType $contact_type
 * @property User|null $user
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contact';

	protected $casts = [
		'contact_type_id' => 'int',
		'users_id' => 'int'
	];

	protected $fillable = [
		'contact',
		'contact_type_id',
		'users_id'
	];

	public function contact_type()
	{
		return $this->belongsTo(ContactType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
