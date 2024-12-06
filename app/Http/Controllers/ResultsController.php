<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ResultsController extends Controller
{
    /**
     * Show the results for a specific mood history entry.
     *
     * @param string $timestamp
     * @return \Illuminate\View\View
     */
    public function show($timestamp)
    {
        $user = Auth::user();

        // Fetch all mood history records for the given timestamp
        $responses = DB::table('mood_history')
            ->join('mt_questions', 'mood_history.question_id', '=', 'mt_questions.id') // Join with questions table
            ->where('mood_history.user_id', $user->id)
            ->whereRaw('DATE_FORMAT(mood_history.created_at, "%Y-%m-%d %H:%i:%s") = ?', [$timestamp])
            ->select('mt_questions.q_item as question', 'mood_history.score')
            ->get();

        // Calculate total score
        $totalScore = $responses->sum('score');

        // Generate a summary message based on the total score
        $summaryMessage = $this->getMentalStateSummary($totalScore);

        // Pass the data to the view
        return view('student.results', [
            'results' => $responses,
            'totalScore' => $totalScore,
            'summaryMessage' => $summaryMessage,
        ]);
    }

    /**
     * Generate a summary message based on the total score.
     *
     * @param int $totalScore
     * @return string
     */
    private function getMentalStateSummary($totalScore)
    {
        if ($totalScore >= 10) {
            return 'Your mental state seems very calm.';
        } elseif ($totalScore >= 30) {
            return 'You might be experiencing some stress.';
        } else {
            return 'Consider reaching out for additional support.';
        }
    }
}
