<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Unit;
use Tests\TestCase;

class AdminRoutesTest extends TestCase
{
    public function test_all_admin_get_routes_return_ok_for_authenticated_admin()
    {
        $admin = User::first();
        $unit = Unit::first();

        $routes = [
            '/admin',
            '/admin/units',
            '/admin/units/create',
            '/admin/units/' . $unit->id . '/edit',
            '/admin/facilities',
            '/admin/landmarks',
            '/admin/faqs',
            '/admin/about',
            '/admin/settings',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($admin)->get($route);
            $response->assertStatus(200);
        }
    }

    public function test_database_and_storage_integrity()
    {
        // 1. Ensure locations exist
        $this->assertGreaterThan(0, \App\Models\Location::count(), 'Locations table should have records');

        // 2. Ensure each unit has valid location
        $units = \App\Models\Unit::with('location')->get();
        $this->assertNotEmpty($units, 'Units should not be empty');
        foreach ($units as $unit) {
            $this->assertNotNull($unit->location, "Unit ID {$unit->id} must have a valid Location relation");
            $this->assertNotEmpty($unit->name);
            $this->assertNotEmpty($unit->rental_period);
            $this->assertGreaterThan(0, $unit->normal_price);
        }

        // 3. Ensure facilities have valid location
        $facilities = \App\Models\Facility::with('location')->get();
        foreach ($facilities as $facility) {
            $this->assertNotNull($facility->location, "Facility ID {$facility->id} must have a valid Location");
        }

        // 4. Ensure landmarks have valid location
        $landmarks = \App\Models\Landmark::with('location')->get();
        foreach ($landmarks as $landmark) {
            $this->assertNotNull($landmark->location, "Landmark ID {$landmark->id} must have a valid Location");
        }
    }
}
