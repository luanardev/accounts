<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * @property mixed id
 * @property string name
 * @property string $guard_name
 * @property string $display_name
 * @property mixed $app_id
 * @property App $app
 */
class Permission extends SpatiePermission
{

}
