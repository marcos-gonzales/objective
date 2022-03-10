<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $wSkills = ['PHP', 'Python', 'Javascript', 'Java', 'Ruby', 'C++', 'Lisp', 'Cobol'];
        $dSkills = ['Fireworks', 'Illustrator', 'Photoshop'];        
        $randomSkillIndex1 = random_int(0, 7);
        $randomSkillIndex2 = random_int(0, 2);
        $applicant = Applicant::factory()->create();
        
        if($applicant->job->name == 'Web Developer') {
            return [
                'name' => $wSkills[$randomSkillIndex1],
                'applicant_id' => $applicant->id
            ];   
        } else {
            return [
                'name' => $dSkills[$randomSkillIndex2],
                'applicant_id' => $applicant->id
            ];
        }
    }     
}

