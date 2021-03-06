<?php

namespace BobV\LatexBundle\Generator;

use BobV\LatexBundle\Latex\LatexBaseInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface LatexGeneratorInterface
{

  /**
   * Generate a response containing a PDF document
   *
   * @param LatexBaseInterface $latex
   *
   * @return BinaryFileResponse
   */
  public function createPdfResponse(LatexBaseInterface $latex);

  /**
   * Generate a response containing a generated .tex file
   *
   * @param LatexBaseInterface $latex
   *
   * @return BinaryFileResponse
   */
  public function createTexResponse(LatexBaseInterface $latex);

  /**
   * Compile a LaTeX object into the wanted PDF file
   *
   * @param \BobV\LatexBundle\Latex\LatexBaseInterface $latex
   *
   * @return string Location of the PDF document
   */
  public function generate(LatexBaseInterface $latex);

  /**
   * Generates a latex file for the given LaTeX object
   *
   * @param \BobV\LatexBundle\Latex\LatexBaseInterface $latex
   *
   * @return string Location of the generated LaTeX file
   */
  public function generateLatex(LatexBaseInterface $latex = NULL);

  /**
   * Generates a PDF from a given LaTeX location
   *
   * @param string $texLocation    Location of the .tex file
   * @param array  $compileOptions Optional compile options for pdflatex
   *
   * @return string Location of the generated PDF file
   */
  public function generatePdf($texLocation, array $compileOptions = array());

  /**
   * @param $cacheDir
   *
   * @return $this
   */
  public function setCacheDir($cacheDir);

  /**
   * @param boolean $forceRegenerate
   *
   * @return LatexGenerator
   */
  public function setForceRegenerate($forceRegenerate);

  /**
   * @param \DateTime $maxAge
   *
   * @return LatexGenerator
   */
  public function setMaxAge($maxAge);

  /**
   * Sets the process timeout (max. runtime).
   * To disable the timeout, set this value to null.
   *
   * @param int|float|null $timeout The timeout in seconds
   *
   * @return LatexGenerator
   */
  public function setTimeout($timeout);
}
