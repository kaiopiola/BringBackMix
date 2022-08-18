<?php

namespace KaioPiola\BringBackMix;

use Exception as GlobalException;

class BringBackMix
{
    public static function Execute()
    {

        $pathBack = '';
        for($i = 0; $i < 5; $i++)
        {
            $pathBack .= DIRECTORY_SEPARATOR . '..';
        }

        $projectRootPath = dirname(__DIR__ . $pathBack . DIRECTORY_SEPARATOR);

        # Run npm i laravel-mix

        self::prompt('Installing laravel-mix...');
        exec('npm i laravel-mix') or die(self::prompt(self::showError(1)));

        # Create webpack file

        self::prompt('Creating webpack file...');

        $webpackFile = fopen($projectRootPath . "webpack.mix.js", "w") or die(self::prompt(self::showError(2)));
        $webpackContent = "const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();";

        fwrite($webpackFile, $webpackContent);
        fclose($webpackFile);

        # Edit package.json scripts

        self::prompt("Modifying package.json file...");

        $jsonString = file_get_contents($projectRootPath . 'package.json');
        $jsonData = json_decode($jsonString, true);

        unset($jsonData['scripts']['dev']);
        unset($jsonData['scripts']['build']);

        $jsonData['scripts']['dev'] = "npm run development";
        $jsonData['scripts']['development'] = "mix";
        $jsonData['scripts']['watch'] = "mix watch";
        $jsonData['scripts']['watch-poll'] = "mix watch -- --watch-options-poll=1000";
        $jsonData['scripts']['hot'] = "mix watch --hot";
        $jsonData['scripts']['prod'] = "npm run production";
        $jsonData['scripts']['production'] = "mix --production";

        $newJsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
        file_put_contents($projectRootPath . 'package.json', $newJsonString) or die(self::prompt(self::showError(3)));

        self::prompt(self::showError(200));
    }

    static function showError($code)
    {
        switch ($code) {
            case 1:
                return '';
                break;
            case 2:
                return 'Error '.$code. ' - ' . 'Unable to create webpack file. Please make sure you are running this program with the correct privileges. Check README for more information.';
                break;
            case 3:
                return 'Error '.$code. ' - ' . 'Unable to modify package.json file.';
                break;
            case 200:
                return ''.$code. ' - ' . 'Process completed! Enjoy your webpack again!';
                break;
        }
        exit;
    }

    static function prompt($str)
    {
        echo $str . PHP_EOL;
    }
}
