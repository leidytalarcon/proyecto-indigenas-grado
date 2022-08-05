<?php

return[


    /*
    | ------------------------------------------------- -------------------------
    | Líneas de idioma de validación
    | ------------------------------------------------- -------------------------
    |
    | Las siguientes líneas de idioma contienen los mensajes de error predeterminados utilizados por
    | la clase de validador. Algunas de estas reglas tienen varias versiones, como
    | como las reglas del tamaño. Siéntase libre de modificar cada uno de estos mensajes aquí.
    |
    */

    'accept' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :fecha.',
    'alpha' => 'El :attribute solo puede contener letras.',
    'alpha_dash' => 'El :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute solo puede contener letras y números.',
    'array' => 'El :attribute debe ser una matriz.',
    'before' => 'El :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :fecha.',
    'entre' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El :attribute debe tener entre :min y :max items.',
    ],
    'boolean' => 'El campo de :attribute debe ser verdadero o falso.',
    'confirm' => 'La confirmación del :attribute no coincide.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_format' => 'El :attribute no coincide con el formato :formato.',
    'diferente' => 'El :attribute y :otro deben ser diferentes.',
    'digits' => 'El :attribute debe ser :digits digits.',
    'digits_between' => 'El :attribute debe estar entre :min y :max digits.',
    'Dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinto' => 'El campo de :attribute tiene un valor duplicado.',
    'email' => 'El :attribute debe ser una dirección de correo electrónico válida.',
    'existe' => 'El atributo seleccionado :no es válido.',
    'file' => 'El :attribute debe ser un archivo.',
    'fill' => 'El :campo de atributo debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que :value caracteres.',
        'array' => 'El :attribute debe tener más de :elements de valor.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor o igual que :value.',
        'file' => 'El :attribute debe ser mayor o igual que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor o igual que :value caracteres.',
        'array' => 'El :attribute debe tener :elements de valor o más.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'El atributo seleccionado :no es válido.',
    'in_array' => 'El campo de :attribute no existe en :other.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'string' => 'El :attribute debe ser menor que :value caracteres.',
        'array' => 'El :attribute debe tener menos que :elements de valor.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'file' => 'El :attribute debe ser menor o igual que :value kilobytes.',
        'string' => 'El :attribute debe ser menor o igual que :value caracteres.',
        'array' => 'El :attribute no debe tener más de :elements de valor.',
    ],
    'max' => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file' => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string' => 'El :attribute no puede ser mayor que :max caracteres.',
        'array' => 'El :attribute no puede tener más de :elements máximos.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo ::values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo ::values.',
    'min' => [
        'numeric' => 'El :attribute debe ser al menos :min.',
        'file' => 'El :attribute debe ser al menos :min kilobytes.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
        'array' => 'El :attribute debe tener al menos :elements mínimos.',
    ],
    'not_in' => 'El atributo seleccionado :no es válido.',
    'not_regex' => 'El formato del :attribute no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'present' => 'El :campo de atributo debe estar presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El :campo de atributo es obligatorio.',
    'required_if' => 'El campo de :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo de :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo de :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo de :attribute es obligatorio cuando :values está presente.',
    'required_without' => 'El campo de :attribute es obligatorio cuando :los valores no están presentes.',
    'required_without_all' => 'El campo de :attribute es obligatorio cuando ninguno de los valores :está presente.',
    'mismo' => 'El :attribute y :otro deben coincidir.',
    'tamaño' => [
        'numeric' => 'El :attribute debe ser :tamaño.',
        'file' => 'El :attribute debe ser :tamaño kilobytes.',
        'string' => 'El :attribute debe ser :caracteres de tamaño.',
        'array' => 'El :attribute debe contener :artículos de tamaño.',
    ],
    'string' => 'El :attribute debe ser una cadena.',
    'timezone' => 'El :attribute debe ser una zona válida.',
    'unique' => 'El :attribute ya ha sido tomado.',
    'uploaded' => 'El :attribute no se pudo cargar.',
    'url' => 'El formato del :attribute no es válido.',

    /*
    | ------------------------------------------------- -------------------------
    | Líneas de idioma de validación personalizadas
    | ------------------------------------------------- -------------------------
    |
    | Aquí puede especificar mensajes de validación personalizados para atributos utilizando el
    | convención "attribute.rule" para nombrar las líneas. Esto hace que sea rápido
    | especifique una línea de idioma personalizada específica para una regla de atributo determinada.
    |
    */

    'personalizado' => [
        'nombre-atributo' => [
            'rule-name' => 'mensaje-personalizado',
        ],
    ],

    /*
    | ------------------------------------------------- -------------------------
    | Atributos de validación personalizados
    | ------------------------------------------------- -------------------------
    |
    | Las siguientes líneas de idioma se utilizan para intercambiar marcadores de posición de atributo
    | con algo más fácil de leer, como la dirección de correo electrónico en su lugar
    | de "correo electrónico". Esto simplemente nos ayuda a hacer que los mensajes sean un poco más limpios.
    |
    */

    'atributos' => [],

];