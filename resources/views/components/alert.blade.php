
  <!--Toast-->
  <!--div class="alert-toast fixed top-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast" >

    <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-red-600 h-24 rounded shadow-lg text-white" title="close" for="footertoast">
      <div class="flex justify-center item-center">
        
      </div>
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
    </label>
    
    
  </div-->

<div id="alert-error" class="text-white px-6 py-4 border-0 rounded absolute mb-4 bg-red-500 top-0 right-0 {{ $type }} ">
    
    <span class="inline-block align-middle mr-8">
        {{$msg}}
    </span>
    <button onclick="@php $errors = [] ; @endphp document.getElementById('alert-error').classList.toggle('hidden');" 
    class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
      <span>×</span>
    </button>
</div>