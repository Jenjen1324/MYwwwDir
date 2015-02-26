<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/style/bootstrap.min.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <h1>Login</h1>
      <form method="post" action="checklogin.php">
        <table>
          <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit"></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
