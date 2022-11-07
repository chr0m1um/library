<?php 

class Account extends Controller 
{   
    // model constructing
    public function __construct() 
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $visitors = $this->userModel->getVisitors();
        $data = [
            'visitors' => $visitors
        ];
        $this->view('account/index', $data);
    }

    public function addVisitor() 
    {
        // using POST method for adding data to DB
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                // convert unwanted special characters and delete unnecessary spaces before inserting into DB
                'name'  => htmlspecialchars(trim($_POST['name'])), 
                'email' => htmlspecialchars(trim($_POST['email'])),
                'phone' => htmlspecialchars(trim($_POST['phone'])) 
            ];

            if($this->userModel->addVisitor($data)) {
                redirect('account'); // redirect to view page
            } else {
                die('Adding visitor error'); // error report
            }
        } else {
            $data = [
                'name' =>  '',
                'email' => '',
                'phone' => '',
            ];
        } 
        $this->view('account', $data);
    }

    public function editVisitor($id) 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id'    => $id,
                'name'  => htmlspecialchars(trim($_POST['name'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'phone' => htmlspecialchars(trim($_POST['phone'])) 
            ];

            if($this->userModel->editVisitor($data)) {
                redirect('account');
            } else {
                die('Editing visitor error');
            }
        } else {
            $visitor = $this->userModel->getVisitorId($id);
            $data = [
                'id'    => $visitor->id,
                'name'  => $visitor->name,
                'email' => $visitor->email,
                'phone' => $visitor->phone
            ];
        } 
        $this->view('account/editVisitor', $data); 
    }

    public function deleteVisitor($id) 
    {
        $visitor = $this->userModel->getVisitorId($id);
        $data = [
            'id'    => $visitor->id,
            'name'  => $visitor->name,
            'email' => $visitor->email,
            'phone' => $visitor->phone
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->userModel->deleteVisitor($data['id'])) {
                redirect('account');
            } else {
                die('Deleting visitor error');
            }
        }
        $this->view('account/deleteVisitor', $data); 
           
    }

    public function genres() 
    {
        $genres = $this->userModel->getGenre();
        $data = [
            'genres' => $genres
        ];
        $this->view('account/genres', $data);
    }

    public function addGenre() 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'genre' => htmlspecialchars(trim($_POST['genre'])),
            ];

            if($this->userModel->addGenre($data)) {
                redirect('account/genres');
            } else {
                die('Adding genre error');
            }
        } else {
            $data = [
                'genre' => '',
            ];
        } 
        $this->view('account/genres', $data);
    }

    public function editGenre($id_genre) 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_genre' => $id_genre,
                'genre'    => htmlspecialchars(trim($_POST['genre'])),
            ];

            if($this->userModel->editGenre($data)) {
                redirect('account/genres');
            } else {
                die('Editing genre error');
            }
        } else {
            $genre = $this->userModel->getGenreId($id_genre);
            $data = [
                'id_genre' => $genre->id_genre,
                'genre'    => $genre->genre,
            ];
        } 
        $this->view('account/editGenre', $data); 
    }

    public function deleteGenre(int $id_genre) {
        $genre = $this->userModel->getGenreId($id_genre);
            $data = [
                'id_genre' => $genre->id_genre,
                'genre' => $genre->genre,
            ];
    
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id_genre,
            ];
    
            if($this->userModel->deleteGenre($data)) {
                redirect('account/genres');
            } else {
                die('Deleting genre error');
            }
        }
        $this->view('account/deleteGenre', $data); 
    }
    
    public function books() 
    {
        $books = $this->userModel->getBooks();
        $data = [
            'books' => $books
        ];
        $this->view('account/books', $data);
    }

    public function addBook() 
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title'  => htmlspecialchars(trim($_POST['title'])),
                'author' => htmlspecialchars(trim($_POST['author'])),
                'year'   => htmlspecialchars(trim($_POST['year']))
            ];

            if($this->userModel->addBook($data)) {
                redirect('account/books');
            } else {
                die('Adding book error');
            }
        } else {
            $data = [
                'title'  => '',
                'author' => '',
                'year'   => '',
            ];
        } 
        $this->view('account/books', $data);
    }

    public function editBook($id_book) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_book' => $id_book,
                'title'   => htmlspecialchars(trim($_POST['title'])),
                'author'  => htmlspecialchars(trim($_POST['author'])),
                'year'    => htmlspecialchars(trim($_POST['year']))
            ];

            if($this->userModel->editBook($data)) {
                redirect('account/books');
            } else {
                die('Editing book error');
            }
        } else {
            $book = $this->userModel->getBookId($id_book);
            $data = [
                'id_book' => $book->id_book,
                'title'   => $book->title,
                'author'  => $book->author,
                'year'    => $book->year,
            ];
        } 
        $this->view('account/editBook', $data); 
    }

    public function deleteBook($id_book) 
    {
        $book = $this->userModel->getBookId($id_book);
        $data = [
            'id_book' => $book->id_book,
            'title'   => $book->title,
            'author'  => $book->author,
            'year'    => $book->year,
        ];
    
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id_book
            ];

            if($this->userModel->deleteBook($data)) {
                redirect('account/books');
            } else {
                die('Deleting book error');
            }
        }
        $this->view('account/deleteBook', $data); 
    }

    public function issue() 
    {
        $data = [
            'visitors' => $this->userModel->getVisitors(),
            'genres' => $this->userModel->getGenre(),
            'books' => $this->userModel->getBooks(),
            'issues' => $this->userModel->getIssues()
        ];
        $this->view('account/issue', $data);
    }

    public function addIssue() 
    {
        $data = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name_issue'  => htmlspecialchars(trim($_POST['name_issue'])),
                'genre_issue' => htmlspecialchars(trim($_POST['genre_issue'])),
                'book_issue'  => htmlspecialchars(trim($_POST['book_issue'])),
            ];

            if($this->userModel->addIssue($data)) {
                redirect('account/issue');
            } else {
                die('Issue adding error');
            }
        }
        $this->view('account/issue', $data);
    }

    public function status($id_issue) 
    {
        if($this->userModel->returned($id_issue)) {
            redirect('account/issue');
        } else {
            die('Update status error');
        }
    }
}


?>