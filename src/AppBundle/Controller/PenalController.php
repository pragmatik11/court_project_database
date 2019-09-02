<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Penal;
use AppBundle\Form\CivilType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Penal controller.
 *
 * @Route("penal")
 */
class PenalController extends Controller
{
    /**
     * Lists all penal entities.
     *
     * @Route("/", name="penal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $penals = $em->getRepository('AppBundle:Penal')->findAll();

        return $this->render('penal/index.html.twig', array(
            'penals' => $penals,
        ));
    }

    /**
     * Creates a new penal entity.
     *
     * @Route("/new", name="penal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $penal = new Penal();
        $form = $this->createForm('AppBundle\Form\PenalType', $penal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pdfFile = $form['PDF'] -> getData();
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
                $penal->setPdfFIleName($pdfFile);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($penal);
            $em->flush();

        return $this->redirectToRoute('penal_show', array('id' => $penal->getId()));
    }
        return $this->render('penal/new.html.twig', array(
            'penal' => $penal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a penal entity.
     *
     * @Route("/{id}", name="penal_show")
     * @Method("GET")
     */
    public function showAction(Penal $penal)
    {
        $deleteForm = $this->createDeleteForm($penal);

        return $this->render('penal/show.html.twig', array(
            'penal' => $penal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing penal entity.
     *
     * @Route("/{id}/edit", name="penal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Penal $penal)
    {
        $deleteForm = $this->createDeleteForm($penal);
        $editForm = $this->createForm('AppBundle\Form\PenalType', $penal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('penal_edit', array('id' => $penal->getId()));
        }

        return $this->render('penal/edit.html.twig', array(
            'penal' => $penal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a penal entity.
     *
     * @Route("/{id}", name="penal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Penal $penal)
    {
        $form = $this->createDeleteForm($penal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($penal);
            $em->flush();
        }

        return $this->redirectToRoute('penal_index');
    }

    /**
     * Creates a form to delete a penal entity.
     *
     * @param Penal $penal The penal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Penal $penal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('penal_delete', array('id' => $penal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
