<h1>Halaman Organisasi Anda</h1>

<table>
  <tr>
    <th align="left">Organization ID :</th>
    <td>:</td>
    <td><?= $data['id'] ?></td>
  </tr>
  <tr>
    <th align="left">Organization Name :</th>
    <td>:</td>
    <td><?= $data['name'] ?></td>
  </tr>
  <tr>
    <th align="left">Admin Limit :</th>
    <td>:</td>
    <td><?= $data['admin_limit'] ?></td>
  </tr>
  <tr>
    <th align="left">Exam Limit :</th>
    <td>:</td>
    <td><?= $data['exam_limit'] ?></td>
  </tr>
  <tr>
    <th align="left">Examinee Limit :</th>
    <td>:</td>
    <td><?= $data['examinee_limit'] ?></td>
  </tr>
  <tr>
    <th align="left">Member Admin Code :</th>
    <td>:</td>
    <td><?= $data['member_admin_code'] ?></td>
  </tr>
  <tr>
    <th align="left">Member Examinee Code :</th>
    <td>:</td>
    <td><?= $data['member_examinee_code'] ?></td>
  </tr>
  <tr>
    <th align="left">Created At :</th>
    <td>:</td>
    <td><?= $data['created_at'] ?></td>
  </tr>
  <tr>
    <th align="left">Updated At :</th>
    <td>:</td>
    <td><?= $data['updated_at'] ?></td>
  </tr>
</table>
<br><br>
<button><a href="/manager/organization/exam/create?org=<?=$data['id']?>">Add New Exam</a></button>