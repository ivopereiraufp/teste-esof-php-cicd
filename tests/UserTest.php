<?php

namespace Ivoaspereira\PhpTesting;

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testClassConstructor()
    {
        $user = new User(18, 'John');

        $this->assertSame('John', $user->name);
        $this->assertSame(18, $user->age);
        $this->assertEmpty($user->favoriteMovies);
    }

    public function testTellName()
    {
        $user = new User(18, 'John');

        $this->assertIsString($user->tellName());
        $this->assertStringContainsStringIgnoringCase('John', $user->tellName());
    }

    public function testTellAge()
    {
        $user = new User(18, 'John');

        $this->assertIsString($user->tellAge());
        $this->assertStringContainsStringIgnoringCase('18', $user->tellAge());
    }

    public function testAddFavoriteMovie()
    {
        $user = new User(18, 'John');

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertContains('Avengers', $user->favoriteMovies);
        $this->assertCount(1, $user->favoriteMovies);
    }

    public function testRemoveFavoriteMovie()
    {
        $user = new User(18, 'John');

        $this->assertTrue($user->addFavoriteMovie('Avengers'));
        $this->assertTrue($user->addFavoriteMovie('Justice League'));

        $this->assertTrue($user->removeFavoriteMovie('Avengers'));
        $this->assertNotContains('Avengers', $user->favoriteMovies);
        $this->assertCount(1, $user->favoriteMovies);
    }

    public function testTellNameNegative()
    {
        $user = new User(18, 'John');

        $this->assertIsString($user->tellName());
        $this->assertStringNotContainsStringIgnoringCase('Not John', $user->tellName());
    }
}
