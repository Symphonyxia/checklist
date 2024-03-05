<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>


<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
               
           

    <div class="alert alert-success alert-dismissible fade show" id="deleteWarning" style="display: none; position: absolute; top: 0px; left: 50%; transform: translateX(-50%); border-radius: 10px;" role="alert">
        Data deleted successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <section class="example">
    <div class="card card-body col-lg-12">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="background-color:#f0a190">Title</th>
                        <th class="text-center" style="background-color:#f0a190">View</th>
                        <th class="text-center" style="background-color:#f0a190">Print</th>
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
                                echo "<td class='text-center'><a href='records.php?checklist_id=" . $row['checklist_id'] . "' class='btn btn-primary'>View</a></td>";
                                echo "<td class='text-center'><a href='#' class='btn btn-success' onclick='printRecord(" . $row['checklist_id'] . ")'>Print</a></td>";
                                echo "</tr>";
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

<?php 
include 'includes/scripts.php';
include 'includes/footer.php';
?>
<script>
    function printRecord(checklistId) {
        // Open records.php with the checklist_id parameter
        var url = 'records.php?checklist_id=' + checklistId;
        // Open a new window and navigate to the records.php page
        var newWindow = window.open(url, '_blank');
        // When the new window is fully loaded, trigger the print function
        newWindow.onload = function () {
            newWindow.print();
        };
    }
</script>

