


<div x-init="init()" class="hidden relative min-w-[380px] max-w-[760px] lg:inline">  
    <article id="fullJobDesc" class="flex flex-col">
        @foreach($joblistingFullDesc as $joblisting)
          <header>
            <img class="w-24 mb-4" src="images/companylogo/company.png">
             <h1 class="text-4xl mb-4 font-bold text-gray-700">{{$joblisting -> role}}</h1>
              <h2 class="text-2xl mb-4 text-gray-700">{{$joblisting -> companyname}}</h2>
              <h3 class="text-base mb-4 text-gray-700"><i class="fa-solid fa-location-dot"></i>&#160 {{$joblisting -> jobaddress}}</h3>
              <h4 class="text-sm mb-4 text-gray-700"><i class="fa-solid fa-building"></i> &#160 Programing/Technology</h4>
              <h4 class="text-sm mb-4 text-gray-700"><i class="fa-regular fa-clock"></i>&#160 {{$joblisting -> jobtype}}</h4>              
           </header>  
  
           <div class="mt-8 flex gap-4 mb-6"> 
             <button class="py-3 px-10 text-lg text-white rounded-lg bg-orange-400">Quick Apply</button>
             <button class="py-3 px-10 text-lg font-bold text-orange-400">Save Job</button>
           </div>

          <section class="w-[500px]">
            <ul class="text-2xl mb-6 text-gray-700">About
                <li class="text-base ml-4 mb-4 text-gray-700">{{$joblisting -> about}}</li>
            </ul>
            
            <ul class="text-2xl mb-6 text-gray-700">About the role
                <li class="text-base ml-4 mb-4 text-gray-700">{{$joblisting -> aboutRole}}</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">Requirements
                <li class="text-base ml-4 mb-4 text-gray-700">{{$joblisting -> requirements}}</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">Benefits
                <li class="text-base ml-4 mb-4 text-gray-700">{{$joblisting -> benefits}}</li>
            </ul>


          </section>
       @endforeach
    </article>  
  </div>

  <script>
        function init(){
      window.addEventListener('scroll',()=>{
         const fullJobDesc = document.querySelector('#fullJobDesc');
         if(window.scrollY >= 235){
            fullJobDesc.classList.add('fixed','top-2','max-w-[760px]');
            
         }
         else{
          fullJobDesc.classList.remove('fixed','top-2','max-w-[760px]') 
         }
      })

    }

  </script>