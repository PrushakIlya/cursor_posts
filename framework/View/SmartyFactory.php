<?php

namespace Framework\View;

use Smarty\Smarty;

class SmartyFactory
{
    public static function create(): Smarty
    {
        $smarty = new Smarty();
        $templateDir = realpath(APP_PATH . '/Views') ?: APP_PATH . '/Views';
        $compileDir = realpath(ROOT_PATH . '/storage/smarty/compile') ?: ROOT_PATH . '/storage/smarty/compile';
        $cacheDir = realpath(ROOT_PATH . '/storage/smarty/cache') ?: ROOT_PATH . '/storage/smarty/cache';
        $smarty->setTemplateDir($templateDir);
        $smarty->setCompileDir($compileDir);
        $smarty->setCacheDir($cacheDir);

        $smarty->registerPlugin('modifier', 'date_fmt', function (?string $date): string {
            return $date ? date('M j, Y', strtotime($date)) : '—';
        });

        $smarty->registerPlugin('modifier', 'date_long', function (?string $date): string {
            return $date ? date('F j, Y', strtotime($date)) : '';
        });

        $smarty->registerPlugin('modifier', 'number_fmt', function ($n): string {
            return is_numeric($n) ? number_format((int) $n) : '—';
        });

        $smarty->registerPlugin('modifier', 'nl2br_esc', function (?string $s): string {
            return $s !== null && $s !== '' ? nl2br(htmlspecialchars($s, ENT_QUOTES, 'UTF-8')) : '';
        });

        return $smarty;
    }
}
