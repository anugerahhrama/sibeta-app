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
    <?php if (!empty($contacts)): ?>
        <div class="p-6 border-2 rounded-3xl mb-4 mt-4">
            <div class="flex items-center justify-between mb-4">
                <h1 class="font-semibold text-lg">
                    <?= htmlspecialchars($userProdi) ?>
                </h1>
            </div>
            <hr class="border sm:mx-auto lg:my-4" />
            <div class="grid md:grid-cols-2 gap-2">
                <?php foreach ($contacts as $contact): ?>
                    <?php
                    // Proses nomor telepon: Ganti 0 di awal dengan 62
                    $contactNumber = $contact['contact_method'];
                    if (substr($contactNumber, 0, 1) === '0') {
                        $contactNumber = '62' . substr($contactNumber, 1);
                    }
                    ?>
                    <div>
                        <div class="flex items-center mb-4">
                            <p class="font-medium text-base">
                                <?= htmlspecialchars($contact['contact_name']) ?></br>(<?= htmlspecialchars($contact['contact_method']) ?>)
                            </p>
                        </div>
                        <a href="https://wa.me/<?= htmlspecialchars($contactNumber) ?>" target="_blank" id="editButton" class="font-medium text-base text-white px-6 py-2.5 bg-[#0D6EFD] hover:bg-[#0C5CCA] rounded-2xl focus:ring-4 focus:ring-[#0D6EFD]">
                            Hubungi
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="p-6 border-2 rounded-3xl mb-4 mt-4">
            <h1 class="font-semibold text-lg">
                <?= htmlspecialchars($userProdi) ?>
            </h1>
            <hr class="border sm:mx-auto lg:my-4" />
            <p class="text-gray-500">Tidak ada bantuan yang tersedia untuk prodi ini.</p>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>
