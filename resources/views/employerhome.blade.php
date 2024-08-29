<x-layout>
    <!--parent container-->
 <div class="flex">
        <x-employer.employersidebar/>
        <x-employer.employerlistings :joblistings="$joblistings"/>
  </div>
  
</x-layout>