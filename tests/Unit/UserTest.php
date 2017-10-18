<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * DBに10件保存して件数を確認するテスト
     * @group db
     */
    public function test10Users()
    {
        $user = new User();

        factory(User::class, 10)->create();

        $count = $user->getCount();
        $this->assertEquals(10, $count);
    }

    /**
     * DBに適当に保存して、対象レコードだけを取り出すテスト
     * @group db
     */
    public function testUsersWithoutPassword()
    {
        $user = new User();

        $example_address = 'foobar@example.jp';

        factory(User::class, 10)->create();
        factory(User::class)->create([
            'email' => $example_address,
        ]);
        factory(User::class, 10)->create();

        $result = $user->getByEmail($example_address);
        $this->assertEquals($example_address, $result->email);
    }
}
