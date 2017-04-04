<?php

namespace AppBundle\EventListener;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Measure;

class CheckMeasure
{
    private $validator;

    public function __construct($validator)
    {
        $this->validator = $validator;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Measure) {
            return;
        }

        $this->checkMeasure($entity);
    }

    public function checkMeasure(Measure $measure)
    {
        //mobile hits
        if ($measure->getT() == 'screenview')
        {
            if (is_null($measure->getWct()) or is_null($measure->getWui()) or is_null($measure->getSn()))
            {
                throw new \Exception("Wizbii Creator Type / Wizbii User Id / Screen Name fields are mandatory for mobile hits");
            }
        }

        //web hits
        if ($measure->getT() == 'pageview')
        {
            if (is_null($measure->getWuui()))
            {
                throw new \Exception("Wizbii Uniq User Id field is mandatory for web hits");
            }
        }

        //event hits
        if ($measure->getT() == 'event')
        {
            if (is_null($measure->getEc()) or is_null($measure->getEa()))
            {
                throw new \Exception("Event Category / Event Action fields are mandatory for event hit type");
            }
        }

        // Application Name, Mandatory for all hit types sent to app properties. For hits sent to web properties, this field is optional.
        if ($measure->getDs() == 'apps' and is_null($measure->getAn()))
        {
            throw new \Exception("Application Name field is mandatory for all hit types sent to app properties");
        }

        //si le champ wci référence un utilisateur qui n'existe pas, l'API doit retourner une erreur. Pour cet exercice, cette liste sera mockée
        $users = new ArrayCollection(['foo','bar']);

        if (!is_null($measure->getWui()) and !$users->contains($measure->getWui()))
        {
            throw new \Exception("This User Id does not exist");
        }

        $errors = $this->validator->validate($measure);

        if (count($errors) > 0) {
        //$errorsString = (string) $errors;
        throw new \Exception(($errors));
    }
    }
}