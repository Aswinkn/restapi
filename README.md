# Book Management API

### 1. Get All Books
- **URL:** `/api/books`
- **Method:** `GET`
- **Description:** Retrieves a list of all books.
- **Request Body:** None
- **Response:**
    - **Success:**
      ```json
      {
          "success": true,
          "data": [
              {
                  "id": 1,
                  "title": "The Great Gatsby",
                  "author": "F. Scott Fitzgerald",
                  "published_year": 1925,
                  "genre": "Fiction",
                  "description": "A classic novel."
              },
              ...
          ]
      }
      ```
    - **Error (No Books Found):**
      ```json
      {
          "success": false,
          "message": "No books found."
      }
      ```

---

### 2. Add a New Book
- **URL:** `/api/books`
- **Method:** `POST`
- **Request Body:**
    ```json
    {
        "title": "Add Book Title",
        "author": "Add Author",
        "published_year": 2023,
        "genre": "Add Genre",
        "description": "Add description."
    }
    ```
- **Response:**
    - **Success:**
      ```json
      {
          "success": true,
          "message": "Book added successfully!",
          "data": {
              "id": 1,
              "title": "Add Book Title",
              "author": "Add Author",
              "published_year": 2023,
              "genre": "Add Genre",
              "description": "Add description."
          }
      }
      ```
    - **Error (Validation Failure):**
      ```json
      {
          "success": false,
          "message": "The title field is required."
      }
      ```

---

### 3. Update a Book
- **URL:** `/api/books/{id}`
- **Method:** `PUT`
- **Request Body:**
    ```json
    {
        "title": "Updated Book Title",
        "author": "Updated Author",
        "published_year": 2023,
        "genre": "Updated Genre",
        "description": "Updated description."
    }
    ```
- **Response:**
    - **Success:**
      ```json
      {
          "success": true,
          "message": "Book updated successfully!",
          "data": {
              "id": 1,
              "title": "Updated Book Title",
              "author": "Updated Author",
              "published_year": 2023,
              "genre": "Updated Genre",
              "description": "Updated description."
          }
      }
      ```

---

### 4. Delete a Book
- **URL:** `/api/books/{id}`
- **Method:** `DELETE`
- **Response:**
    - **Success:**
      ```json
      {
          "success": true,
          "message": "Book deleted successfully!"
      }
      ```
    - **Error (Book Not Found):**
      ```json
      {
          "success": false,
          "message": "Book not found."
      }
      ```
