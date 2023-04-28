<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactType
 * 
 * @property int $id
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Contact[] $contacts
 *
 * @package App\Models
 */
class ContactType extends Model
{
	protected $table = 'contact_type';

	protected $fillable = [
		'description'
	];

	public function contacts()
	{
		return $this->hasMany(Contact::class);
	}
}
