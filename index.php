<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-green-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">Microproject</span>
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      <button class="mr-5 hover:text-gray-900"  onclick="myFunction2()">About Us</button>
      <button class="mr-5 hover:text-gray-900" onclick="myFunction1()">Contact us</button>
    </nav>
<button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" onclick="myFunction()">
  Start
</button>
  </div>
</header>
<p id="demo"></p>
<script>

    function myFunction() {
    window.location.href="main.php";
  }

function myFunction1() {
    window.location.href="contact.php";
  }

function myFunction2() {
    window.location.href="aboutUs.php";
  }
</script>
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
      <div class="rounded-lg h-64 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="andrew-neel-cckf4TsHAuw-unsplash.jpg">
      </div>
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <div class="flex flex-col items-center text-center justify-center">
            <div class="w-12 h-1 bg-green-500 rounded mt-2 mb-4"></div>
            <p class="text-base">This is Our phps microproject to generate cetificate of mentiond reason .Here we used Html,php and tailwind frame work and some js code</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-lg mb-4">                                       Certificate Generator was built by Dipak , Yash , Ritesh and Aman. Users can input their names and reason  so as to generate a certificate without your name going into any database or storing in any server.To test this code, here is the link  http://localhost/microproject1/index.php</p>
        </div>
      </div>
    </div>
  </div>
  <hr>
</section>
</body>
</html>