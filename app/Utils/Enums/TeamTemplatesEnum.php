<?php

namespace App\Utils\Enums;

enum TeamTemplatesEnum : string
{

    case DIRECTOR = "director";
    case STAFF = "staff";

    public function templatePath(): string
    {
        return match ($this) {
            static::DIRECTOR => "templates.teams.director",
            static::STAFF => "templates.teams.staff",
        };
    }

}
