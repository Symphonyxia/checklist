<?php
include 'header.php';
include 'sidebar.php';

$getDistinctYearsStmt = $pdo->prepare('SELECT DISTINCT year FROM checklist');
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
                            <label for="yearSelect">Select Year:</label>
                            <select id="yearSelect" name="selectedYear">
                                <?php foreach ($distinctYears as $distinctYear) : ?>
                                    <option value="<?= $distinctYear; ?>" <?php echo (isset($_GET['selectedYear']) && $_GET['selectedYear'] == $distinctYear) ? 'selected' : ''; ?>>
                                        <?= $distinctYear; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" name="searchByYear" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <?php
    $selectedYear = '';

    if (isset($_GET['selectedYear'])) {
        $selectedYear = $_GET['selectedYear'];

        $getAccordionContentStmt = $pdo->prepare('
        SELECT q.group, q.display_text, q.max_points, cr.checklist_id, cr.questions_id, cr.result_yes, cr.result_no
        FROM checklist c
        JOIN checklist_result cr ON c.checklist_id = cr.checklist_id
        JOIN questions q ON cr.questions_id = q.questions_id
        WHERE c.year = :selectedYear
    ');
        $getAccordionContentStmt->execute(['selectedYear' => $selectedYear]);
        $accordionContent = $getAccordionContentStmt->fetchAll(PDO::FETCH_ASSOC);

        $groupedAccordionContent = [];
        foreach ($accordionContent as $content) {
            $groupedAccordionContent[$content['checklist_id']][] = $content;
        }
    }

    $getQuestionsStmt = $pdo->prepare('SELECT * FROM questions');
    $getQuestionsStmt->execute();
    $questions = $getQuestionsStmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if (!empty($selectedYear) && !empty($groupedAccordionContent)) : ?>
        <?php foreach ($groupedAccordionContent as $checklistId => $items) : ?>
            <br>
            <hr>
            <div class="edit-panel">
                <br>
                <div class="card col-lg-12">
                    <div class="card-body">
                        <div class="container">
                            <form action="resources/dr/search.php" method="post" class="row g-3">
                                <?php foreach ($items as $content) : ?>
                                    <div class="col-md-4">
                                        <label for="group">Enter Group:</label>
                                        <input type="text" class="form-control" name="group[]" value="<?= htmlspecialchars($content['group']); ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="display_text">Enter Text:</label>
                                        <input type="text" class="form-control" name="display_text[]" value="<?= htmlspecialchars($content['display_text']); ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="max_points">Enter Points:</label>
                                        <input type="number" class="form-control" name="max_points[]" value="<?= $content['max_points']; ?>">

                                        <input type="hidden" name="question_id[]" value="<?= $content['questions_id']; ?>">
                                    </div>
                                <?php endforeach; ?>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary" name="updateform">Update Questions</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    <?php endif; ?>
</article>

<?php include 'footer.php'; ?>
