<?php

namespace App\Helpers;

use App\Enums\DosageEnum;
use App\Enums\RelationshipEnum;
use App\Enums\ReminderRepetitionEnum;
use App\Enums\SymptomSeverityEnum;

class EnumMap{

    public static function getRelationship(){
        return [
            RelationshipEnum::Father()->value => RelationshipEnum::Father()->label,
            RelationshipEnum::Mother()->value => RelationshipEnum::Mother()->label,
            RelationshipEnum::Brother()->value => RelationshipEnum::Brother()->label,
            RelationshipEnum::Sister()->value => RelationshipEnum::Sister()->label,
            RelationshipEnum::Son()->value => RelationshipEnum::Son()->label,
            RelationshipEnum::Daughter()->value => RelationshipEnum::Daughter()->label,
        ];
    }

    public static function getSymptomSeverity(){
        return [
            SymptomSeverityEnum::Mild()->value => SymptomSeverityEnum::Mild()->label,
            SymptomSeverityEnum::Severe()->value => SymptomSeverityEnum::Severe()->label,
        ];
    }

    public static function getDosage(){
        return [
            DosageEnum::Half()->value => DosageEnum::Half()->label,
            DosageEnum::One()->value => DosageEnum::One()->label,
            DosageEnum::Two()->value => DosageEnum::Two()->label,
            DosageEnum::More()->value => DosageEnum::More()->label,
        ];
    }

    public static function getRepititon(){
        return [
            ReminderRepetitionEnum::Once()->value => ReminderRepetitionEnum::Once()->label,
            ReminderRepetitionEnum::Daily()->value => ReminderRepetitionEnum::Daily()->label,
            ReminderRepetitionEnum::Weekly()->value => ReminderRepetitionEnum::Weekly()->label,
        ];
    }
}
