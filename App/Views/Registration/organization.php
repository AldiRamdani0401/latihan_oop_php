<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #eaeaea;
    }
    .form-container {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); /* Shadow */
    }
    .form-group label {
      color: #2a3649;
    }

  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="form-container">
        <h2 class="text-center mt-4 mb-4">Join with <a href="/"><b style="color:darkblue;">Exam</b><b style="color:skyblue;">Master</b></a></h2>
        <hr>
        <div>
          <a href="" class="btn btn-primary">Personal Data</a>
          <a href="" class="btn btn-primary">Organization Data</a>
          <a href="" class="btn btn-primary">Verfication</a>
          <a href="" class="btn btn-primary">Creating Organization Workspace</a>
        </div>
        <hr>
        <form>
          <div class="form-group">
            <label for="name">Fullname</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your fullname">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Enter your confirm password">
          </div>
          <button type="submit" class="btn btn-success btn-block">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
