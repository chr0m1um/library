<!-- link header with constant -->
<?php require ROUTE_APP . '/views/inc/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1>Видалити дані</h1>
            <form action="<?php echo ROUTE_URL; ?>account/deleteVisitor/<?php echo $data['id'] //get visitor ID ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Ім'я та прізвище" value="<?php echo $data['name']; ?>" readonly><br>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $data['email']; ?>" readonly><br>
                </div>

                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Телефон" value="<?php echo $data['phone']; ?>" readonly><br>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="submit" value="Видалити відвідувача" class="btn btn-primary">
                    <a href="<?php echo ROUTE_URL; ?>account/" class="btn btn-danger">Назад</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- link footer with constant -->
<?php require ROUTE_APP . '/views/inc/footer.php'; ?>