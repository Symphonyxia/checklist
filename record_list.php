<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<br>
<div class="container">
<section class="example">
    <div class="d-flex justify-content-center">
        <table class="table table-bordered" id="recordstable">
            <thead>
                <tr>
                    <th class="text-center" style="background-color:#f0a190">Title</th>
                    <th class="text-center" style="background-color:#f0a190">View</th>
                    <th class="text-center" style="background-color:#f0a190">Print</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $conn = new PDO("mysql:host=localhost;dbname=checklist", 'root', '');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->query("SELECT checklist_id, year FROM checklist");

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td class='text-left'>" . $row['year'] . "</td>";
                        echo "<td class='text-center'><a href='records.php?checklist_id=" . $row['checklist_id'] . "' class='btn btn-primary'>View</a></td>";
                        echo "<td class='text-center'><a href='#' class='btn btn-success' onclick='printRecord(" . $row['checklist_id'] . ")'>Print</a></td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>

 
</section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #recordstable_wrapper {
        width: 100%;
    }
</style>

<script>
    $(document).ready(function () {
        $('#recordstable').DataTable({
            "scrollY": "300px" 
        });
    });

    function printRecord(checklistId) {
        var url = 'records.php?checklist_id=' + checklistId;
        var newWindow = window.open(url, '_blank');
        newWindow.onload = function () {
            newWindow.print();
        };
    }

</script>

<?php
include 'includes/footer.php';
?>
