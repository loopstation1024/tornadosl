<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChapterTest extends TestCase
{
    use RefreshDatabase;
    
    public function testChaptersAreCreatedByBookIdCorrectly()
    {
        $book = Book::factory()->create();
        
        $payload = [
            'bookId' => $book->id,
            'numberChapter' => 70,
            'title' => 'klmv verv vrev',
            'resumen' => 'lkfwef wefwef wefewfkfwe fe'
        ];

        $this->postJson('/api/v1/chapters', $payload)
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'id' => 1,
                    'bookId' => $book->id,
                    'numberChapter' => 70,
                    'title' => 'klmv verv vrev',
                    'resumen' => 'lkfwef wefwef wefewfkfwe fe'
                ]
            ]);
    }

    public function testChaptersAreListedCorrectly()
    {
        $book1 = Book::factory()->create();
        $chapter1 = Chapter::factory()->create([
            'book_id' => $book1->id,
            'number_chapter' => 78,
            'title' => 'gerg erogpo ergpoger por',
            'resumen' => 'ñl,er geñrlfge lgerg'
        ]);

        $book2 = Book::factory()->create();
        $chapter2 = Chapter::factory()->create([
            'book_id' => $book2->id,
            'number_chapter' => 45,
            'title' => 'ñlewf wñflwe fwñle,f ñlwef',
            'resumen' => 'kewmf fwepfokwe wfpokwf pweofwe'
        ]);

        $book3 = Book::factory()->create();
        $chapter3 = Chapter::factory()->create([
            'book_id' => $book3->id,
            'number_chapter' => 56,
            'title' => 'kvmwe vwepvwe powpevp pwe',
            'resumen' => 'plweopf wifbuwerg iwrngw irgnwoe mowrg'
        ]);

        $response = $this->getJson('/api/v1/chapters')
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $chapter1->id,
                        'bookId' => $book1->id,
                        'numberChapter' => $chapter1->number_chapter,
                        'title' => $chapter1->title,
                        'resumen' => $chapter1->resumen
                    ],
                    [
                        'id' => $chapter2->id,
                        'bookId' => $book2->id,
                        'numberChapter' => $chapter2->number_chapter,
                        'title' => $chapter2->title,
                        'resumen' => $chapter2->resumen
                    ],
                    [
                        'id' => $chapter3->id,
                        'bookId' => $book3->id,
                        'numberChapter' => $chapter3->number_chapter,
                        'title' => $chapter3->title,
                        'resumen' => $chapter3->resumen
                    ]
                ]
            ])
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'bookId', 'numberChapter', 'title', 'resumen'],
                ]
            ]);
    }

    public function testChaptersAreListedByBookIdCorrectly()
    {
        $book = Book::factory()->create();

        $chapter1 = Chapter::factory()->create([
            'book_id' => $book->id,
            'number_chapter' => 78,
            'title' => 'gerg erogpo ergpoger por',
            'resumen' => 'ñl,er geñrlfge lgerg'
        ]);

        $chapter2 = Chapter::factory()->create([
            'book_id' => $book->id,
            'number_chapter' => 45,
            'title' => 'ñlewf wñflwe fwñle,f ñlwef',
            'resumen' => 'kewmf fwepfokwe wfpokwf pweofwe'
        ]);

        $chapter3 = Chapter::factory()->create([
            'book_id' => $book->id,
            'number_chapter' => 56,
            'title' => 'kvmwe vwepvwe powpevp pwe',
            'resumen' => 'plweopf wifbuwerg iwrngw irgnwoe mowrg'
        ]);

        $this->getJson('/api/v1/chapters/findByBookId/' . $book->id)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $chapter1->id,
                        'bookId' => $book->id,
                        'numberChapter' => $chapter1->number_chapter,
                        'title' => $chapter1->title,
                        'resumen' => $chapter1->resumen
                    ],
                    [
                        'id' => $chapter2->id,
                        'bookId' => $book->id,
                        'numberChapter' => $chapter2->number_chapter,
                        'title' => $chapter2->title,
                        'resumen' => $chapter2->resumen
                    ],
                    [
                        'id' => $chapter3->id,
                        'bookId' => $book->id,
                        'numberChapter' => $chapter3->number_chapter,
                        'title' => $chapter3->title,
                        'resumen' => $chapter3->resumen
                    ]
                ]
            ])
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'bookId', 'numberChapter', 'title', 'resumen'],
                ]
            ]);
    }

    public function testGetChaptersByInvalidBookIdFails()
    {
        $this->getJson('/api/v1/chapters/findByBookId/' . 'skldnvlskdn')
            ->assertStatus(404)
            ->assertJson([
                "message" => "Invalid Book ID"
            ]);
    }
}
