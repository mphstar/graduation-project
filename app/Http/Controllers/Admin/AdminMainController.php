<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mentoring;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index()
    {
        $daynow = Carbon::now();

        // all
        $totalQuestions = Mentoring::whereNotNull('question')->count();
        $totalAnswers = Mentoring::whereNotNull('answer')->count();

        // daily
        $totalQuestionsDaily = Mentoring::whereNotNull('question')->whereDate('question_date', $daynow)->count();
        $totalAnswersDaily = Mentoring::whereNotNull('answer')->whereDate('answer_date', $daynow)->count();

        // weekly
        $start_date_week = Carbon::parse($daynow)->startOfWeek();
        $end_date_week = Carbon::parse($daynow)->endOfWeek();

        $totalQuestionsWeekly = Mentoring::whereNotNull('question')->whereBetween('question_date', [$start_date_week, $end_date_week])->count();
        $totalAnswersWeekly = Mentoring::whereNotNull('answer')->whereBetween('answer_date', [$start_date_week, $end_date_week])->count();

        // monthly
        $totalQuestionsMonthly = Mentoring::whereNotNull('question')->whereMonth('question_date', $daynow->month)->whereYear('question_date', '=', $daynow->year)->count();
        $totalAnswersMonthly = Mentoring::whereNotNull('answer')->whereMonth('answer_date', $daynow->month)->whereYear('answer_date', '=', $daynow->year)->count();

        // Yearly
        $totalQuestionsYearly = Mentoring::whereNotNull('question')->whereYear('question_date', '=', $daynow->year)->count();
        $totalAnswersYearly = Mentoring::whereNotNull('answer')->whereYear('answer_date', '=', $daynow->year)->count();


        $data = array(
            "daily" => array(
                "question" => $totalQuestionsDaily,
                "answer" => $totalAnswersDaily
            ),
            "weekly" => array(
                "question" => $totalQuestionsWeekly,
                "answer" => $totalAnswersWeekly
            ),
            "monthly" => array(
                "question" => $totalQuestionsMonthly,
                "answer" => $totalAnswersMonthly
            ),
            "yearly" => array(
                "question" => $totalQuestionsYearly,
                "answer" => $totalAnswersYearly
            ),
            "all" => array(
                "question" => $totalQuestions,
                "answer" => $totalAnswers
            )
        );


        return view('admin.admin-main', compact('data'));
    }
    private function formatWeeklyChartData($data)
    {
        $daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        $formattedData = [];

        foreach ($daysOfWeek as $day) {
            $filteredData = $data->filter(function ($item) use ($day) {
                return $item->question_date->translatedFormat('l') === $day;
            });

            $formattedData[] = [
                'label' => $day,
                'value' => $filteredData->count(),
            ];
        }

        return $formattedData;
    }

    private function formatYearlyChartData($data)
    {
        $monthsOfYear = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $formattedData = [];

        foreach ($monthsOfYear as $month) {
            $filteredData = $data->filter(function ($item) use ($month) {
                return $item->created_at->translatedFormat('F') === $month;
            });

            $formattedData[] = [
                'label' => $month,
                'value' => $filteredData->count(),
            ];
        }

        return $formattedData;
    }
}
