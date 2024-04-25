<?php

namespace App\Enum;

enum InstallationType: string
{
    case FBMD = "FBMD";
    case FBMT = "FBMT";
    case CERM = "CERM";
    case METL = "METL";
    case LAJE = "LAJE";
    case SOLO = "SOLO";

    public function labels(): string
    {
        return match ($this) {
            self::FBMD => "Fibrocimento (Madeira)",
            self::FBMT => "Fibrocimento (Metálico)",
            self::CERM => "Cerâmico",
            self::METL => "Metálico",
            self::LAJE => "Laje",
            self::SOLO => "Solo"
        };
    }

    public static function keyLables(): array
    {
        return array_reduce(self::cases(), function ($carry, UF $installationType) {
            $carry[$installationType->value] = $installationType->label();
            return $carry;
        });
    }
}
