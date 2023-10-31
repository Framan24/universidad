<!DOCTYPE html>
<html>
<head>
    <link href="../dist/output.css" rel="stylesheet">
    <title>Iniciar sesión</title>
</head>
<body>
<section class="grid grid-cols-1 gap-0 lg:grid-cols-12 m-auto mt-40">
  <div class="w-full col-span-1 p-4 mx-auto mt-6 lg:col-span-8 xl:p-12 md:w-2/4">
    <h1 class="mt-6 mb-4 text-xl font-light text-left text-gray-800">Log in to your account</h1>
    <form class="pb-1 space-y-4" method="post" action="/inicio">
      <label class="block">
        <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
        <input class="form-input" type="email" placeholder="Ex. andres@andres" name="correo" id="correo" required />
      </label>
      <label class="block">
        <span class="block mb-1 text-xs font-medium text-gray-700">Your Password</span>
        <input class="form-input" type="password" placeholder="••••••••" name="password" id="password" required />
      </label>
      <div class="flex items-center justify-between">
        <label class="flex items-center">
          <input type="checkbox" class="form-checkbox" />
          <span class="block ml-2 text-xs font-medium text-gray-700 cursor-pointer">Remember me</span>
        </label>
        <button class="btn btn-primary bg-indigo-700 rounded-2xl text-white p-2" type="submit">login</button>
      </div>
    </form>
    <div class="my-6 space-y-2">
      <p class="text-xs text-gray-600">
        Don't have an account?
        <a href="#" class="text-purple-700 hover:text-black">Create an account</a>
      </p>
      <a href="#" class="block text-xs text-purple-700 hover:text-black">Forgot password?</a>
      <a href="#" class="block text-xs text-purple-700 hover:text-black">Privacy & Terms</a>
    </div>
  </div>
  <div class="col-span-1 lg:col-span-4">
    <img
      src="/src/logo.jpg"
      alt="logo de la universidad"
      class="object-cover w-full h-64 min-h-full bg-gray-100"
      loading="lazy"
    />
  </div>
</section>


</body>
</html>
