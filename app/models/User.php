<?php

class User {

    private $db;

    // set up new connection to DB
    public function __construct() 
    {
        $this->db = new Database;
    }

    // get visitors data from DB
    public function getVisitors() 
    {
        $this->db->query('SELECT * FROM visitors');
        $result = $this->db->records();
        return $result;
    }

    // add visitor data into DB
    public function addVisitor($data) 
    {
        $this->db->query('INSERT INTO visitors (name, email, phone) VALUES (:name, :email, :phone)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // update visitors data in DB
    public function editVisitor($data) 
    {
        $this->db->query('UPDATE visitors SET name = :name, email = :email, phone = :phone WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get visitor ID
    public function getVisitorId($id) 
    {
        $this->db->query('SELECT * FROM visitors WHERE id = :id');
        $this->db->bind(':id', $id);
        $line = $this->db->record();
        return $line;
    }

    // delete visitors data from DB
    public function deleteVisitor(int $id) 
    {
        $this->db->query('DELETE FROM visitors WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // get genre data from DB
    public function getGenre() 
    {
        $this->db->query('SELECT * FROM genres');
        $result = $this->db->records();
        return $result;
    }

    // add new genre to DB
    public function addGenre($data) 
    {
        $this->db->query('INSERT INTO genres (genre) VALUES (:genre)');
        $this->db->bind(':genre', $data['genre']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get genre ID
    public function getGenreId($id_genre) 
    {
        $this->db->query('SELECT * FROM genres WHERE id_genre = :id_genre');
        $this->db->bind(':id_genre', $id_genre);
        $line = $this->db->record();
        return $line;
    }

    // edit genre data
    public function editGenre($data) 
    {
        $this->db->query('UPDATE genres SET genre = :genre WHERE id_genre = :id_genre');
        $this->db->bind(':id_genre', $data['id_genre']);
        $this->db->bind(':genre', $data['genre']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete genre from DB
    public function deleteGenre($data) 
    {
        $this->db->query('DELETE FROM genres WHERE id_genre = :id_genre');
        $this->db->bind(':id_genre', $data['id']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get books data from DB
    public function getBooks() 
    {
        $this->db->query('SELECT * FROM books');
        $result = $this->db->records();
        return $result;
    }

    // add new book into DB
    public function addBook($data) 
    {
        $this->db->query('INSERT INTO books (title, author, year) VALUES (:title, :author, :year)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':year', $data['year']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get books ID
    public function getBookId($id_book) 
    {
        $this->db->query('SELECT * FROM books WHERE id_book = :id_book');
        $this->db->bind(':id_book', $id_book);
        $line = $this->db->record();
        return $line;
    }

    // edit books data
    public function editBook($data) 
    {
        $this->db->query('UPDATE books SET title = :title, author = :author, year = :year WHERE id_book = :id_book');
        $this->db->bind(':id_book', $data['id_book']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':year', $data['year']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete book data from DB
    public function deleteBook($data) 
    {
        $this->db->query('DELETE FROM books WHERE id_book = :id_book');
        $this->db->bind(':id_book', $data['id']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get issues data from DB
    public function getIssues() 
    {
        $this->db->query('SELECT * FROM issues');
        $result = $this->db->records();
        return $result;
    }

    // add new book issue
    public function addIssue($data) 
    {
        $this->db->query('INSERT INTO issues (name_issue, genre_issue, book_issue) VALUES (:name_issue, :genre_issue, :book_issue)');
        $this->db->bind(':name_issue', $data['name_issue']);
        $this->db->bind(':genre_issue', $data['genre_issue']);
        $this->db->bind(':book_issue', $data['book_issue']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get issue ID
    public function getIssueId($id_issue) 
    {
        $this->db->query('SELECT * FROM issues WHERE id_issue = :id_issue');
        $this->db->bind(':id_issue', $id_issue);
        $line = $this->db->record();
        return $line;
    }

    // update book status from taken to returned
    public function returned($id_issue) 
    {
        $issue = $this->getIssueId($id_issue);
            if($issue->status !== 0) {
                $this->db->query('UPDATE issues SET status = :status_issue, date_in = NOW() WHERE id_issue = :id_issue');
                $this->db->bind(':id_issue', $id_issue);
                $this->db->bind(':status_issue', 1);

                if($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }  
        }
    }
}

?>