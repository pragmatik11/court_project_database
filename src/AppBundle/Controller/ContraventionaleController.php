<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contraventionale;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contraventionale controller.
 *
 * @Route("contraventionale")
 */
class ContraventionaleController extends Controller
{
    /**
     * Lists all contraventionale entities.
     *
     * @Route("/", name="contraventionale_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contraventionales = $em->getRepository('AppBundle:Contraventionale')->findAll();

        return $this->render('contraventionale/index.html.twig', array(
            'contraventionales' => $contraventionales,
        ));
    }

    /**
     * Creates a new contraventionale entity.
     *
     * @Route("/new", name="contraventionale_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contraventionale = new Contraventionale();
        $form = $this->createForm('AppBundle\Form\ContraventionaleType', $contraventionale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $pdfFile */
            $pdfFile = $form['PDF']->getData();
            if ($pdfFile) {
                $originalFilename = pathinfo($pdfFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL


                // Move the file to the directory where brochures are stored
                try {
                    $pdfFile->move(
                        $this->getParameter('pdf_directory'),
                        $pdfFile
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $contraventionale->setPdfFIleName($pdfFile);
                $em = $this->getDoctrine()->getManager();
                $em->persist($contraventionale);
                $em->flush();

                return $this->redirectToRoute('contraventionale_show', array('id' => $contraventionale->getId()));
            }

            return $this->render('contraventionale/new.html.twig', array(
                'contraventionale' => $contraventionale,
                'form' => $form->createView(),
            ));
        }
    }

    /**
     * Finds and displays a contraventionale entity.
     *
     * @Route("/{id}", name="contraventionale_show")
     * @Method("GET")
     */
    public function showAction(Contraventionale $contraventionale)
    {
        $deleteForm = $this->createDeleteForm($contraventionale);

        return $this->render('contraventionale/show.html.twig', array(
            'contraventionale' => $contraventionale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contraventionale entity.
     *
     * @Route("/{id}/edit", name="contraventionale_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Contraventionale $contraventionale)
    {
        $deleteForm = $this->createDeleteForm($contraventionale);
        $editForm = $this->createForm('AppBundle\Form\ContraventionaleType', $contraventionale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contraventionale_edit', array('id' => $contraventionale->getId()));
        }

        return $this->render('contraventionale/edit.html.twig', array(
            'contraventionale' => $contraventionale,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contraventionale entity.
     *
     * @Route("/{id}", name="contraventionale_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Contraventionale $contraventionale)
    {
        $form = $this->createDeleteForm($contraventionale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contraventionale);
            $em->flush();
        }

        return $this->redirectToRoute('contraventionale_index');
    }

    /**
     * Creates a form to delete a contraventionale entity.
     *
     * @param Contraventionale $contraventionale The contraventionale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contraventionale $contraventionale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contraventionale_delete', array('id' => $contraventionale->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
