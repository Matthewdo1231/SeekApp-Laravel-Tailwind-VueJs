<x-layout>
    <!--parent container-->
 <div class="flex flex-row h-screen justify-center">
        <x-employer.sidebar/>
        <x-employer.listingscolumn :joblistings="$joblistings"/>
        <x-employer.jobfulldescription/>
        <div class="w-[30rem] bg-red-200"></div>
  </div>
 
</x-layout>