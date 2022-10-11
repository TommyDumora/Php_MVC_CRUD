<?php

abstract class AbstractController {

    public function renderView(string $path, array $params = []):string {

        return require_once(dirname(__DIR__, 2) . $path);

    }

}