<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>

<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Bantuan
            </h1>
        </div>

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>

    </div>
    <div class="menu-bantuan">
        <?php var_dump($data)?>
        <?php foreach ($groupedData as $prodiName => $contact): ?>
        <div class="flex items-center justify-between mb-4">
            <h1 class="font-semibold text-lg">
                <?= htmlspecialchars($prodiName); ?>
            </h1>
            <a href="<?= $router->route('bantuan-tambah') ?>" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
                Tambah
            </a>
        </div>
        <hr class="border sm:mx-auto lg:my-4" />
        <div class="grid md:grid-cols-2 gap-6">
            <?php foreach ($contacts as $contact): ?>
                <div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="mr-2">
                        <p class="font-medium text-base">
                            <?= htmlspecialchars($contact['contact_name']); ?> (<?= htmlspecialchars($contact['contact_method']); ?>)
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    </div>
    <?php if (!empty($groupedData)): ?>
    <?php foreach ($groupedData as $prodiName => $contacts): ?>
        <h3><?= htmlspecialchars($prodiName); ?></h3>
        <ul>
            <?php foreach ($contacts as $contact): ?>
                <li>
                    <?= htmlspecialchars($contact['contact_name']); ?> 
                    (<?= htmlspecialchars($contact['contact_method']); ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
<?php else: ?>
    <p>No data available.</p>
<?php endif; ?>


</div>






<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>