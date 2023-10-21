<?php

namespace App\Helpers;

use App\Enums\RelationshipEnum;

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
}
