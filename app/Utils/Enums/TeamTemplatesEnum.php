<?php

namespace App\Utils\Enums;

enum TeamTemplatesEnum : string
{

    case DIRECTOR = "direcor";
    case STAFF = "staff";

    public function templatePath(): string
    {
        return match ($this) {
            static::DIRECTOR => "template.team.director",
            static::STAFF => "template.team.staff",
        };
    }

}
