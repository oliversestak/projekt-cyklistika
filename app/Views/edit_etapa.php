<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>

<h2>Editace etapy <?= esc($stage['number']) ?></h2>

<form method="post" action="<?= site_url('main/updateEtapa') ?>">
    <input type="hidden" name="id" value="<?= esc($stage['id']) ?>">

    <label>Start</label>
    <input type="text" name="departure" value="<?= esc($stage['departure']) ?>" required><br>

    <label>Cíl</label>
    <input type="text" name="arrival" value="<?= esc($stage['arrival']) ?>" required><br>

    <label>Datum</label>
    <input type="date" name="date" value="<?= esc($stage['date']) ?>" required><br>

    <label>Číslo etapy</label>
    <select name="number" required>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <option value="<?= $i ?>" <?= ($stage['number'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
        <?php endfor; ?>
    </select><br>

    <label>Délka (km)</label>
    <input type="number" step="0.1" name="distance" value="<?= esc($stage['distance']) ?>" required><br>

    <button type="submit">Uložit změny</button>
</form>

<?= $this->endSection() ?>