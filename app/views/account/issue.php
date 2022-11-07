<!-- link header with constant -->
<?php require ROUTE_APP . '/views/inc/header.php'; ?>

<!-- using bootstrap form -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 mx-auto">
                <h1>Видача</h1>
                <!-- selects with visitor, genre and book data -->
                <form action="<?php echo ROUTE_URL; ?>account/addIssue" method="POST">
                <div class="form-group">
                    <select name="name_issue" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <?php foreach($data['visitors'] as $visitor) : ?>
                        <option value="<?php echo $visitor->name; ?>">
                        <?php echo $visitor->name; ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="genre_issue" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <?php foreach($data['genres'] as $genre) : ?>
                        <option value="<?php echo $genre->genre; ?>">
                        <?php echo $genre->genre; ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="book_issue" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <?php foreach($data['books'] as $book) : ?>
                        <option value="<?php echo $book->title; ?>">
                        <?php echo $book->title; ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" id="issue" value="Видати книгу" class="btn btn-primary">
                </div>      
            </div>
        </div>
        <div class="col-md-12">
        <!-- free jQuery datatable -->
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Ім'я та прізвище</th>
                    <th>Жанр</th>
                    <th>Книга</th>
                    <th>Видано</th>
                    <th>Статус</th>
                    <th>Повернено</th>
                </tr>
            </thead>
            <tbody>
            <!-- iterate over the array with data extracted from database -->
        <?php foreach($data['issues'] as $issue) : ?>
            <tr>
                <td><?php echo $issue->name_issue; ?></td>
                <td><?php echo $issue->genre_issue; ?></td>
                <td><?php echo $issue->book_issue; ?></td>
                <td><?php echo $issue->date_out; ?></td>
                <td>
                    <form action="<?php echo ROUTE_URL; ?>account/status/<?php echo $issue->id_issue ?>" method="POST">
                        <div class="d-flex justify-content-between">
                            <?php if($issue->status ==0) {
                                echo '<input type="submit" value="Видано" class="btn btn-success">';
                                } else {
                                    echo '<input type="submit" value="Повернено" class="btn btn-danger disabled">';
                                } ?>
                        </div>
                    </form>
                </td>
                <td><?php echo $issue->date_in; ?></td>
            </tr>
        <?php endforeach; ?>
            </tbody>
            </table><br><br>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<?php require ROUTE_APP . '/views/inc/footer.php'; ?>