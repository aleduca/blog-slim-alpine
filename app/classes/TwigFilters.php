<?php

namespace app\classes;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigFilters extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('message', [$this, 'showMessage']),
            new TwigFilter('truncate', [$this, 'truncate'])
        ];
    }

    public function showMessage($message, $alert)
    {
        if (is_string($message) && !empty($message)) {
            return "<span class='alert alert-{$alert}'>{$message}</span>";
        }
    }

    public function truncate($text, $limit, $pad = '...')
    {
        $text = strip_tags($text);
        return (strlen($text) > $limit) ? substr($text, 0, $limit) . $pad : $text;
    }
}
