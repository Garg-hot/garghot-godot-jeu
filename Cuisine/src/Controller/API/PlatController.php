<?php

namespace App\Controller\API;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use App\Service\SlugService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route("/api/plat")]
class PlatController extends AbstractController
{
    private SlugService $slugService;

    public function __construct(SlugService $slugService)
    {
        $this->slugService = $slugService;
    }

    #[Route("/", methods: ['GET'])]
    public function index(PlatRepository $platRepository): Response
    {
        $plats = $platRepository->findAll();
        return $this->json($plats, 200, [], [
            'groups' => ['plat.index']
        ]);
    }

    #[Route("/{id}", requirements: ['id' => Requirement::DIGITS], methods: ['GET'])]
    public function show(Plat $plat): Response
    {
        return $this->json($plat, 200, [], [
            'groups' => ['plat.index', 'plat.show']
        ]);
    }

    #[Route("/", methods: ['POST'])]
    public function create(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager
    ): Response {
        $data = $request->getContent();

        try {
            $plat = $serializer->deserialize($data, Plat::class, 'json');

            // Génération automatique du slug si nécessaire
            if (!$plat->getSlug()) {
                $plat->setSlug($this->slugService->generateSlug($plat->getNom()));
            }

            // Validation des données
            $errors = $validator->validate($plat);
            if (count($errors) > 0) {
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }

            // Ajout des timestamps
            $plat->setCreatedAt(new \DateTimeImmutable());
            $plat->setUpdatedAt(new \DateTimeImmutable());

            // Persistance en base de données
            $entityManager->persist($plat);
            $entityManager->flush();

            return $this->json([
                'message' => 'Le plat a été ajouté avec succès.',
                'plat' => $plat
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Erreur lors de la création du plat.',
                'message' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route("/edit/{id}", requirements: ['id' => Requirement::DIGITS], methods: ['PUT', 'PATCH'])]
    public function edit(
        int $id,
        Request $request,
        PlatRepository $platRepository,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager
    ): Response {
        $plat = $platRepository->find($id);

        if (!$plat) {
            return $this->json([
                'error' => 'Plat non trouvé.'
            ], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $serializer->deserialize($data, Plat::class, 'json', ['object_to_populate' => $plat]);

        // Mise à jour du slug si nécessaire
        if (!$plat->getSlug()) {
            $plat->setSlug($this->slugService->generateSlug($plat->getNom()));
        }

        // Validation des données
        $errors = $validator->validate($plat);
        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        $plat->setUpdatedAt(new \DateTimeImmutable());
        $entityManager->flush();

        return $this->json([
            'message' => 'Le plat a été mis à jour avec succès.',
            'plat' => $plat
        ], Response::HTTP_OK);
    }

    #[Route("/delete/{id}", requirements: ['id' => Requirement::DIGITS], methods: ['DELETE'])]
    public function delete(
        int $id,
        PlatRepository $platRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $plat = $platRepository->find($id);

        if (!$plat) {
            return $this->json([
                'error' => 'Plat non trouvé.'
            ], Response::HTTP_NOT_FOUND);
        }

        $entityManager->remove($plat);
        $entityManager->flush();

        return $this->json([
            'message' => 'Le plat a été supprimé avec succès.'
        ], Response::HTTP_OK);
    }
}
