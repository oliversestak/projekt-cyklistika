<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>

<h2>Detail etapy <?= esc($stage['number']) ?>: <?= esc($stage['departure']) ?> – <?= esc($stage['arrival']) ?></h2>

<p>Délka: <?= esc($stage['distance']) ?> km</p>
<p>Typ: <?= esc($stage['parcour_type']) ?></p>
<p>Převýšení: <?= esc($stage['vertical_meters']) ?> m</p>
<p><img src="<?= base_url('profiles/' . $stage['profile']) ?>" alt="Profil etapy" style="max-width:400px;"></p>

<h3>Celkové pořadí po etapě</h3>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Závodník</th>
            <th>Země</th>
            <th>Čas</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $i => $rider): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= esc($rider['first_name'] . ' ' . $rider['last_name']) ?></td>
                <td><img src="<?= base_url('node_modules/flag-icons/flags/1x1/' . strtolower($rider['country']) . '.svg') ?>" width="24"> </td>
                <td><?= esc($rider['time']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>