<?php

namespace App\Traits;

trait HasRole
{
    public function isAdmin(): bool   { return $this->role === 'admin'; }
    public function isCashier(): bool { return $this->role === 'cashier'; }
}