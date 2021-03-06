<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

    "accepted"         => "Вы должны принять :attribute.",
    "active_url"       => "Поле :attribute недействительный URL.",
    "after"            => "Поле :attribute должно быть датой после :date.",
    "alpha"            => "Поле :attribute может содержать только буквы.",
    "alpha_dash"       => "Поле :attribute может содержать только буквы, цифры и дефис.",
    "alpha_num"        => "Поле :attribute может содержать только буквы и цифры.",
    "array"            => "The :attribute must be an array.",
    "before"           => "Поле :attribute должно быть датой перед :date.",
    "between"          => array(
        "numeric" => "Поле :attribute должно быть между :min и :max.",
        "file"    => "Размер :attribute должен быть от :min до :max Килобайт.",
        "string"  => "Длина :attribute должна быть от :min до :max символов.",
        "array"   => "The :attribute must have between :min - :max items."
    ),
    "confirmed"        => "Поле :attribute не совпадает с подтверждением.",
    "date"             => "Поле :attribute не является датой.",
    "date_format"      => "Поле :attribute не соответствует формату :format.",
    "different"        => "Поля :attribute и :other должны различаться.",
    "digits"           => "Длина цифрового поля :attribute должна быть :digits.",
    "digits_between"   => "Длина цифрового поля :attribute должна быть между :min и :max.",
    "email"            => "Поле :attribute имеет ошибочный формат.",
    "exists"           => "Выбранное значение для :attribute уже существует.",
    "image"            => "Поле :attribute должно быть изображением.",
    "in"               => "Выбранное значение для :attribute ошибочно.",
    "integer"          => "Поле :attribute должно быть целым числом.",
    "ip"               => "Поле :attribute должно быть действительным IP-адресом.",
    "max"              => array(
        "numeric" => "Поле :attribute должно быть не больше :max.",
        "file"    => "Поле :attribute должно быть не больше :max Килобайт.",
        "string"  => "Поле :attribute должно быть не длиннее :max символов.",
        "array"   => "The :attribute may not have more than :max items."
    ),
    "mimes"            => "Поле :attribute должно быть файлом одного из типов: :values.",
    "min"              => array(
        "numeric" => "Поле :attribute должно быть не менее :min.",
        "file"    => "Поле :attribute должно быть не менее :min Килобайт.",
        "string"  => "Поле :attribute должно быть не короче :min символов.",
        "array"   => "The :attribute must have at least :min items."
    ),
    "not_in"           => "Выбранное значение для :attribute ошибочно.",
    "numeric"          => "Поле :attribute должно быть числом.",
    "regex"            => "Поле :attribute имеет ошибочный формат.",
    "required"         => "Поле :attribute обязательно для заполнения.",
    "required_if"      => "Поле :attribute обязательно для заполнения, когда :other равно :value.",
    "required_with"    => "Поле :attribute обязательно для заполнения, когда :values указано.",
    "required_without" => "Поле :attribute обязательно для заполнения, когда :values не указано.",
    "same"             => "Значение :attribute должно совпадать с :other.",
    "size"             => array(
        "numeric" => "Поле :attribute должно быть :size.",
        "file"    => "Поле :attribute должно быть :size Килобайт.",
        "string"  => "Поле :attribute должно быть длиной :size символов.",
        "array"   => "The :attribute must contain :size items."
    ),
    "unique"           => "Такое значение поля :attribute уже существует.",
    "url"              => "Поле :attribute имеет ошибочный формат.",

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

	'custom' => array(),

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

	'attributes' => array(),

);
