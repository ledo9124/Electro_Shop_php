<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electronic Shop</title>
    <link rel="stylesheet" href="../asset/css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <div id="wrapper">
      <form class="form" id="register">
        <p class="title">Register</p>
        <p class="message">Signup now and get full access to our website.</p>
        <div class="flex">
          <div class="form-group">
            <input
              rules="required"
              name="firstname"
              placeholder=""
              type="text"
              class="input"
            />
            <label>Firstname</label>
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <input
              rules="required"
              name="lastname"
              placeholder=""
              type="text"
              class="input"
            />
            <label>Lastname</label>
            <span class="form-message"></span>
          </div>
        </div>

        <div class="form-group">
          <input
            rules="required|email"
            name="email"
            placeholder=""
            type="email"
            class="input"
          />
          <label>Email</label>
          <span class="form-message"></span>
        </div>

        <div class="form-group">
          <input
            rules="required|password"
            name="password"
            placeholder=""
            type="password"
            class="input"
          />
          <label>Password</label>
          <span class="form-message"></span>
        </div>
        <div class="form-group">
          <input
            rules="required|confirm"
            name="password-comfirm"
            placeholder=""
            type="password"
            class="input"
          />
          <label>Confirm password</label>
          <span class="form-message"></span>
        </div>
        <button class="submit">Submit</button>
        <p class="signin">Already have an acount ? <a href="./sign-in.php">Signin</a></p>
      </form>
    </div>

    <script src="../asset/js/main.js"></script>
    <script src="../asset/js/validator2_0.js"></script>
    <script>
      new Validator("#register");
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
