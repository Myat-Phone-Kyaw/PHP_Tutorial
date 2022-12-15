<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_05</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $myfile = fopen("file/sample.txt", "r") or die("Unable to open file!");
    $txt = fread($myfile, filesize("file/sample.txt"));
    fclose($myfile);

    require './lib/vendor/autoload.php';
    $content = '';
    $reader = \PhpOffice\PhpWord\IOFactory::createReader("Word2007");
    $phpWord = $reader->load("file/sample.docx");
    foreach ($phpWord->getSections() as $section) {
        foreach ($section->getElements() as $element) {
            if (method_exists($element, 'getElements')) {
                foreach ($element->getElements() as $childElement) {
                    if (method_exists($childElement, 'getText')) {
                        $content .= $childElement->getText() . ' ';
                    } else if (method_exists($childElement, 'getContent')) {
                        $content .= $childElement->getContent() . ' ';
                    }
                }
            } else if (method_exists($element, 'getText')) {
                $content .= $element->getText() . ' ';
            }
        }
    }

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $xlsx = $reader->load("file/sample.xlsx");
    $excel_data = $xlsx->getActiveSheet()->toArray();

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    $csv = $reader->load("file/sample.csv");
    $csv_data = $csv->getActiveSheet()->toArray();
    ?>
    <div class="container">
        <h2>Text file .txt</h2>
        <p>
            <?php echo $txt; ?>
        </p>
        <h2>Document word file .doc</h2>
        <p>
            <?php echo $content; ?>
        </p>
        <h2>Excel file .xlsx</h2>
        <table>
            <?php foreach ($excel_data as $excel) { ?>
            <tr>
                <?php foreach ($excel as $key => $value) { ?>
                <td>
                    <?php echo $value; ?>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
        <h2>.csv</h2>
        <table>
            <?php foreach ($csv_data as $comma) { ?>
            <tr>
                <?php foreach ($comma as $key => $value) { ?>
                <td>
                    <?php echo $value; ?>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>