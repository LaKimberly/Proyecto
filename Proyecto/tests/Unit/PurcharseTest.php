<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Purcharse;
use Illuminate\Database\Eloquent\Collection;

class PurcharseTest extends TestCase
{
    /**
     * A basic unit test to purcharse has many products.
     *
     * @return void
     */
    public function test_to_purcharse_has_many_products()
    {
        $purcharse = new Purcharse();
        $this->assertInstanceOf(Collection::class, $purcharse->products);
    }
}
