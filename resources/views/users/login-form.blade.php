<x-layout>
    <form id="sign-up-seeker" method="POST" action="/user/authenticate" class="flex flex-row justify-center bg-gray-200">
        @csrf
       <div class="flex flex-col mt-32 w-[38rem] mb-[28rem] bg-gray-100 p-6 rounded-lg shadow-lg shadow-gray-400"> 
    
         <p class="text-2xl mx-48 font-bold">Login <span class="text-orange-500">as Seeker</span></p>
    
         <div class="relative flex flex-col">
            <p class="text-lg mx-20 mt-4">Email address</p>
            <input data-group="input" id="name-input" name="email" value="" class="mt-2 mx-20 outline-none border-2 rounded-md p-2" placeholder="Email address">
            @error('email') 
              <p class="text-red-500 mx-20">{{$message}}</p>
            @enderror
         </div>
         
         <div class="relative flex flex-col">
            <p class="text-lg mx-20 mt-4">Password</p>
            <input type="password" data-group="input" id="email-input" name="password" value="" class="mt-2 mx-20 outline-none border-2 rounded-md p-2" placeholder="Password">
            @error('password') 
            <p class="text-red-500 mx-20">{{$message}}</p>
            @enderror
         </div>  
        
          <div class="flex justify-end mt-20">
             <button class="bg-orange-500 rounded-md px-16 py-2 mx-20 text-white">Login</button>
          </div>
           
        </div>
     </form>
</x-layout>


<script>
//form interactivity/////////////////
    let inputElem = document.querySelectorAll('[data-group="input"]');

    inputElem.forEach((elem)=>{
              elem.addEventListener('click',(event)=>{
                event.stopPropagation();
                removeAllBorder();
                elem.classList.add('border-orange-500');
              })
        })

    function removeAllBorder(){
        inputElem.forEach((elem)=>{
            elem.classList.remove('border-orange-500')
        })
              
    }

    
   </script> 