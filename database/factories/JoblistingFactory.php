<?php

namespace Database\Factories;

use JoblistingNicheProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JoblistingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  
    private static $jobniches = [ 
        'Healthcare',
        'Technology',
        'Education',
        'Finance',
        'Marketing',
        'Construction',
        'Hospitality',
        'Retail',
        'Real Estate',
        'Transportation',];
    

    public function genJobNiches(){
       return implode(',',array_slice(self::$jobniches,random_int(1,8),1));
    }

    private static $jobType = [ 
        'FullTime',
        'Part-Time',
       ];
    
    public function genJobType(){
       return implode(',',array_slice(self::$jobType,random_int(0,1),1));
    }


    public function definition(): array
    {

        return [
            'hashId' => $this -> faker-> word(),
            'jobtitle' => $this -> faker -> sentence(),
            'companyname' => $this -> faker -> company(),
            'jobaddress' => $this -> faker -> address(),
            'salary' => $this -> faker -> randomFloat(),
            'role'=> $this -> faker -> jobTitle(),
            'niche' => self::genJobNiches(),    
            'jobtype' => self::genJobType(),    
            'reviews' =>  $this -> faker -> randomFloat(),
            'about' => $this -> faker -> sentence(),
            'aboutRole'=> $this -> faker -> paragraph($nbSentences = 3, $variableNbSentences = true),
            'requirements' => $this -> faker -> paragraph($nbSentences = 3, $variableNbSentences = true),
            'benefits' => $this -> faker -> paragraph($nbSentences = 3, $variableNbSentences = true)
        ];
    }
}
