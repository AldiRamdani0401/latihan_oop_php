<?php

require realpath(__DIR__ . '/../Core/Controller.php');
require realpath(__DIR__ . '/../Entity/Exam.php');


class ExamController extends Controller {
  public function createExamForm() {
    $this->view->render('Exams/create', ['/manager/organization', ['smp', 'sma', 'smk', 'teknik informatika', 'tes perusahaan'], ['Asep', 'Budi', 'Caca', 'Dodi']]);
    new Exam($_POST['org']);
  }

  public function createExam() {
    var_dump($_POST);
    die();
  }
}