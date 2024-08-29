<div> 
  <p class="min-w-[24rem] py-6 pl-6 bg-blue-400 text-white text-xl">
       Active Listings
  </p>
  @if(!empty($joblisting))
  <div class="flex flex-col items-center gap-2">    
    @foreach ($joblistings as $joblisting)
      <article id="jobfulldesc-js" data-job-id="{{$joblisting -> id}}" class="group relative flex flex-col min-w-[24rem] p-4 mt-2 mx-6 border-2 rounded-md border-gray-400 hover:cursor-pointer">
          <div class="flex py-8">
          <img class="w-24" src={{asset('images/companylogo/company.png')}}>
          </div>
          <div class="hover:group font-bold text-gray-700 mb-1 break-words group-hover:underline"></div>
          <div class="text-md text-gray-600 mb-3">Role: <span class="text-black font-bold">{{$joblisting -> companyname}}</span></div>
        </article>
      @endforeach

    @else
       <div class="ml-4 mt-4 text-gray-400">No active listings</div>
   @endif
  </div>
</div> 