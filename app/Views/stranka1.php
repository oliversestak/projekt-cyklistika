<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>


<h1>Etapy závodu La Tropicale Amissa Bongo 2023</h1>

<?php
$table = new \CodeIgniter\View\Table();


$table->setTemplate([
    'table_open' => '<table class="table table-bordered table-striped table-hover">'
]);

$table->setHeading(['Číslo', 'Start', 'Cíl', 'Délka (km)', 'Vítěz', 'Detail', 'Editace']);


foreach ($stages as $stage) {
    $table->addRow([
        esc($stage['number']),
        esc($stage['departure']),
        esc($stage['arrival']),
        esc($stage['distance']),
        esc($stage['winner'] ?? '—'), // pokud není dostupný vítěz
        '<a class="btn btn-sm btn-info" href="' . site_url('main/etapa/' . $stage['id']) . '">Detail</a>',
        '<a class="btn btn-sm btn-warning" href="' . site_url('main/editEtapa/' . $stage['id']) . '">Edit</a>'
    ]);
}


echo $table->generate();
?>

<?= $this->endSection() ?>
