<?php

namespace Tests\Unit;

use App\Models\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    
    public function testBookIsCreatedCorrectly()
    {

        $payload = [
            'titulo' => 'Lorem',
            'autor' => 'Ipsum',
            'publishedAt' => '1971-01-01 00:00:00'
        ];

        $this->postJson('/api/v1/books', $payload)
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'id' => 1,
                    'titulo' => 'Lorem',
                    'autor' => 'Ipsum',
                    'publishedAt' => '1971-01-01 00:00:00'
                ]
            ]);
    }

    
    public function testBooksAreListedCorrectly()
    {
        $book1 = Book::factory()->create([
            'titulo' => 'b b b b b b',
            'autor' => 'b b b b b b b',
            'published_at' => '1971-01-01 00:00:00'
        ]);

        $book2 = Book::factory()->create([
            'titulo' => 'c c c c c c',
            'autor' => 'c c c c c c c',
            'published_at' => '1971-01-01 00:00:00'
        ]);

        $this->getJson('/api/v1/books')
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [ 
                        'id' => $book1->id,
                        'titulo' => $book1->titulo,
                        'autor' => $book1->autor,
                        'publishedAt' => $book1->published_at 
                    ],
                    [ 
                        'id' => $book2->id,
                        'titulo' => $book2->titulo,
                        'autor' => $book2->autor,
                        'publishedAt' => $book2->published_at 
                    ]
                ]
            ])
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'titulo', 'autor', 'publishedAt']
                ]
            ]);
    }

    public function testBookAreListedByIdCorrectly()
    {
        $book = Book::factory()->create([
            'titulo' => 'b b b b b b',
            'autor' => 'b b b b b b b',
            'published_at' => '1971-01-01 00:00:00'
        ]);

        $this->getJson('/api/v1/books/' . $book->id)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $book->id,
                    'titulo' => $book->titulo,
                    'autor' => $book->autor,
                    'publishedAt' => $book->published_at
                ]
            ])
            ->assertJsonStructure([
                'data' => ['id', 'titulo', 'autor', 'publishedAt']
            ]);
    }
    
}
