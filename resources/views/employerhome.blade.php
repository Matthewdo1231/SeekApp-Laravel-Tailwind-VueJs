<x-layout>
    <!--parent container-->
 <div class="flex flex-row h-screen">
        <x-employer.employersidebar/>
        <x-employer.employerlistings :joblistings="$joblistings"/>
        <div class="flex-1 bg-blue-100"></div>
  </div>
 
</x-layout>