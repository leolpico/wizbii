<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Measure;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;



class DefaultController extends Controller
{
    /**
     * @Route("/collect/", name="collect")
     */
    public function pathAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        if ($request->isMethod('GET'))
        {
            $measure = new Measure($request);
            $em->persist($measure);
        }

        if ($request->isMethod('POST'))
        {
            $content = $request->getContent();

            if (!empty($content))
            {
                $params = json_decode($content, true);
                foreach ($params as $jsonDocument)
                {
                    $measure = $serializer->denormalize($jsonDocument,'Measure');
                    $em->persist($measure);
                }
            }
        }
        $em->flush();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

}
