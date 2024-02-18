<div class="card">
  <div class="card-body overflow-auto">
    <table class="table table-sm table-responsive align-middle">
      <thead class="align-middle text-nowrap">
        <?php foreach ($tableColumns as $column) : ?>
          <th style="min-width: 160px;"><?= $column; ?></th>
        <?php endforeach; ?>
      </thead>
      <tbody>
        <?php foreach ($tableData as $item) : ?>
          <tr>
            <?php foreach ($item as $itemData) : ?>
              <td><?= $itemData; ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <nav>
      <ul class="pagination">

      </ul>
    </nav>
  </div>
</div>