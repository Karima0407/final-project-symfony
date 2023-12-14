1) Nav dans base.html.twig
2) Création de la base de données avec les entités 
3) Création de formulaire pour l'admin pour ajouter des nouveaux articles
Vetments:
Création du dossier img dans Public 
dans Services.yaml: parameters:
    img_directory: 'img'
dans VetementsType:
->add('image', FileType::class, [
                'label' => 'image (image file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [new \Symfony\Component\Validator\Constraints\Image([
                    'maxSize' => '15M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                        'image/jpg',
                        'image / webp',
                    ],
                ])],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false, // Adapt based on your requirements
            ])
            ->add('descriptionDetaille', TextareaType::class, [
                'label' => 'Detailed Description',
                'required' => false, // Adapt based on your requirements
            ])
            ->add('prix', MoneyType::class, [
                'label' => 'Price',
                'currency' => 'USD', // Change the currency as needed
                'required' => false, // Adapt based on your requirements
            ]);    
dans vetements.html.twig:
<div class="example-wrapper userForm">
  <h4>Formulaire d'Ajout d'un Vetement! ✅</h4>
  {{ form_start(vetement) }}
  <div class="mb-1">
    {% if vetement.vars.value.image is not null %}
    <img
      src="{{ asset('img' ~ vetement.vars.value.image) }}"
      alt="Vetements Image"
    />
    {% endif %}
  </div>
  <div class="mb-1">
    {{ form_row(vetement.description, {'label': "Description : ", 'attr': {
                      'class': 'form-control',
                      'placeholder': "Votre Description ..."

    }}) }}
  </div>
  <div class="mb-1">
    {{ form_row(vetement.descriptionDetaille, {'label': "descrption détaillée : ", 'attr': {
                      'class': 'form-control',
                      'placeholder': "Votre description détaillée ..."

    }}) }}
  </div>
  <div class="mb-1">
    {{ form_row(vetement.prix, {'label': "Prix : ", 'attr': {
                      'class': 'form-control',
                      'placeholder': "Votre Prix ..."

    }}) }}
  </div>
  <button type="submit" class="btn btn-success">Ajouter</button>
  {{ form_end(vetement) }}
</div>

dans VetementsController:
 public function ajout_vetement(Request $request, EntityManagerInterface $entityManager, VetementsRepository $vetementsRepository): Response
    {
        $vetement = new Vetements();
        $selects = $vetementsRepository->findAll();
        $form = $this->createForm(VetementsType::class, $vetement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('image')->getData();
            $newFilename = md5(uniqid()) . '.' . $uploadedFile->guessExtension();

            // Déplacez le fichier vers le répertoire où vous souhaitez le stocker
            $uploadedFile->move(
                $this->getParameter('img_directory'),
                $newFilename
            );
            // Enregistrement de nom de fichier dans la table de la BD
            $vetement->setImage($newFilename);
            $entityManager->persist($vetement);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }

        return $this->render('vetements/vetements.html.twig', [
            'controller_name' => 'VetementsController',
            'vetement' => $form->createView(),
            'select' => $selects,
        ]);
    }