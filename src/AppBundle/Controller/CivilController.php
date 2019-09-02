<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Civil;
use AppBundle\Form\CivilType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Civil controller.
 *
 * @Route("civil")
 */
class CivilController extends Controller
{
    /**
     * Lists all civil entities.
     *
     * @Route("/", name="civil_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $civils = $em->getRepository('AppBundle:Civil')->findAll();

        return $this->render('civil/index.html.twig', array(
            'civils' => $civils,
        ));
    }

    /**
     * Creates a new civil entity.
     *
     * @Route("/new", name="civil_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $civil = new Civil();
        $form = $this->createForm('AppBundle\Form\CivilType', $civil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $pdfFile */
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
                $civil->setPdfFIleName($pdfFile);

            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($civil);
            $em->flush();

            return $this->redirectToRoute('civil_show', array('id' => $civil->getId()));
        }

        return $this->render('civil/new.html.twig', array(
            'civil' => $civil,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a civil entity.
     *
     * @Route("/{id}", name="civil_show")
     * @Method("GET")
     */
    public function showAction(Civil $civil)
    {
        $deleteForm = $this->createDeleteForm($civil);

        return $this->render('civil/show.html.twig', array(
            'civil' => $civil,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing civil entity.
     *
     * @Route("/{id}/edit", name="civil_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Civil $civil)
    {
        $deleteForm = $this->createDeleteForm($civil);
        $editForm = $this->createForm('AppBundle\Form\CivilType', $civil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('civil_edit', array('id' => $civil->getId()));
        }

        return $this->render('civil/edit.html.twig', array(
            'civil' => $civil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a civil entity.
     *
     * @Route("/{id}", name="civil_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Civil $civil)
    {
        $form = $this->createDeleteForm($civil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($civil);
            $em->flush();
        }

        return $this->redirectToRoute('civil_index');
    }

    /**
     * Creates a form to delete a civil entity.
     *
     * @param Civil $civil The civil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Civil $civil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('civil_delete', array('id' => $civil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
