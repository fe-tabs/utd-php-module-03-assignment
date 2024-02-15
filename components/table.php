<table>
  <thead>
    <?php foreach ($tableColumns as $column) : ?>
      <th><?= $column; ?></th>
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