<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Administrative;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Administrative controller.
 *
 * @Route("administrative")
 */
class AdministrativeController extends Controller
{
    /**
     * Lists all administrative entities.
     *
     * @Route("/", name="administrative_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $administratives = $em->getRepository('AppBundle:Administrative')->findAll();

        return $this->render('administrative/index.html.twig', array(
            'administratives' => $administratives,
        ));
    }

    /**
     * Creates a new administrative entity.
     *
     * @Route("/new", name="administrative_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $administrative = new Administrative();
        $form = $this->createForm('AppBundle\Form\AdministrativeType', $administrative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $pdfFile */
            $pdfFile = $form['PDF']->getData();
            if ($pdfFile) {
                $originalFilename = pathinfo($pdfFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $originalFilename;
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pdfFile->guessExtension();                // this

                // Move the file to the directory where brochures are stored
                try {
                    $pdfFile->move(
                        $this->getParameter('pdf_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $administrative->setPdfFIleName($newFilename);

            }

                $em = $this->getDoctrine()->getManager();
                $em->persist($administrative);
                $em->flush();

                return $this->redirectToRoute('administrative_show', array('id' => $administrative->getId()));
            }

            return $this->render('administrative/new.html.twig', array(
                'administrative' => $administrative,
                'form' => $form->createView(),
            ));

    }

    /**
     * Finds and displays a administrative entity.
     *
     * @Route("/{id}", name="administrative_show")
     * @Method("GET")
     */
    public function showAction(Administrative $administrative)
    {
        $deleteForm = $this->createDeleteForm($administrative);

        return $this->render('administrative/show.html.twig', array(
            'administrative' => $administrative,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing administrative entity.
     *
     * @Route("/{id}/edit", name="administrative_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Administrative $administrative)
    {
        $deleteForm = $this->createDeleteForm($administrative);
        $editForm = $this->createForm('AppBundle\Form\AdministrativeType', $administrative);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('administrative_edit', array('id' => $administrative->getId()));
        }

        return $this->render('administrative/edit.html.twig', array(
            'administrative' => $administrative,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a administrative entity.
     *
     * @Route("/{id}", name="administrative_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Administrative $administrative)
    {
        $form = $this->createDeleteForm($administrative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($administrative);
            $em->flush();
        }

        return $this->redirectToRoute('administrative_index');
    }

    /**
     * Creates a form to delete a administrative entity.
     *
     * @param Administrative $administrative The administrative entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Administrative $administrative)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administrative_delete', array('id' => $administrative->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
