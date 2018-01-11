<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CurriculoRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/curriculos", name="curriculos")
 */
class CurriculosController extends Controller
{
    private $curriculoRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->curriculoRepository = $entityManager->getRepository(\App\Entity\Curriculo::class);
    }

    /**
     * @Route("", name="index", methods="GET")
     */
    public function index()
    {
        $curriculos = $this->curriculoRepository->findAll();

        return new JsonResponse($curriculos);
    }

    /**
     * @Route("", name="create", methods="POST")
     */
    public function create(Request $request)
    {
        try {
            $data = $this->requestJson($request);

            $created = $this->curriculoRepository->store($data);

            return new JsonResponse(['message' => 'Currículo cadastrado com sucesso!']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Erro ao cadastrar currículo']);
        }

    }
}
