<?php

namespace App\Services\Owner;

class DashboardService
{
    public function get(): array
    {
        return [
            'owner' => null,
            'umkm' => null,
            'stats' => [],
            'recentProducts' => collect(),
        ];
    }
}
