<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Input Validation</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.2/tailwind.min.css"
    />
    <link rel="stylesheet" href="/css/styles.css" />
    <style>
    :root {
  --valid: hsl(140 80% 40%);
  --invalid: hsl(10 80% 40%);
  --input: hsl(0 0% 0%);
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 100;
  background-color: hsl(0 0% 6%);
  color: hsl(0 0% 98%);
}
.form-group {
  --active: 0;
  container-type: inline-size;
  flex: 1;
}

form {
  width: 40ch;
}
input {
  --is-valid: 0;
  --is-invalid: 0;
  background: linear-gradient(var(--input), var(--input)) padding-box,
    linear-gradient(var(--invalid), var(--invalid))
      calc((1 - var(--is-invalid)) * -100cqi) 0 / 100% 100% border-box,
    linear-gradient(var(--valid), var(--valid))
      calc((1 - var(--is-valid)) * 100cqi) 0 / 100% 100% border-box,
    var(--input);
  border: 2px solid transparent;
  font-size: 1rem;
  background-repeat: no-repeat;
  max-width: 100%;
  font-family: "Geist Sans", "SF Pro", sans-serif;
  font-weight: 40;
  background-color: #3b4148;
  border-radius: 10px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 100%;
  outline: 0;
  height: 50px;
}

label {
  margin-bottom: 0.5rem;
  display: inline-block;
  padding-left: 5px;
  opacity: calc(var(--active) + 0.45);
  transition: opacity 0.5s;
}

.form-group:focus-within {
  --active: 1;
}

input:invalid:not(:placeholder-shown):not(:focus-visible) {
  --is-invalid: 1;
}

input:valid {
  --is-valid: 1;
}
@media (prefers-reduced-motion: no-preference) {
  input {
    transition: background-position 0.5s;
  }
}
.submitbtn {
  background: #2a292c;
  border: 0;
  margin-top: 0.5rem;
  width: 100%;
  height: 45px;
  border-radius: 10px;
  color: white;
  cursor: pointer;
  transition: background 0.3s ease-in-out;
}
.submitbtn:hover {
  background: #404949;
}
h1{
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 0.5rem;
  font-weight: 400;
  font-size: 30px;
  color: #a9a9a9;
}                                         
            
    </style>
  </head>
  <body>
  <form method="POST" action="{{ route('login') }}">
  @csrf <!-- Menambahkan CSRF token -->
  <h1>Sign in</h1>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" spellcheck="false" required placeholder="Email" autocomplete="off" />
    
    <label for="password">Password</label> <!-- Menambahkan label untuk password -->
    <input type="password" id="password" required placeholder="Password" autocomplete="off" />
    
    <a href="{{ route('register') }}" style="color: #a9a9a9; text-decoration: none;">Belum punya akun? Daftar di sini</a>
    
    <button type="submit" class="submitbtn">Login</button>
  </div>
</form>
  </body>
</html>            