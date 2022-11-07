<!-- link header with constant -->
<?php require ROUTE_APP . '/views/inc/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1>Видалити дані</h1>
            <form action="<?php echo ROUTE_URL; ?>account/deleteGenre/<?php echo $data['id_genre']; //get genre ID ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="genre" class="form-control" placeholder="Жанр" value="<?php echo $data['genre']; ?>" readonly><br>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="submit" value="Видалити відвідувача" class="btn btn-primary">
                    <a href="<?php echo ROUTE_URL; ?>account/genres" class="btn btn-danger">Назад</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- link footer with constant -->
<?php require ROUTE_APP . '/views/inc/footer.php'; ?>