<?php
include 'includes/header.php';
include 'includes/navbar.php';

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT checklist_id, year FROM checklist WHERE 1=1";

if (!empty($search)) {
    $sql .= " AND year LIKE :search";
    $searchParam = "%$search%";
}

$stmt = $pdo->prepare($sql);

if (!empty($search)) {
    $stmt->bindValue(':search', $searchParam, PDO::PARAM_STR);
}

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$totalRows = count($results);
$totalPages = ceil($totalRows / $limit);
?>

<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-sm-6">
                    <form method="GET" action="">
                        <label for="search">Search:</label>
                        <input type="text" name="search" id="search" value="<?php echo $search; ?>">
                        <button type="submit" class="btn btn-primary btn-sm rounded-s">Search</button>
                        <?php
                        // Display cancel search button if a search term is provided
                        if (!empty($search)) {
                            echo '<a href="?page=1" class="btn btn-danger btn-sm rounded-s">Cancel Search</a>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-success alert-dismissible fade show" id="deleteWarning" style="display: none; position: absolute; top: 0px; left: 50%; transform: translateX(-50%); border-radius: 10px;" role="alert">
        Data deleted successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <section class="example">
        <div class="card card-body col-lg-12">
            <div class="card-body">
                <br>
                <div class="d-flex justify-content-center"> <!-- Added this div -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($results as $row) {
                                echo "<tr>";
                                echo "<td class='text-left'>" . $row['year'] . "</td>";
                                echo "<td class='text-center'><a href='view_questions.php?id=" . $row['checklist_id'] . "' class='btn btn-primary'>View</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div> <!-- Added this div -->
                <div class="alert alert-warning alert-dismissible fade show" id="deleteWarning" style="display: none;" role="alert">
                    Error deleting record. Please try again later.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <br>
    <nav class="text-xs-center">
        <ul class="pagination justify-content-center">
            <?php
            if ($page > 1) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "&search=" . urlencode($search) . "'>&laquo; Previous</a></li>";
            } else {
                echo "<li class='page-item disabled'><span class='page-link'>&laquo; Previous</span></li>";
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i&search=" . urlencode($search) . "'>$i</a></li>";
            }
            if ($page < $totalPages) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "&search=" . urlencode($search) . "'>Next &raquo;</a></li>";
            } else {
                echo "<li class='page-item disabled'><span class='page-link'>Next &raquo;</span></li>";
            }
            ?>
        </ul>
    </nav>
</article>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>
