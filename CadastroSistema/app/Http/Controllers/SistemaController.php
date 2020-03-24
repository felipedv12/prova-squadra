<?php


namespace App\Http\Controllers;


use App\Entities\Sistema;
use App\Transformers\SistemaTransformer;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Illuminate\Support\Facades\Validator;

class SistemaController extends Controller
{
    public function store(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $validacao = Validator::make($request->all(), [
            'descricaoSistema' => 'required|max:100',
            'siglaSistema' => 'required|max:10',
            'emailSistema' => 'email|max:100',
            'url' => 'max:50'
        ], [
            'email' => 'E-mail inválido.',
            'required' => 'O campo :attribute é obrigatório e não foi informado.',
            'max' => 'O campo :attribute aceita no máximo :max caracteres.'
        ]);
        // Retorna os erros de validação para o usuário
        if ($request->get('emailSistema') && !strpos($request->get('emailSistema'), '.')) {
            $validacao->errors()->add('email', 'E-mail inválido');
        }
        if ($validacao->fails()) {
            return response()->json($validacao->errors()->first(), 422);
        }

        $sistema = new Sistema($request->get('descricaoSistema'),
            $request->get('siglaSistema'),
            $request->get('emailSistema'),
            $request->get('urlSistema'),
            $request->get('statusSistema'));
        $entityManager->persist($sistema);
        $entityManager->flush();


        return response()->json(true);
    }

    public function index(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        try {
            $validacao = Validator::make($request->all(), [
                'emailSistema' => 'email'
            ], [
                'email' => 'E-mail inválido.'
            ]);

            if ($request->get('emailSistema') && !strpos($request->get('emailSistema'), '.')) {
                $validacao->errors()->add('email', 'E-mail inválido');
            }

            if ($validacao->fails()) {
                return response()->json($validacao->errors()->first(), 422);
            }

            $sistemas = $entityManager->getRepository(Sistema::class)->findBy($request->all());
            $transformer = new SistemaTransformer();
            if (count($sistemas) === 0)
                return response()->json('Nenhum Sistema foi encontrado. Favor revisar os critérios da sua pesquisa!', 404);
        } catch (\Exception $exception) {

            return response()->json($exception->getMessage(), 500);

        }
        return response()->json($transformer->transformAll($sistemas));
    }

    public function show(EntityManagerInterface $entityManager, $idSistema)
    {
        $sistemas = $entityManager->getRepository(Sistema::class)->find($idSistema);
        $transformer = new SistemaTransformer();
        return $transformer->transform($sistemas);
    }

}
