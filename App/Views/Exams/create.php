<?php
  $categories = $data[1];
  $admins = $data[2];
?>
<h1>Create Exam Form</h1>
<form action="/manager/organization/exam/create/" method="POST">
  <input type="hidden" name="orgId" value="<?= $_POST['org']?>">
  <table>
    <tr>
      <th>
        <label for="name">Exam Name</label>
      </th>
      <td>
        <input type="text" name="name" id="name" autocomplete="off"><br>
      </td>
    </tr>
    <tr>
      <th>
        <label for="category">Exam Category</label>
      </th>
      <td>
      <select name="category" id="category">
        <?php foreach($categories as $category)  :?>
          <option value="<?=$category?>"><?=$category?></option>
        <?php endforeach;  ?>
      </select>
      </td>
    </tr>
    <tr>
      <table>
        <thead>
          <th>No</th>
          <th>Admin</th>
          <th>select</th>
        </thead>
        <tbody>
        <?php foreach($admins as $key => $admin) : ?>
            <tr>
              <td><?= $key + 1?></td>
              <td><?= $admin?></td>
              <td>
                <input type="checkbox" name="admin[]" value="<?= $admin?>">
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </tr>
  </table>
  <br><br>
  <button><a href="<?=$data[0]?>">Kembali</a></button>
  <button type="submit">Create Organization</button>
</form>