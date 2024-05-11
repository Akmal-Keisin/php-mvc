<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class RegexTest extends TestCase
{
    public function testRegexRoute(): void
    {
        $routePath = "/home/detail/{id}";

        preg_match_all('/\{(.*?)\}/', $routePath, $match);
        assertEquals($match[1], ['id']);
    }

    public function testRegexPath(): void
    {
        $path = "/home/detail/1";
        preg_match('#^/home/detail/([a-zA-Z0-9])$#', $path, $match);
        array_shift($match);
        assertEquals($match[0], 1);
    }

    public function testRegexMain(): void
    {
        // $routePath = "/home/detail/{id}";
        $routePath = '/home/detail/{id}/product/{productId}';
        // $path = "/home/detail/1";
        $path = "/home/detail/1/product/2";

        if (preg_match_all('/\{(.*?)\}/', $routePath, $routePatternMatch)) {
            // $routePath = preg_replace('/\{(.*?)\}/', $routePath, '#^/home/detail/([a-zA-Z0-9])$#');
            $routePath = preg_replace('/\{(.*?)\}/', '([a-zA-Z0-9])', $routePath);
            $routePath = '#' . $routePath . '$#';

            if (preg_match_all($routePath, $path, $pathMatch)) {
                array_shift($pathMatch);
                assertEquals($pathMatch, [[1], [2]]);
            }
        }
    }
}