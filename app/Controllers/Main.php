<?php

namespace App\Controllers;

use App\Models\Stage;
use App\Models\Result;
use App\Models\RaceYear;

class Main extends BaseController
{
    public function stranka1()
    {
        $raceYearModel = new RaceYear();
        $raceYear = $raceYearModel->where(['id_race' => 83, 'year' => 2023])->first();


        $stageModel = new Stage();
        $stages = $stageModel
            ->where('id_race_year', $raceYear['id'])
            ->orderBy('number', 'asc')
            ->findAll();

        $resultModel = new Result();

        foreach ($stages as &$stage) {
            $winner = $resultModel
                ->select('cyklistika_rider.first_name, cyklistika_rider.last_name')
                ->join('cyklistika_rider', 'cyklistika_result.id_rider = cyklistika_rider.id')
                ->where(['id_stage' => $stage['id'], 'rank' => 1])
                ->first();

            $stage['winner'] = $winner ? $winner['first_name'] . ' ' . $winner['last_name'] : 'Neznámý';
        }

        return view('stranka1', ['stages' => $stages]);
    }

    public function etapa($id)
    {
        $stageModel = new Stage();
        $stage = $stageModel->find($id);
        $resultModel = new Result();

        $results = $resultModel
            ->select('cyklistika_rider.first_name, cyklistika_rider.last_name, cyklistika_rider.country, cyklistika_result.time')
            ->join('cyklistika_rider', 'cyklistika_result.id_rider = cyklistika_rider.id')
            ->where('cyklistika_result.id_stage', $id)
            ->where('cyklistika_result.rank >', 0)
            ->orderBy('cyklistika_result.rank', 'asc')
            ->findAll();

        if (count($results) > 0) {
            $firstTime = strtotime($results[0]['time']);
            foreach ($results as &$rider) {
                $riderTime = strtotime($rider['time']);
                $diffSeconds = $riderTime - $firstTime;

                $rider['loss'] = ($diffSeconds > 0)
                    ? '+' . gmdate('H:i:s', $diffSeconds)
                    : '—';
            }
        }

        return view('etapa_detail', [
            'stage' => $stage,
            'results' => $results
        ]);
    }

    public function editEtapa($id)
    {
        $stageModel = new Stage();
        $stage = $stageModel->find($id);

        return view('edit_etapa', ['stage' => $stage]);
    }

    public function updateEtapa()
    {
        $id = $this->request->getPost('id');
        $stageModel = new Stage();

        $stageModel->update($id, [
            'departure' => $this->request->getPost('departure'),
            'arrival' => $this->request->getPost('arrival'),
            'date' => $this->request->getPost('date'),
            'number' => $this->request->getPost('number'),
            'distance' => $this->request->getPost('distance'),
        ]);

        return redirect()->to('/main/stranka1');
    }
}
