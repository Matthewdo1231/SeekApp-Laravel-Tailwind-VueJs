<x-layout>
    <!--parent container-->
 <div class="flex flex-row h-screen justify-center">
        <x-employer.sidebar/>
        <x-applicants.applicantstable :stages="$stages"/>
  </div>
 
</x-layout>