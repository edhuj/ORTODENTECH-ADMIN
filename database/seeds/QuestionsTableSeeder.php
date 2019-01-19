<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Factory::create();

      foreach(range(1,50) as $a) {
        Question::create([
          'statement'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
          'option1'=>$faker->word,
          'option2'=>$faker->word,
          'option3'=>$faker->word,
          'option4'=>$faker->word,
          'option5'=>$faker->word,
          'answer'=>$faker->numberBetween($min = 1, $max = 5),
          'topic'=>$faker->word
		   ]);
      }
    }
}
