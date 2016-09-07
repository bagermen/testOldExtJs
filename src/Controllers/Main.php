<?php
namespace App\Controllers;

use App\Entities\Calender;
use Doctrine\ORM\Tools\Pagination\Paginator;
use App\Service\Grid;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Main
 * @package App\Controllers
 */
class Main extends AbstractController
{
    public function index(Request $request, Application $app)
    {
        return $this->render($app, 'main.html.twig');
    }

    public function listGrid(Request $request, Application $app)
    {
        /** @var \Doctrine\ORM\QueryBuilder $qb */
        $qb = $app['doctrine']->getManager()->createQueryBuilder();

        $limit = ($request->get('limit') > 0) ? intval($request->get('limit')) : 25;
        $qb->select('c')->from('App\Entities\Calender', 'c')
            ->setFirstResult(intval($request->get('start')))
            ->setMaxResults($limit);


        $fields = $request->get('fields');
        $text = $request->get('text');

        if (($fields = json_decode($fields, true)) !== false && !empty($text)) {
            $textFields = [
                "year", "name", "city", "country", "holder", "logo", "type", "game", "note", "url", "contactName",
                "contactEmail", "contactPhone", "nameRu", "ip", "wcupStars", "isResult", "liveUrl", "placeSure",
                "ageСategories",
            ];
            $dateFields = [ "begin", "tot", "addedDate"];
            $floatFields = ["fee"];

            $constraits = [];
            $parameters = [];
            foreach ($fields as $key => $field) {
                if (in_array($field, $textFields)) {
                    $constraits[] = $qb->expr()->like('c.'.$field, ':'.$field);
                    $parameters[$field] = $text.'%';
                } elseif (in_array($field, $dateFields)) {
                    $constraits[] = $qb->expr()->eq('c.'.$field, ':'.$field);
                    $parameters[$field] = $text;
                } elseif (in_array($field, $floatFields)) {
                    $constraits[] = $qb->expr()->eq('c.'.$field, ':'.$field);
                    $parameters[$field] = (float) $text;
                } else {
                    $constraits[] = $qb->expr()->eq('c.'.$field, ':'.$field);
                    $parameters[$field] = (int) $text;
                }
            }

            if (!empty($constraits)) {
                $qb->where(call_user_func_array([$qb->expr(), 'orX'], $constraits));
                $qb->setParameters($parameters);
            }
        }

        $calender = new Calender();
        if ($sort = $request->get('sort')) {
            if (method_exists($calender, "get$sort")) {
                $dir = strtolower($request->get('dir')) == 'asc' ? 'asc' : 'desc';
                $qb->orderBy("c.$sort", $dir);
            }
        }
        $paginator = new Paginator($qb->getQuery());

        $result = [
            'items' => $paginator,
            'totalCount' => count($paginator),
            'success' => true,
        ];

        return $this->renderJson($app, 'calenders.html.twig', $result);
    }

    public function create(Request $request, Application $app)
    {
        $data = $request->get('data');
        /** @var \Doctrine\ORM\EntityManager $manager */
        $manager = $app['doctrine']->getManager();

        if (($data = json_decode($data, true)) !== false) {
            $calender = new Calender();

            foreach ($data as $field => $value) {
                $method = "set$field";
                $calender->$method($value);
            }

            $manager->persist($calender);
            $manager->flush();

            return $this->renderJson($app, 'update.html.twig', ['item' => $calender, 'success' => true]);
        }
        return $this->renderJson($app, 'update.html.twig', ['item' => [], 'success' => false]);
    }

    public function update($id, Request $request, Application $app)
    {
        $data = $request->get('data');
        /** @var \Doctrine\ORM\EntityManager $manager */
        $manager = $app['doctrine']->getManager();

        if (($data = json_decode($data, true)) !== false && isset($id)) {
            $calender = $manager->getRepository('App\Entities\Calender')->find((int) $id);
            unset($data['cid']);

            foreach ($data as $field => $value) {
                $method = "set$field";
                $calender->$method($value);
            }

            $manager->merge($calender);
            $manager->flush();

            return $this->renderJson($app, 'update.html.twig', ['item' => $calender, 'success' => true]);
        }

        return $this->renderJson($app, 'update.html.twig', ['item' => [], 'success' => false]);
    }

    public function delete($id, Application $app)
    {
        /** @var \Doctrine\ORM\EntityManager $manager */
        $manager = $app['doctrine']->getManager();
        $calender = $manager->getRepository('App\Entities\Calender')->find((int) $id);
        
        if ($calender) {
            $manager->remove($calender);
            $manager->flush();
            return $this->renderJson($app, 'delete.html.twig', ['success' => true]);
        }
        return $this->renderJson($app, 'delete.html.twig', ['success' => false]);
    }
}