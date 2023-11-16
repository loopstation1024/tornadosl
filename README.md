
Endpoints:

GET		/api/books/
GET		/api/books/{id}
POST	/api/books/
PUT		/api/books/{id}
DELETE	/api/books/{id}

GET		/api/chapters/
GET		/api/chapters/{id}
POST	/api/chapters
PUT		/api/chapters/{id}
DELETE	/api/chapters/{id}
GET		/api/chapters/findByBookId/{id}


***************************************************************************
BOOKS
***************************************************************************
GET		/api/books/
Response Payload example 200:	
{
    "data": [
        {
            "id": 1,
            "titulo": "Nulla dicta fugiat magni beatae mollitia facere.",
            "autor": "Dr. Kurtis Kohler DVM",
            "publishedAt": "2005-10-22 06:35:26"
        },
        {
            "id": 2,
            "titulo": "Quia dolorem ab quisquam.",
            "autor": "Newell Ernser",
            "publishedAt": "1991-04-12 23:07:29"
        },
        {
            "id": 3,
            "titulo": "Excepturi itaque eum officiis impedit nulla earum.",
            "autor": "Mabel Farrell",
            "publishedAt": "2005-11-11 11:10:12"
        }
    ]
}
----------------------------------------------------------------------------

GET		/api/books/{id}
Response Payload example 200:	
{
    "data": [
        {
            "id": 1,
            "titulo": "Nulla dicta fugiat magni beatae mollitia facere.",
            "autor": "Dr. Kurtis Kohler DVM",
            "publishedAt": "2005-10-22 06:35:26"
        }
    ]
}

Response Payload 404:
{
    "message": "Resource not Found!"
}
----------------------------------------------------------------------------

POST	/api/books/
Request Payload example:
{
	"titulo" : "Lorem",
    "autor" : "Ipsum",
    "publishedAt" : "1971-01-01 00:00:00"
}

Response Payload 200:
{
	"data": {
		"id": 12,
		"titulo": "aaa",
		"autor": "aaa",
		"publishedAt": "1971-01-01 00:00:00"
	}
}

Response Payload 500:
{
    "message" : "An error occurred while creating the resource"
}
----------------------------------------------------------------------------

PUT		/api/books/{id}
Request Payload example:
{
	"titulo" : "Lorem",
    "autor" : "Ipsum",
    "publishedAt" : "1971-01-01 00:00:00"
}

Response Payload example 200:
{
	"data": {
		"id": 12,
		"titulo": "aaa",
		"autor": "aaa",
		"publishedAt": "1971-01-01 00:00:00"
	}
}

Response Payload 404:
{
    "message": "Resource Not Found!"
}

Response Payload 500:
{
    "message" : "Cannot update the resource"
}
----------------------------------------------------------------------------

DELETE	/api/books/{id}
Response Payload 204:
{
    "message": "Resource deleted"
}

Response Payload 404:
{
    "message": "Resource Not Found!"
}

Response Payload 500:
{
    "message": "Cannot delete the resource"
}
----------------------------------------------------------------------------


***************************************************************************
CHAPTERS
***************************************************************************
GET		/api/chapters/
Response Payload example 200:
{
    "data": [
        {
            "id": 7,
            "bookId": 1,
            "numberChapter": "56",
            "title": "Ut cum minus voluptas eum.",
            "resumen": "Optio maxime rerum nesciunt. Vero quisquam consectetur necessitatibus sint autem. Aut rerum expedita rem ducimus consequatur iure quia."
        },
        {
            "id": 8,
            "bookId": 1,
            "numberChapter": "47",
            "title": "Qui quo quae qui dolores totam.",
            "resumen": "Architecto nostrum iste illo repellat ad delectus. Culpa accusamus saepe possimus dolore exercitationem et. Fugiat aut earum exercitationem. Ab omnis qui ut assumenda."
        },
        {
            "id": 9,
            "bookId": 1,
            "numberChapter": "22",
            "title": "Perspiciatis quo reprehenderit consequatur culpa voluptatem enim.",
            "resumen": "Consequuntur molestiae ut beatae. A delectus dicta aliquam earum nobis. Sint ipsam sed accusantium consequatur quia placeat."
        }
    ]
}
----------------------------------------------------------------------------

GET		/api/chapters/{id}
Response Payload example 200:
{
    "data": [
        {
            "id": 7,
            "bookId": 1,
            "numberChapter": "56",
            "title": "Ut cum minus voluptas eum.",
            "resumen": "Optio maxime rerum nesciunt. Vero quisquam consectetur necessitatibus sint autem. Aut rerum expedita rem ducimus consequatur iure quia."
        }
    ]
}

Response Payload 404:
{
    "message": "Resource not found"
}
----------------------------------------------------------------------------
POST	/api/chapters
Request Payload example:
{
    "bookId" : $book->id,
    "numberChapter" : 70,
    "title" : "klmv verv vrev",
    "resumen" : "lkfwef wefwef wefewfkfwe fe"
}

Response Payload example 201:
{
    "data": {
        "id": 1751,
        "bookId": 1,
        "numberChapter": "99",
        "title": "my title",
        "resumen": "dlkfs fsdlfksdf sdlkfs"
    }
}

Response Payload 404:
{
    "message": "Book id does not exist"
}

Response Payload 500:
{
    "message": "An error occurred while creating the resource"
}
----------------------------------------------------------------------------

PUT		/api/chapters/{id}
Request Payload example:
{
    "bookId": 9,
    "numberChapter": "9",
    "title": "9",
    "resumen": "9"
}

Response Payload 200:
{
    "data": {
        "id": 54,
        "bookId": 9,
        "numberChapter": "9",
        "title": "9",
        "resumen": "9"
    }
}

Response Payload 404:
{
    "message": "Book id does not exist"
}

Response Payload 500:
{
    "message": "Cannot update the resource"
}
----------------------------------------------------------------------------

DELETE	/api/chapters/{id}
Response Payload 204:
{
    "message": "Resource deleted"
}

Response Payload 404:
{
    "message": "Resource Not Found!"
}

Response Payload 500:
{
    "message": "Cannot delete the resource"
}
----------------------------------------------------------------------------
GET		/api/chapters/findByBookId/{id}
Response Payload 200:
{
    "data": [
        {
            "id": 7,
            "bookId": 1,
            "numberChapter": "56",
            "title": "Ut cum minus voluptas eum.",
            "resumen": "Optio maxime rerum nesciunt. Vero quisquam consectetur necessitatibus sint autem. Aut rerum expedita rem ducimus consequatur iure quia."
        },
        {
            "id": 8,
            "bookId": 1,
            "numberChapter": "47",
            "title": "Qui quo quae qui dolores totam.",
            "resumen": "Architecto nostrum iste illo repellat ad delectus. Culpa accusamus saepe possimus dolore exercitationem et. Fugiat aut earum exercitationem. Ab omnis qui ut assumenda."
        },
        {
            "id": 9,
            "bookId": 1,
            "numberChapter": "22",
            "title": "Perspiciatis quo reprehenderit consequatur culpa voluptatem enim.",
            "resumen": "Consequuntur molestiae ut beatae. A delectus dicta aliquam earum nobis. Sint ipsam sed accusantium consequatur quia placeat."
        }
    ]
}

Response Payload 404:
{
    "message": "Invalid Book ID"
}