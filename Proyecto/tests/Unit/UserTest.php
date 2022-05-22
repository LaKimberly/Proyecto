<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_to_user_has_many_purcharses()
    {
        $user = new User();
        $this->assertInstanceOf(Collection::class, $user->purcharses);
    }
}
