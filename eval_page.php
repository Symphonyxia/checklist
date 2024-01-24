<?php
include 'header.php';
include 'sidebar.php';

// Fetch distinct years from checklist_result
$getDistinctYearsStmt = $pdo->prepare('SELECT DISTINCT c.year FROM checklist c JOIN checklist_result cr ON c.checklist_id = cr.checklist_id');
$getDistinctYearsStmt->execute();
$distinctYears = $getDistinctYearsStmt->fetchAll(PDO::FETCH_COLUMN);
?>

<article class="my-article">
    <div class="title-search-block">
        <div class="title-block">

            <div class="card col-lg-12">

                <div class="card-body">

                    <div class="row">

                        <form method="get" action="">
                            <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
                            <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">
                            <label for="yearSelect">Select Year:</label>
                            <select id="yearSelect" name="selectedYear">
                                <?php foreach ($distinctYears as $distinctYear): ?>
                                    <option value="<?php echo $distinctYear; ?>" <?php echo (isset($_GET['searchByYear']) && $_GET['selectedYear'] == $distinctYear) ? 'selected' : ''; ?>>
                                        <?php echo $distinctYear; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" name="searchByYear" class="btn btn-primary btn-sm">Search</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <?php
    // Initialize $selectedYear to an empty string
    $selectedYear = '';

    // Check if a specific year is selected
    if (isset($_GET['searchByYear'])) {
        $selectedYear = $_GET['selectedYear'];
    }

    // Fetch content for the accordion section based on the selected year or the default value
    $getAccordionContentStmt = $pdo->prepare('
    SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no
    FROM checklist c
    JOIN checklist_result cr ON c.checklist_id = cr.checklist_id
    JOIN questions q ON cr.questions_id = q.questions_id
    WHERE c.year = :year
');
    $getAccordionContentStmt->execute(['year' => $selectedYear]);
    $accordionContent = $getAccordionContentStmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if (!empty($selectedYear)): ?>
        <button type="button" class="accordion">Year
            <?php echo $selectedYear; ?>
        </button>
        <div class="panel">
            <?php
            // Fetch content for the accordion section based on the year
            $getAccordionContentStmt = $pdo->prepare('
            SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no
            FROM checklist c
            JOIN checklist_result cr ON c.checklist_id = cr.checklist_id
            JOIN questions q ON cr.questions_id = q.questions_id
            WHERE c.year = :year
        ');
            $getAccordionContentStmt->execute(['year' => $selectedYear]);
            $accordionContent = $getAccordionContentStmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <form method="post" action="resources/dr/submit_results.php" class="resultsForm">
                <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
                <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Result Yes</th>
                            <th>Result No</th>
                            <th>Max Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($accordionContent)): ?>
                            <?php
                            $currentGroup = null; // Initialize a variable to store the current group name
                            foreach ($accordionContent as $content) {
                                if ($currentGroup !== $content['group']) {
                                    // Display the group name only if it has changed
                                    echo '<tr><td colspan="5"><strong>' . htmlspecialchars($content['group']) . '</strong></td></tr>';
                                    $currentGroup = $content['group'];
                                }
                                ?>
                                <tr>
                                    <td>
                                        <?php echo htmlspecialchars($content['display_text']); ?>
                                    </td>
                                    <td class="checkbox1">
                                        <input type="checkbox"
                                            name="result_yes[<?php echo $content['checklist_id']; ?>][<?php echo $content['questions_id']; ?>]"
                                            value="1" <?php echo ($content['result_yes'] == 1) ? 'checked' : ''; ?>>
                                    </td>
                                    <td class="checkbox2">
                                        <input type="checkbox"
                                            name="result_no[<?php echo $content['checklist_id']; ?>][<?php echo $content['questions_id']; ?>]"
                                            value="1" <?php echo ($content['result_no'] == 1) ? 'checked' : ''; ?>>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($content['max_points']); ?>
                                    </td>
                                </tr>

                            <?php } ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No data available for this year.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <br>
                <button type="submit" name="submitResultsButton" class="btn btn-primary">Submit Results</button>
            </form>
        </div>

    <?php endif; ?>
</article>

<?php include 'footer.php'; ?>
