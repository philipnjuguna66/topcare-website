<?php

namespace Appsorigin\Teams\Models;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    protected $casts = [
        'extra' => 'json'
    ];

    public function companyTeams()
    {
        return $this->belongsToMany(
            related: CompanyTeam::class,
            table: 'company_team_categories',
            foreignPivotKey: 'company_team_id',
            relatedPivotKey: 'team_category_id'
        );
    }
}
