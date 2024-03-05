<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-sm-6">
                
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
        <div class="d-flex justify-content-center"> <!-- Added this div -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="background-color:#f0a190">Title</th>
                        <th class="text-center" style="background-color:#f0a190">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($pdo) {
                        $sql = "SELECT checklist_id, year FROM checklist";
                        $stmt = $pdo->query($sql);

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td class='text-left'>" . $row['year'] . "</td>";
                                echo "<td class='text-center'><a href='view_questions.php?id=" . $row['checklist_id'] . "' class='btn btn-primary'>View</a></td>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Database connection failed.</td></tr>";
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
</article>


<script>
    function deleteRecord(id) {
        if (confirm('Are you sure you want to delete this record?')) {

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {

                        document.getElementById('deleteWarning').innerHTML = 'Data deleted successfully.';
                        document.getElementById('deleteWarning').style.display = 'block';


                        setTimeout(function() {
                            window.location.reload();
                        }, 500);
                    } else {

                        var errorMessage = xhr.responseText.trim();
                        if (errorMessage) {

                            alert(errorMessage);
                        } else {
                            alert('Error deleting record. Please try again later.');
                        }
                    }
                }
            };
            xhr.open('POST', 'delete.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + id);
        }
    }
</script>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
 ?>