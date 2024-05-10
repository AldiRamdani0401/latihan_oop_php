<h1>Create Organization Form</h1>
<form action="/manager/organization/create/" method="POST">
  <label for="name">Organization Name : </label>
  <input type="text" name="name" id="name" autocomplete="off"><br>
  <label for="adminLimit">Admin Limit: </label>
  <input type="number" name="adminLimit" id="adminLimit" min="1" max="10"><br>
  <label for="examLimit">Exam Limit : </label>
  <input type="number" name="examLimit" id="examLimit" min="1" max="20"><br>
  <label for="examineeLimit">Examinee Limit : </label>
  <input type="number" name="examineeLimit" id="examineeLimit" min="1" max="100"><br>
  <button type="submit">Create Organization</button>
</form>