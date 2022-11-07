<!-- link header with constant -->
<?php require ROUTE_APP . '/views/inc/header.php'; ?>

<!-- using bootstrap form -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-8 mx-auto">
                <h1>Книги</h1>
                <form action="<?php echo ROUTE_URL; ?>/account/addBook" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Назва книги" value="" required><br>
                    </div>

                    <div class="form-group">
                        <input type="text" name="author" class="form-control" placeholder="Автор" value="" required><br>
                    </div>

                    <div class="form-group">
                        <input type="text" name="year" class="form-control" placeholder="Рік випуску" value="" required><br>
                    </div>

                    <div class="form-group">
                    <input type="submit" value="Додати книгу" class="btn btn-primary">
                    </div>
                </form>       
            </div>
        </div>
        <div class="col-md-8">
        <!-- free jQuery datatable -->
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Назва книги</th>
                    <th>Автор</th>
                    <th>Рік випуску</th>
                    <th>Змінити</th>
                    <th>Видалити</th>
                </tr>
            </thead>
            <tbody>
        <!-- iterate over the array with data extracted from database --> 
        <?php foreach($data['books'] as $book) : ?>
            <tr>
                <td><?php echo $book->title; ?></td>
                <td><?php echo $book->author; ?></td>
                <td><?php echo $book->year; ?></td>
                <!-- edit and delete book buttons -->
                <td><a href="<?php echo ROUTE_URL; ?>account/editBook/<?php echo $book->id_book; ?>" class="btn btn-warning">Змінити</a></td>
                <td><a href="<?php echo ROUTE_URL; ?>account/deleteBook/<?php echo $book->id_book; ?>" class="btn btn-danger">Видалити</a></td>
            </tr>
        <?php endforeach; ?>
            </tbody>
            </table><br><br>
        </div>
    </div>
</div>
<!-- script for correct work of jQuery datatable -->
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<!-- link footer with constant -->
<?php require ROUTE_APP . '/views/inc/footer.php'; ?>
