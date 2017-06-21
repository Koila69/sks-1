<?php
/**
 * Created by PhpStorm.
 * User: Sylvain
 * Date: 22/05/2017
 * Time: 18:58
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BirthdayController extends Controller
{

    /**
     * @Route(
     *      "/birthday/{month}/{day}")
     *      name="birthday",
     *      requirements={
     *          "month" = "(0[0-9)|(1[0-2])",
     *          "day" = "(0[1-9])|([1-2}[0-9})|(3[0-1])"
     *      },
     *      defaults={"month"=09, "day"=27}
     */
    public function birthdayAction($month, $day)
    {
        $weekDays = [];
        $birthday = new \DateTime("2017-$month-$day");
        for ($i = 0; $i < 10; ++$i) {
            $weekDays[2017 + $i] = $birthday->format('l');
            $birthday->modify('+1 year');
        }
        return $this->render('birthday.html.twig', ['weekdays' => $weekDays]);
    }

}