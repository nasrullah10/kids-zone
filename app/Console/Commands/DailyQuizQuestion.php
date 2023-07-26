<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DailyQuizQuestion as DailyQuizQuestionModel;
use App\Models\DailyQuizOption;

class DailyQuizQuestion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyWiseQuizQuestion:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $quiz = DailyQuizQuestionModel::where('status','new-quiz')->inRandomOrder()->first();
        $options = DailyQuizOption::where('daily_quiz_question_id', $quiz->id)->first();
        $data = ['status'=>'activated'];
        $quiz->update($data);
        \Log::info($quiz);
    }
}
