<?php

namespace mmarchio\NodeManagerBundle\Controller;

use mmarchio\mmarchioNodeManager\Entity\node_repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/node/manager")
     */
    public function indexAction(Request $request)
    {
        $data = new \stdClass();
        $data->url = $request->getSchemeAndHttpHost();
        $data->submit = $data->url;
        if ($this->get("mmarchio_doctrine_ui.api")->isDev($request)) {
            $data->submit .= "/app_dev.php";
        }
        return $this->render('@NodeManager/node.html.twig', ["data" => $data]);
    }

    /**
     * @Route("/create/node")
     */
    public function createNodeAction(Request $request)
    {
        $content = $request->getContent();
        $data = new \stdClass();
        $response = new Response();
        if (!empty($content)) {
            $i = 0;
            $data->entityName = "node_".$request->get("node_name");
            $data->tableName = $data->entityName;
            $data->format = "annotation";
            $data->fields = [];
            while (!empty($request->get("field_type_".$i))) {
                $temp = new \stdClass();
                $temp->name = $request->get("field_title_".$i);
                $temp->nullable = $request->get("field_nullable_".$i) ?? false;
                $temp->unique = $request->get("field_unique_".$i) ?? false;
                $temp->precision = $request->get("field_precision_".$i) ?? null;
                $temp->scale = $request->get("field_scale_".$i) ?? null;
                $temp->length = $request->get("field_scale_".$i) ?? null;
                $temp->type = $request->get("field_type_".$i);
                $data->fields[] = $temp;
                $i++;
            }

            $nodes = $this->getDoctrine()
                ->getRepository(node_repository::class)
                ->findBy(["nodeName" => $data->tableName]);

            $count = count($nodes);
            if ($count === 0) {
                $msg = $this->get("mmarchio_doctrine_ui.api")->createTableApi($data, "mmarchioNodeManagerBundle");
                $response->headers->set("Content-Type","application/json");
                $response->setContent($msg);

                $nr = new node_repository();
                $nr->setNodeName($data->tableName);

                $em = $this->getDoctrine()->getManager();
                $em->persist($nr);
                $em->flush();
            }
        }

        return $response;
    }

}
