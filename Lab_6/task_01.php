<?php

class FileManager {
    private string $directory;

    public function __construct() {
        $this->directory = realpath('files') . '/';
    }

    public function getFiles() {
        return array_diff(scandir($this->directory), ['.', '..']);
    }

    public function getFileList() {
        echo '<ul>' . PHP_EOL;
        $files = $this->getFiles();
        foreach ($files as $filename) {
            echo '<li><a href="task_01.php?action=download&filename=' . $filename . '">' . $filename . '</a></li>' . PHP_EOL;
        }
        echo '</ul>';
    }

    public function upload(array $fileData) {
        $uploadFile = $this->directory . $fileData['name'];
        copy($fileData['tmp_name'], $uploadFile);
    }

    public function getRequest() {
        $r = array_merge($_POST, $_GET);
        if (in_array('download', $r)) {
            $file = $this->directory . '/' . $r['filename'];
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
        } else if (in_array('delete', $r)) {
            $file = $this->directory . '/' . $r['filename'];
            unlink($file);
            header('Refresh:0');
            exit();
        }
    }
}

$manager = new FileManager();

echo '<form method="post" enctype="multipart/form-data">' . PHP_EOL . '<input type="file" name="file">' .
		PHP_EOL . '<input type="submit" value="Upload">' . PHP_EOL . '</form>';
if ($_FILES)
    $manager->upload($_FILES['file']);

$files = $manager->getFiles();
echo '<form method="post">' . PHP_EOL . '<input hidden name="action" value="delete">' . PHP_EOL . '<select name="filename">' . PHP_EOL;
foreach ($files as $filename)
    echo '<option value="' . $filename . '">' . $filename . '</option>' . PHP_EOL;
echo '</select>' . PHP_EOL . '<input type="submit" value="Delete">' . PHP_EOL . '</form>';
$manager->getRequest();
$manager->getFileList();