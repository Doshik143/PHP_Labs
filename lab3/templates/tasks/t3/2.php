<?php
include('../../parts/tasksParts/header3_2.php');
include('../../parts/tasksParts/main3_2.php');
?>
<br>
    <div class="card">
    <div class="header">
        <span class="title">Available files</span>
    </div>
        <ul class="lists">
            <?php
            $files = glob(__DIR__ . '/*.txt');
            foreach ($files as $file) {
                echo '
        <li class="list">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span>' . basename($file) . '</span>
        </li>';
            }
            ?>
        </ul>
    </div>

<?php
include('../../parts/footer.php');
?>