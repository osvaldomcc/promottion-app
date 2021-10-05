<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "currency_password"         => "Debe ser la contraseña actual.",
    "accepted"         => "Debe ser aceptado.",
    "active_url"       => "No es una URL válida.",
    "after"            => "Debe ser una fecha posterior a :date.",
    "alpha"            => "Solo debe contener letras.",
    "alpha_dash"       => "Solo debe contener letras, números y guiones.",
    "alpha_num"        => "Solo debe contener letras y números.",
    "array"            => "Debe ser un conjunto.",
    "before"           => "Debe ser una fecha anterior a :date.",
    "between"          => [
        "numeric" => "Tiene que estar entre :min - :max.",
        "file"    => "Debe pesar entre :min - :max kilobytes.",
        "string"  => "Tiene que tener entre :min - :max caracteres.",
        "array"   => "Tiene que tener entre :min - :max ítems.",
    ],
    "boolean"          => "El campo debe tener un valor verdadero o falso.",
    "confirmed"        => "La confirmación no coincide.",
    "date"             => "No es una fecha válida.",
    "date_format"      => "No corresponde al formato :format.",
    "different"        => "El valor y :other deben ser diferentes.",
    "digits"           => "Debe tener :digits dígitos.",
    "digits_between"   => "Debe tener entre :min y :max dígitos.",
    "email"            => "No es un correo válido",
    "exists"           => "El :attribute no existe.",
    "filled"           => "El campo es obligatorio.",
    "image"            => "Debe ser una imagen.",
    "in"               => "Es inválido.",
    "integer"          => "Debe ser un número entero.",
    "ip"               => "Debe ser una dirección IP válida.",
    "max"              => [
        "numeric" => "No debe ser mayor a :max.",
        "file"    => "No debe ser mayor que :max kilobytes.",
        "string"  => "No debe ser mayor que :max caracteres.",
        "array"   => "No debe tener más de :max elementos.",
    ],
    "mimes"            => "Debe ser un archivo con formato: :values.",
    "min"              => [
        "numeric" => "El tamaño de debe ser de al menos :min.",
        "file"    => "El tamaño de debe ser de al menos :min kilobytes.",
        "string"  => "Debe contener al menos :min caracteres.",
        "array"   => "Debe tener al menos :min elementos.",
    ],
    "not_in"           => "Es inválido.",
    "numeric"          => "Debe ser numérico.",
    "regex"            => "El formato es inválido.",
    "required"         => "El campo es obligatorio.",
    "required_if"      => "El campo es obligatorio cuando :other es :value.",
    "required_with"    => "El campo es obligatorio cuando :values está presente.",
    "required_with_all" => "El campo es obligatorio cuando :values está presente.",
    "required_without" => "El campo es obligatorio cuando :values no está presente.",
    "required_without_all" => "El campo es obligatorio cuando ninguno de :values estén presentes.",
    "same"             => "El valor y :other deben coincidir.",
    "size"             => [
        "numeric" => "El tamaño de debe ser :size.",
        "file"    => "El tamaño de debe ser :size kilobytes.",
        "string"  => "Debe contener :size caracteres.",
        "array"   => "Debe contener :size elementos.",
    ],
    "timezone"         => "El debe ser una zona válida.",
    "unique"           => "Ya está en uso.",
    "url"              => "El formato es inválido.",
    "roladmin"              => "No tiene permisos para acceder a esta zona.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];