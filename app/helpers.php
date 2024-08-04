<?php

declare(strict_types=1);

if (! function_exists('hasRole')) {
    function hasRole(string $role)
    {
        return auth()?->user()?->jabatan == $role;
    }
}
