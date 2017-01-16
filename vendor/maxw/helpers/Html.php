<?php

namespace maxw\helpers;

class Html
{
    public static function safeHtml($html)
    {
        return htmlspecialchars($html);
    }
}