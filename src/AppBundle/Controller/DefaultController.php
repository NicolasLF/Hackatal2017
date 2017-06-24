<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $fileJson = '';

        $path = $this->get('kernel')->getRootDir() . '/../web/hackatal2017-resume-data/train/20.json';
        $save = file_get_contents($path);
        $savedData = json_decode($save, true);

        $j = 0;
        $k = 0;
        for ($i = 0; $i < count($savedData['reviews']); $i++) {
            if ($savedData['reviews'][$i]['lang'] == 'french') {
                $dataFR[$j]['text'] = $savedData['reviews'][$i]['text'];
                $dataFR[$j]['name'] = $savedData['reviews'][$i]['name'];
                $dataFR[$j]['date'] = $savedData['reviews'][$i]['date'];
                $j++;
            }
            if ($savedData['reviews'][$i]['lang'] == 'english') {
                $dataEN[$j]['text'] = $savedData['reviews'][$i]['text'];
                $dataEN[$j]['name'] = $savedData['reviews'][$i]['name'];
                $dataEN[$j]['date'] = $savedData['reviews'][$i]['date'];
                $j++;
            }
        }
        var_dump($dataFR);
        die();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
}
