<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FullJobDescription;

class FullJobDescriptionController extends Controller
{
    public function getJobDescriptionHtml()
    {
        $id = request()->header('id');
        $data = FullJobDescription::find($id); 
        if (!$data) {
            return 'Job description not found';
        }

        return '<header>
            <img class="w-24 mb-4" src="images/companylogo/company.png" alt="Company Logo">
            <h1 class="text-4xl mb-4 font-bold text-gray-700">' . htmlspecialchars($data->role) . '</h1>
            <h2 class="text-2xl mb-4 text-gray-700">' . htmlspecialchars($data->companyname) . '</h2>
            <h3 class="text-base mb-4 text-gray-700"><i class="fa-solid fa-location-dot"></i>&#160;' . htmlspecialchars($data->jobaddress) . '</h3>
            <h4 class="text-sm mb-4 text-gray-700"><i class="fa-solid fa-building"></i> &#160;Programming/Technology</h4>
            <h4 class="text-sm mb-4 text-gray-700"><i class="fa-regular fa-clock"></i>&#160;' . htmlspecialchars($data->jobtype) . '</h4>
        </header>

        <div class="mt-8 flex gap-4 mb-6">
            <button class="py-3 px-10 text-lg text-white rounded-lg bg-orange-400">Quick Apply</button>
            <button class="py-3 px-10 text-lg font-bold text-orange-400">Save Job</button>
        </div>

        <section class="w-[500px]">
            <ul class="text-2xl mb-6 text-gray-700">About
                <li class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->about)) . '</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">About the role
                <li class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->aboutRole)) . '</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">Requirements
                <li class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->requirements)) . '</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">Benefits
                <li class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->benefits)) . '</li>
            </ul>
        </section>
         
       ';
    }
}
