<?php

namespace Helpers;

class ModelHelper
{

    /**
     * @param \Illuminate\Support\Facades\Validator $validator
     * @return string
     */
    public static function getValidationErrorsHtml($validator)
    {
        $temp = '';
        foreach ($validator->messages()->all('<li>:message</li>') as $message)
        {
            $temp .= $message;
        }
        return '<ul>' . $temp . '</ul>';
    }

    /**
     * @param $tagsString
     * @return array
     */
    public static function convertTagsStringToArray($tagsString)
    {
        $tagsArray = explode(',', strtolower($tagsString));
        array_walk($tagsArray, function(&$item){ // items trim
            $item = trim($item);
        });
        $tagsArray = array_filter($tagsArray);
        return array_unique($tagsArray);
    }

} 