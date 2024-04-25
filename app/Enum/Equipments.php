<?php

namespace App\Enum;

enum Equipments: string
{
    case MODLO = "MODLO";
    case INVRS = "INVRS";
    case MIVRS = "MIVRS";
    case ESTRA = "ESTRA";
    case CBVER = "CBVER";
    case CBPRT = "CBPRT";
    case STBOX = "STBOX";
    case CBTRC = "CBTRC";
    case ENDCP = "ENDCP";

    public function labels(): string
    {
        return match ($this) {
            self::MODLO => "Módulo",
            self::INVRS => "Inversor",
            self::MIVRS => "Microinversor",
            self::ESTRA => "Estrutura",
            self::CBVER => "Cabo Vermelho",
            self::CBPRT => "Cabo Preto",
            self::STBOX => "String box",
            self::CBTRC => "Cabo Tronco",
            self::ENDCP => "Endcap"
        } ;
    }

    public static function keyLables(): array
    {
        return array_reduce(self::cases(), function ($carry, UF $equipment) {
            $carry[$equipment->value] = $equipment->label();
            return $carry;
        });
    }
}
